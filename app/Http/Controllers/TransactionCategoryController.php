<?php

namespace App\Http\Controllers;

use App\Models\TransactionCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TransactionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "Kategori Transaksi";

        $transactionCategory = TransactionCategory::when(request('search'), function($query){
            return $query->where('name','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('transactionCategory.index', compact('breadcumb', 'transactionCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Form Tambah Kategori Transaksi";
        
        return view('transactionCategory.create', compact('breadcumb'));
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

            TransactionCategory::create([
                'name' => $request->name,
                'description' => $request->description, 
            ]);

            DB::commit();   
            return redirect()->route('transactionCategory.index')->with('success','Data berhasil disimpan');

        } catch(\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('errorTransaksi','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('errorTransaksi','Data gagal disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionCategory $transactionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id, TransactionCategory $transactionCategory)
    {
        // dd($id);
        $breadcumb = "Edit Kategori Transaksi";

        $transactionCategory = $transactionCategory->find($id);
                    
        return view('transactionCategory.edit', compact('breadcumb', 'transactionCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionCategory $transactionCategory)
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

            $transactionCategory->find($request->id)->update($data);

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
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, TransactionCategory $transactionCategory)
    {
        DB::beginTransaction();

        try{
            $transactionCategory->find($id)->delete();     

            DB::commit();
            return redirect()->route('transactionCategory.index')->with('success','Kagegori berhasil dihapus');                             
        }
        catch(\Exeception $e){
            DB::rollback();      
            return redirect()->route('transactionCategory.index')->with('error', $e);      
        }
    }
}
