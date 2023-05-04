<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemStock;
use App\Models\ItemQty;
use App\Models\ItemPrice;
use App\Models\ItemCategories;
use App\Models\ItemType;
use App\Models\ItemHistory;
use App\Models\Uom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "Barang";

        $items = Item::when(request('search'), function ($query) {
            return $query->where('item_name', 'like', '%' . request('search') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('item.index', compact('breadcumb', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Form Tambah Barang";

        $itemCategories = ItemCategories::get();
        $itemType = ItemType::get();
        $uom = Uom::get();

        return view('item.create', compact('breadcumb', 'itemCategories', 'itemType', 'uom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(count($request->qtyStock));

        $this->validate($request, [
            'namaBarang' => 'required|min:2|max:200'
        ]);

        if ($request->has('image')) {
            $gambar = $request->image;
            $new_gambar = time() . $gambar->getClientOriginalName();

            $item = Item::create([
                'item_category_id' => $request->itemCategoryId,
                'item_type_id' => $request->itemTypeId,
                'uom_id' => $request->uomId,
                'code' => $request->kodeBarang,
                'name' => $request->namaBarang,
                'img_url' => 'uploads/images/' . $new_gambar,
                'description' => $request->description,
                'created_by' => Auth::id()
            ]);

            Image::make($gambar->getRealPath())->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/images/' . $new_gambar));
        } else {
            $item = Item::create([
                'item_category_id' => $request->itemCategoryId,
                'item_type_id' => $request->itemTypeId,
                'uom_id' => $request->uomId,
                'code' => $request->kodeBarang,
                'name' => $request->namaBarang,
                'description' => $request->description,
                'created_by' => Auth::id(),
            ]);
        }

        $listItemQtyId = [];
        $listItemPriceId = [];

        if ($request->batchId) {
            if ($request->qtyStock) {
                foreach ($request->qtyStock as $i => $value) {
                    $itemQty = ItemQty::create([
                        'qty' => $request->qtyStock[$i],
                        'qty_change' => $request->qtyStock[$i]
                    ]);

                    $listItemQtyId[$i] = $itemQty->id;
                }
            }

            if ($request->hargaModal || $request->hargaJual) {

                foreach ($request->hargaModal as $i => $value) {
                    $ItemPrice = ItemPrice::create([
                        'current_price' => $request->hargaModal[$i],
                        'price' => $request->hargaJual[$i]
                    ]);

                    $listItemPriceId[$i] = $ItemPrice->id;
                }
            }

            foreach ($request->batchId as $i => $value) {
                $stringTglProduksi = strtotime($request->tglProduksi[$i]);
                $tglProduksi = date('Y-m-d', $stringTglProduksi);

                $stringTglKadaluarsa = strtotime($request->tglKadaluarsa[$i]);
                $tglKadaluarsa = date('Y-m-d', $stringTglKadaluarsa);

                $itemStock = ItemStock::create([
                    'item_id' => $item->id,
                    'batch_stock' => $request->batchId[$i],
                    'item_qty_id' => $listItemQtyId[$i],
                    'item_price_id' => $listItemPriceId[$i],
                    'production_date' => $tglProduksi,
                    'expired_date' => $tglKadaluarsa,
                    'created_by' => Auth::id()
                ]);

                ItemHistory::create([
                    'item_stock_id' => $itemStock->id,
                    'transaction_type_id' => 1,
                    'qty' => $request->qtyStock[$i],
                    'qty_current' => 0,
                    'qty_change' => $request->qtyStock[$i],
                    'description' => "Tambah item baru",
                    'created_by' => Auth::id()
                ]);
            }
        }

        $message = 'Data Berhasil di simpan';

        DB::commit();
        return redirect()->route('item.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id, Item $item)
    {
        //
        $breadcumb = "Detail Barang";

        $item = Item::where('id', '=', $id)->get()[0];

        return view('item.show', compact('breadcumb', 'item'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function showAturStock($id, Item $item)
    {
        //
        $breadcumb = "Detail Barang";

        $item = Item::where('id', '=', $id)->get()[0];

        return view('item.showAturStock', compact('breadcumb', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function updateStock(Request $request, ItemStock $itemStock, ItemQty $itemQty, ItemPrice $itemPrice)
    {
        // dd($request->all());

        $this->validate($request, [
            'jumlahStock' => 'required'
        ]);

        DB::beginTransaction();

        try {

            if (!$request->stockId && !$request->qtyId && !$request->priceId) {
                $itemQtyId = [];
                $itemPriceId = [];

                if ($request->batchId) {
                    if ($request->jumlahStock) {
                        $itemQty = ItemQty::create([
                            'qty' => $request->jumlahStock,
                            'qty_change' => $request->jumlahStock
                        ]);

                        $itemQtyId = $itemQty->id;
                    }

                    if ($request->hargaModal || $request->hargaJual) {

                        $ItemPrice = ItemPrice::create([
                            'current_price' => $request->hargaModal,
                            'price' => $request->hargaJual
                        ]);

                        $itemPriceId = $ItemPrice->id;
                    }

                    $stringTglProduksi = strtotime($request->tglProduksi);
                    $tglProduksi = date('Y-m-d', $stringTglProduksi);

                    $stringTglKadaluarsa = strtotime($request->tglKadaluarsa);
                    $tglKadaluarsa = date('Y-m-d', $stringTglKadaluarsa);

                    $itemStock = ItemStock::create([
                        'item_id' => $request->itemId,
                        'batch_stock' => $request->batchId,
                        'item_qty_id' => $itemQtyId,
                        'item_price_id' => $itemPriceId,
                        'production_date' => $tglProduksi,
                        'expired_date' => $tglKadaluarsa,
                        'created_by' => Auth::id()
                    ]);

                    ItemHistory::create([
                        'item_stock_id' => $itemStock->id,
                        'transaction_type_id' => 1,
                        'qty' => $request->qtyStock,
                        'qty_current' => 0,
                        'qty_change' => $request->qtyStock,
                        'description' => "Tambah item baru",
                        'created_by' => Auth::id()
                    ]);
                }
            } else {
                $data = [
                    // 'qty' => (($itemQty->find($request->qtyId)->qty) + ($request->jumlahStock)),
                    'qty' => $request->jumlahStock,
                    'qty_change' => $request->jumlahStock
                ];

                $itemQty->find($request->qtyId)->update($data);

                $data = [
                    'current_price' => $request->hargaModal,
                    'price' => $request->hargaJual
                ];

                $itemPrice->find($request->priceId)->update($data);

                $stringTglProduksi = strtotime($request->tglProduksi);
                $tglProduksi = date('Y-m-d', $stringTglProduksi);

                $stringTglKadaluarsa = strtotime($request->tglKadaluarsa);
                $tglKadaluarsa = date('Y-m-d', $stringTglKadaluarsa);
                $data = [
                    'expired_date' => $tglKadaluarsa,
                    'production_date' => $tglProduksi
                ];

                $itemStock->find($request->stockId)->update($data);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } catch (\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Item $item)
    {
        // dd($id);
        $breadcumb = "Edit Barang";

        $item = $item->find($id);
        $itemCategories = ItemCategories::get();
        $itemType = ItemType::get();
        $uom = Uom::get();

        return view('item.edit', compact('breadcumb', 'item', 'itemCategories', 'itemType', 'uom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Item $item)
    {
        // dd($request->all());

        $this->validate($request, [
            'namaBarang' => 'required'
        ]);

        $item = $item->find($id);

        DB::beginTransaction();

        try {

            if ($request->image) {
                $gambar = $request->image;
                $new_gambar = time() . $gambar->getClientOriginalName();
                Image::make($gambar->getRealPath())->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/images/' . $new_gambar));

                File::delete(public_path($item->image));

                $product = [
                    'item_category_id' => $request->itemCategoryId,
                    'item_type_id' => $request->itemTypeId,
                    'uom_id' => $request->uomId,
                    'code' => $request->kodeBarang,
                    'name' => $request->namaBarang,
                    'img_url' => 'uploads/images/' . $new_gambar,
                    'description' => $request->description,
                    'created_by' => Auth::id(),
                ];
            } else {
                $product = [
                    'item_category_id' => $request->itemCategoryId,
                    'item_type_id' => $request->itemTypeId,
                    'uom_id' => $request->uomId,
                    'code' => $request->kodeBarang,
                    'name' => $request->namaBarang,
                    'description' => $request->description,
                    'created_by' => Auth::id(),
                ];
            }

            $item->update($product);

            $message = 'Data Berhasil di update';

            DB::commit();

            return redirect()->route('item.index')->with('success', $message);
        } catch (\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('error', 'Data gagal disimpan');
        }

        return redirect()->back()->with('error', 'Data gagal disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Item $item)
    {
        DB::beginTransaction();

        try {
            $item->find($id)->delete();

            DB::commit();
            return redirect()->route('item.index')->with('success', 'Barang berhasil dihapus');
        } catch (\Exeception $e) {
            DB::rollback();
            return redirect()->route('item.index')->with('error', $e);
        }
    }
}
