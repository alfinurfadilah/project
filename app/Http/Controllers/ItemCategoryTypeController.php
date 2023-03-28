<?php

namespace App\Http\Controllers;

use App\Models\ItemCategoryType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ItemCategoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "Jenis Kategori";

        $itemCategoryType = ItemCategoryType::when(request('search'), function($query){
            return $query->where('name','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('itemCategoryType.index', compact('breadcumb', 'itemCategoryType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Form Tambah Jenis Kategori";
        
        return view('itemCategoryType.create', compact('breadcumb'));
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
            'name' => 'required'
        ]);

        DB::beginTransaction();

        try{

            ItemCategoryType::create([
                'name' => $request->name,
                'description' => $request->description, 
            ]);

            DB::commit();   
            return redirect()->route('itemCategoryType.index')->with('success','Data berhasil disimpan');

        } catch(\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('errorTransaksi','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('errorTransaksi','Data gagal disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemCategoryType  $itemCategoryType
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCategoryType $itemCategoryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemCategoryType  $itemCategoryType
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ItemCategoryType $itemCategoryType)
    {
        // dd($id);
        $breadcumb = "Edit Jenis Kategori";

        $itemCategoryType = $itemCategoryType->find($id);
                    
        return view('itemCategoryType.edit', compact('breadcumb', 'itemCategoryType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemCategoryType  $itemCategoryType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemCategoryType $itemCategoryType)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required'
        ]);

        DB::beginTransaction();

        try{

            $data = [
                'name' => $request->name,
                'description' => $request->description
            ];

            $itemCategoryType->find($request->id)->update($data);

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
     * @param  \App\Models\ItemCategoryType  $itemCategoryType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ItemCategoryType $itemCategoryType)
    {
        DB::beginTransaction();

        try{
            $itemCategoryType->find($id)->delete();     

            DB::commit();
            return redirect()->route('itemCategoryType.index')->with('success','Kagegori berhasil dihapus');                             
        }
        catch(\Exeception $e){
            DB::rollback();      
            return redirect()->route('itemCategoryType.index')->with('error', $e);      
        }  
    }
}
