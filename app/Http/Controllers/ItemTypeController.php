<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use App\Http\Controllers\Controller;
use App\Models\ItemCategories;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "Jenis Barang";

        $itemTypes = ItemType::when(request('search'), function ($query) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('itemType.index', compact('breadcumb', 'itemTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Form Tambah Jenis Barang";

        $itemCategory = ItemCategories::get();

        return view('itemType.create', compact('breadcumb', 'itemCategory'));
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

        $this->validate($request, [
            'itemCategoryId' => 'required',
            'itemTypeName' => 'required'
        ]);

        DB::beginTransaction();

        try {

            ITemType::create([
                'item_category_id' => $request->itemCategoryId,
                'name' => $request->itemTypeName,
                'description' => $request->description,
            ]);

            DB::commit();
            if (request()->ajax()) {
                return response()->json(['data' => [
                    'success' => true,
                    'message' => "Berhasil tambah jenis kategori",
                ]]);
            } else {
                return redirect()->route('itemType.index')->with('success', 'Data berhasil disimpan');
            }
        } catch (\Exeception $e) {

            DB::rollback();
            if (request()->ajax()) {
                return response()->json(['data' => [
                    'success' => false,
                    'message' => "Gagal tambah kategori",
                ]]);
            } else {
                return redirect()->back()->with('errorTransaksi', 'Data gagal disimpan');
            }
        }

        return redirect()->back()->with('errorTransaksi', 'Data gagal disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function show(ItemType $itemType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ItemType $itemType)
    {
        // dd($id);
        $breadcumb = "Edit Kategori";

        $itemType = $itemType->find($id);
        $itemCategory = ItemCategories::get();

        return view('itemType.edit', compact('breadcumb', 'itemType', 'itemCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemType $itemType)
    {
        // dd($request->all());

        $this->validate($request, [
            'itemCategoryId' => 'required',
            'itemTypeName' => 'required'
        ]);

        DB::beginTransaction();

        try {

            $data = [
                'item_category_id' => $request->itemCategoryId,
                'name' => $request->itemTypeName,
                'description' => $request->description
            ];

            $itemType->find($request->id)->update($data);

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } catch (\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('error', 'Data gagal disimpan');
        }

        return redirect()->back()->with('error', 'Data gagal disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ItemType $itemType)
    {
        DB::beginTransaction();

        try {
            $itemType->find($id)->delete();

            DB::commit();
            return redirect()->route('itemType.index')->with('success', 'Kagegori berhasil dihapus');
        } catch (\Exeception $e) {
            DB::rollback();
            return redirect()->route('itemType.index')->with('error', $e);
        }
    }
}
