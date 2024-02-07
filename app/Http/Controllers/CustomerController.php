<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "Customer";

        $customers= Customer::when(request('search'), function($query){
            return $query->where('name','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('customer.index', compact('breadcumb', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Form Tambah Customer";
        
        return view('customer.create', compact('breadcumb'));
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

            Customer::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email, 
                'address' => $request->address 
            ]);

            DB::commit();
            return redirect()->route('customer.index')->with('success','Data berhasil disimpan');

        } catch(\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('errorTransaksi','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('errorTransaksi','Data gagal disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Customer $customer)
    {
        // dd($id);
        $breadcumb = "Edit Customer";

        $customer = $customer->find($id);
                    
        return view('customer.edit', compact('breadcumb', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
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

            $customer->find($request->id)->update($data);

            DB::commit();   
            return redirect()->route('customer.index')->with('success','Data Berhasil Disimpan'); 

        } catch(\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('error','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('error','Data gagal disimpan'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Customer $customer)
    {
        //
        DB::beginTransaction();

        try{
            $customer->find($id)->delete();     

            DB::commit();
            return redirect()->route('customer.index')->with('success','Customer berhasil dihapus');                             
        }
        catch(\Exeception $e){
            DB::rollback();      
            return redirect()->route('customer.index')->with('error',$e);      
        }  
    }
}
