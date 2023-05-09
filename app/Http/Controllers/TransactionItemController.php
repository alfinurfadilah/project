<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionHistory;
use App\Models\Item;
use App\Models\ItemQty;
use App\Models\ItemPrice;
use App\Models\ItemStock;
use App\Models\ItemHistory;
use App\Http\Controllers\Controller;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

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
                    'batch_stock' => $row->attributes['batch_stock'],
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
        $batchStock = $request->batchStock;

        $product = Item::find($idItem);
        // $productStock = ItemStock::find($idItem);
        $itemStock = ItemStock::where('id', $idStock)
            ->where('item_id', $idItem)
            ->where('batch_stock', $batchStock)->first();

        $stockProduk = $itemStock->itemQty->qty;

        $cart = \Cart::session(Auth()->id())->getContent();
        $cek_itemId = $cart->whereIn('id', $idStock);

        if ($cek_itemId->isNotEmpty()) {
            $qtyOnCart = $cek_itemId[$idStock]->quantity;

            if ($stockProduk == $qtyOnCart) {
                $sen['success'] = false;
                $sen['message'] = "Jumlah item kurang";
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
                'price' => $itemStock->itemPrice->price,
                'quantity' => 1,
                'attributes' => array(
                    'batch_stock' => $itemStock->batch_stock,
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
        $batchStock = $request->batchStock;

        $itemStock = ItemStock::find($id);

        $itemStock = ItemStock::where('id', $id)
            ->where('batch_stock', $batchStock)->first();

        $cart = \Cart::session(Auth()->id())->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if ($itemStock->itemQty->qty == $cek_itemId[$id]->quantity) {
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
        $cartItems = \Cart::session(Auth()->id())->getContent();

        // dd($cartItems);

        //get total and sub total
        $sub_total = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();
        $cartTotalQuantity = \Cart::session(Auth()->id())->getTotalQuantity();

        // get condition (discount or tax or other condition)
        $new_condition = \Cart::session(Auth()->id())->getCondition('Discount');
        if ($new_condition) {
            $diskon = $new_condition->getCalculatedValue($sub_total);
            // $diskonValue = $new_condition->getValue(); // the value of the condition
        }

        // Proses transaksi item
        if (\Cart::isEmpty()) {
            $sen['success'] = false;
            $sen['message'] = "Transaksi gagal, data cart kosong";
        } else {
            // 1. simpan ke tabel transaction
            $transaction = Transaction::create([
                'qty_out' => $cartTotalQuantity,
                'total' => $total,
                'tax' => 0,
                'money_changes' => $request->kembalian,
                'payment' => $request->nominalPembayaran,
                'discount_user' => $diskon ?? 0,
                'service_charge' => 0,
                'sub_total' => $sub_total,
                'user_id' => Auth::id(),
                'created_by' => Auth::id()
            ]);
            if ($transaction) {
                // 2. simpan di transaksi history
                if (TransactionHistory::create([
                    'transaction_id' => $transaction->id,
                    'type_transaction' => 2,
                    'qty_out' => $cartTotalQuantity,
                    'total' => $total,
                    'tax' => 0,
                    'money_changes' => $request->kembalian,
                    'payment' => $request->nominalPembayaran,
                    'discount_user' => $diskon ?? 0,
                    'service_charge' => 0,
                    'sub_total' => $sub_total,
                    'user_id' => Auth::id(),
                    'created_by' => Auth::id()
                ])) {

                    foreach ($cartItems as $row) {
                        $itemStock = ItemStock::find($row->id);

                        $itemStockQty = $itemStock->itemQty->qty;
                        $totalStockBerkurang = $itemStockQty - $row->quantity;

                        // 3. kurangin dulu qty stock nya di tabel item_qties
                        if ($itemStock->itemQty->find($itemStock->item_qty_id)->update([
                            'qty' => $totalStockBerkurang,
                            'qty_change' => $totalStockBerkurang
                        ])) {
                            // 4. baru tambahkan di item_history
                            ItemHistory::create([
                                'item_stock_id' => $itemStock->id,
                                'transaction_type_id' => 2,
                                'qty' => $row->quantity,
                                'qty_current' => $itemStock->itemQty->qty,
                                'qty_change' => $row->quantity,
                                'description' => "Pengurangan stock dari transaksi",
                                'created_by' => Auth::id()
                            ]);
                        } else {
                            $sen['success'] = false;
                            $sen['message'] = "Transaksi gagal di simpan";
                        }

                        // 5. tambahkan juga ke transaction_item
                        TransactionItem::create([
                            'transaction_id' => $transaction->id,
                            'item_id' => $itemStock->item_id,
                            'selling_price' => $row->price,
                            'qty' => $row->quantity,
                            'batch_id' => $itemStock->batch_stock,
                        ]);

                        // 6. remove item di cart
                        \Cart::session(Auth()->id())->remove($row->id);
                    }

                    $sen['success'] = true;
                    $sen['message'] = "Transaksi berhasil di simpan";
                } else {
                    $sen['success'] = false;
                    $sen['message'] = "Transaksi gagal di simpan";
                }
            }
        }

        return response()->json(['data' => $sen]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function history(TransactionHistory $transactionHistory)
    {
        //
        $breadcumb = "Riwayat Transaksi";

        $transactionHistory = $transactionHistory->when(request('search'), function ($query) {
            return $query->where('transaction_id', 'like', '%' . request('search') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('transactionItem.history', compact('breadcumb', 'transactionHistory'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function detail(TransactionHistory $transactionHistory, $id)
    {
        //
        $breadcumb = "Detail Transaksi";

        // dd($id);

        $transactionHistory = $transactionHistory->find($id);
        $transactionItem = TransactionItem::where("transaction_id", $id)->get();

        return view('transactionItem.detail', compact('breadcumb', 'transactionHistory', 'transactionItem'));
    }
}
