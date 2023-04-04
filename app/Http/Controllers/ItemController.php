<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemStock;
use App\Models\ItemQty;
use App\Models\ItemPrice;
use App\Models\ItemCategories;
use App\Models\ItemType;
use App\Models\Uom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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

        $items = Item::when(request('search'), function($query){
            return $query->where('item_name','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')
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

        if($request->has('image')){
            $gambar = $request->image;
            $new_gambar = time().$gambar->getClientOriginalName();

            $item = Item::create([
                'item_category_id' => $request->itemCategoryId,
                'item_type_id' => $request->itemTypeId,
                'uom_id' => $request->uomId,
                'code' => $request->kodeBarang,
                'name' => $request->namaBarang,
                'img_url' => 'uploads/images/'.$new_gambar,
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
                
                ItemStock::create([
                    'item_id' => $item->id,
                    'batch_stock' => $request->batchId[$i],
                    'item_qty_id' => $listItemQtyId[$i],
                    'item_price_id' => $listItemPriceId[$i],
                    'production_date' => $tglProduksi,
                    'expired_date' => $tglKadaluarsa,
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
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
