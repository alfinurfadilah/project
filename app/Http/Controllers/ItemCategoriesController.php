<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use App\Models\ItemCategoryType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ItemCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "Kategori";

        $itemCategories = ItemCategories::with('itemCategoryType')->when(request('search'), function($query){
            return $query->where('name','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('itemCategory.index', compact('breadcumb', 'itemCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Form Tambah Kategori";

        $itemCategoryType = ItemCategoryType::get();
        
        return view('itemCategory.create', compact('breadcumb', 'itemCategoryType'));
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
            'itemCategoryTypeId' => 'required',
            'name' => 'required'
        ]);

        DB::beginTransaction();

        try{

            ItemCategories::create([
                'item_category_type_id' => $request->itemCategoryTypeId,
                'name' => $request->name,
                'description' => $request->description, 
            ]);

            DB::commit();   
            return redirect()->route('itemCategory.index')->with('success','Data berhasil disimpan');

        } catch(\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('errorTransaksi','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('errorTransaksi','Data gagal disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemCategories  $itemCategories
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCategories $itemCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemCategories  $itemCategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ItemCategories $itemCategories)
    {
        // dd($id);
        $breadcumb = "Edit Kategori";

        $itemCategory = $itemCategories->find($id);
                    
        return view('itemCategory.edit', compact('breadcumb', 'itemCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemCategories  $itemCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemCategories $itemCategories)
    {
        // dd($request->all());

        $this->validate($request, [
            'itemCategoryTypeId' => 'required',
            'name' => 'required'
        ]);

        DB::beginTransaction();

        try{

            $data = [
                'item_category_type_id' => $request->itemCategoryTypeId,
                'name' => $request->name,
                'description' => $request->description
            ];

            $itemCategories->find($request->id)->update($data);

            DB::commit();   
            return redirect()->back()->with('success','Data Berhasil Disimpan'); 

        } catch(\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('error','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('error','Data gagal disimpan'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemCategories  $itemCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ItemCategories $itemCategories)
    {
        DB::beginTransaction();

        try{
            $itemCategories->find($id)->delete();     

            DB::commit();
            return redirect()->route('itemCategory.index')->with('success','Kagegori berhasil dihapus');                             
        }
        catch(\Exeception $e){
            DB::rollback();      
            return redirect()->route('itemCategory.index')->with('error', $e);      
        }  
    }
}
