<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use App\Models\ItemQty;
use App\Models\ItemPrice;
use App\Models\ItemStock;
use App\Http\Controllers\Controller;
use Auth;
use DB;

use Darryldecode\Cart\CartCondition;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "Transaksi items";

        //product
        $products = Item::when(request('search'), function ($query) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $items = \Cart::session(Auth()->id())->getContent();

        if (\Cart::isEmpty()) {
            $cart_data = [];
            $cart_data_ajax = [];
        } else {
            foreach ($items as $row) {
                $cart[] = [
                    'rowId' => $row->id,
                    'name' => $row->name,
                    'qty' => $row->quantity,
                    'pricesingle' => $row->price,
                    'price' => $row->getPriceSum(),
                    'created_at' => $row->attributes['created_at'],
                    'associatedModel' => $row->associatedModel
                ];
            }

            $cart_data = collect($cart)->sortBy('created_at');

            $cart_data_ajax = $cart;
        }

        //get total and sub total
        $sub_total = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();

        // get condition (discount or tax or other condition)
        $new_condition = \Cart::session(Auth()->id())->getCondition('Discount');
        if ($new_condition) {
            $diskon = $new_condition->getCalculatedValue($sub_total);
            $diskonValue = $new_condition->getValue(); // the value of the condition
        }

        // dd($diskonValue);

        $data_total = [
            'sub_total' => $sub_total,
            'total' => $total,
            'diskon' => $diskon ?? 0,
            'diskon_value' => $diskonValue ?? ''
        ];

        // dd($data_total);

        if (request()->ajax()) {
            return response()->json(['data' => [
                'cart_data' => $cart_data_ajax,
                'data_total' => $data_total,
            ]]);
        } else {
            return view('transactionItem.index', compact('products', 'cart_data', 'data_total', 'cart_data_ajax', 'breadcumb'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        // dd($request->all());
        $idItem = $request->idBarang;
        $idStock = $request->idStock;
        $product = Item::find($idItem);
        $productStock = ItemStock::find($idStock);

        $cart = \Cart::session(Auth()->id())->getContent();
        $cek_itemId = $cart->whereIn('id', $idItem);

        // dd($product, $cek_itemId);

        if ($cek_itemId->isNotEmpty()) {
            if ($product->itemStock[0]->itemQty->qty == $cek_itemId[$idItem]->quantity) {
                $sen['success'] = false;
                $sen['message'] = "Jumlah item kurang";
                // return redirect()->back()->with('error', 'jumlah item kurang');
            } else {
                \Cart::session(Auth()->id())->update($idStock, array(
                    'quantity' => 1
                ));
                $sen['success'] = true;
                $sen['message'] = "Berhasil update cart";
            }
        } else {
            \Cart::session(Auth()->id())->add(array(
                'id' => $idStock,
                'name' => $product->name,
                'price' => $productStock->itemPrice->price,
                'quantity' => 1,
                'attributes' => array(
                    'created_at' => date('Y-m-d H:i:s')
                ),
                'associatedModel' => $product
            ));
            $sen['success'] = true;
            $sen['message'] = "Berhasil tambah cart";
        }

        return response()->json(['data' => $sen]);
    }

    public function increaseCart(Request $request)
    {
        $id = $request->itemId;
        // dd($id);

        $product = ItemStock::find($id);

        $cart = \Cart::session(Auth()->id())->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if ($product->itemQty->qty == $cek_itemId[$id]->quantity) {
            $sen['success'] = false;
            $sen['message'] = "Jumlah item kurang";
        } else {
            \Cart::session(Auth()->id())->update($id, array(
                'quantity' => array(
                    'relative' => true,
                    'value' => 1
                )
            ));

            $sen['success'] = true;
            $sen['message'] = "Berhasil tambah qty";
        }

        return response()->json(['data' => $sen]);
    }

    public function decreaseCart(Request $request)
    {
        $id = $request->itemId;
        // dd($id);

        $cart = \Cart::session(Auth()->id())->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if ($cek_itemId[$id]->quantity == 1) {
            \Cart::session(Auth()->id())->remove($id);
            $sen['success'] = true;
            $sen['message'] = "Berhasil remove item dari cart";
        } else {
            \Cart::session(Auth()->id())->update($id, array(
                'quantity' => array(
                    'relative' => true,
                    'value' => -1
                )
            ));
            $sen['success'] = true;
            $sen['message'] = "Berhasil mengurangi jumlah qty";
        }

        return response()->json(['data' => $sen]);
    }

    public function addDiscount(Request $request)
    {
        if ($request->discount) {
            // add single condition on a cart bases
            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'Discount',
                'type' => 'tax',
                'target' => 'total',
                'value' => '-' . $request->discount . '%'
            ));

            \Cart::condition($condition);
            \Cart::session(Auth()->id())->condition($condition);

            $sen['success'] = true;
            $sen['message'] = "Berhasil menambahkan diskon";
        }

        return response()->json(['data' => $sen]);
    }

    public function removeDiscount()
    {
        $conditionName = 'Discount';

        if (\Cart::session(Auth()->id())->isEmpty()) {
            \Cart::session(Auth()->id())->removeCartCondition($conditionName);

            $sen['success'] = true;
            $sen['message'] = "Berhasil menghapus semua diskon";
        } else {
            $items = \Cart::session(Auth()->id())->getContent();

            \Cart::session(Auth()->id())->removeCartCondition($conditionName);
            foreach ($items as $row) {
                \Cart::session(Auth()->id())->clearItemConditions($row->id);
            }
            $sen['success'] = true;
            $sen['message'] = "Berhasil menghapus diskon pada item";
        }


        return response()->json(['data' => $sen]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        // Get data cart
        $items = \Cart::session(Auth()->id())->getContent();

        // dd($items);

        // if (\Cart::isEmpty()) {
        //     $cart_data = [];
        // } else {
        //     foreach ($items as $row) {
        //         $cart[] = [
        //             'rowId' => $row->id,
        //             'name' => $row->name,
        //             'qty' => $row->quantity,
        //             'pricesingle' => $row->price,
        //             'price' => $row->getPriceSum(),
        //             'created_at' => $row->attributes['created_at'],
        //             'associatedModel' => $row->associatedModel
        //         ];
        //     }

        //     $cart_data = $cart;
        // }

        // dd($cart_data);

        //get total and sub total
        $sub_total = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();

        // get condition (discount or tax or other condition)
        $new_condition = \Cart::session(Auth()->id())->getCondition('Discount');
        if ($new_condition) {
            $diskon = $new_condition->getCalculatedValue($sub_total);
            $diskonValue = $new_condition->getValue(); // the value of the condition
        }

        $data_total = [
            'sub_total' => $sub_total,
            'total' => $total,
            'diskon' => $diskon ?? 0,
            'diskon_value' => $diskonValue ?? ''
        ];

        // cek stock ke item_stock
        if (\Cart::isEmpty()) {
            // retrun data cart kosong
        } else {
            foreach ($items as $row) {
                // dd($row->id);
                $itemStock = ItemStock::where('item_id', '=', $row->id)->get();

                dd(count($itemStock));

                foreach ($itemStock as $rowStock) {
                    $itemQty = ItemQty::find($rowStock->item_qty_id);

                    dd(count($itemQty));

                    // if ($itemQty->qty >= $row->quantity) {
                    //     # code...
                    // }
                }

                // $cart[] = [
                //     'rowId' => $row->id,
                //     'name' => $row->name,
                //     'qty' => $row->quantity,
                //     'pricesingle' => $row->price,
                //     'price' => $row->getPriceSum(),
                //     'created_at' => $row->attributes['created_at'],
                //     'associatedModel' => $row->associatedModel
                // ];
            }

            $cart_data = $cart;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
