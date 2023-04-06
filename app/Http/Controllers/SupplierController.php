<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "Supplier";

        $suppliers = Supplier::when(request('search'), function($query){
            return $query->where('name','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('supplier.index', compact('breadcumb', 'suppliers'));
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
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ]);

        DB::beginTransaction();

        try{

            Supplier::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'mobile_phone' => $request->mobilephone,
                'email' => $request->email, 
                'address' => $request->address,
                'description' => $request->description
            ]);

            DB::commit();
            return redirect()->route('supplier.index')->with('success','Data berhasil disimpan');

        } catch(\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('errorTransaksi','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('errorTransaksi','Data gagal disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Supplier $supplier)
    {
        // dd($id);
        $breadcumb = "Edit Customer";

        $supplier = $supplier->find($id);
                    
        return view('supplier.edit', compact('breadcumb', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ]);

        DB::beginTransaction();

        try{

            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address
            ];

            $supplier->find($request->id)->update($data);

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
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Supplier $supplier)
    {
        //
        DB::beginTransaction();

        try{
            $supplier->find($id)->delete();     

            DB::commit();
            return redirect()->route('customer.index')->with('success','Customer berhasil dihapus');                             
        }
        catch(\Exeception $e){
            DB::rollback();      
            return redirect()->route('customer.index')->with('error',$e);      
        }
    }
}
