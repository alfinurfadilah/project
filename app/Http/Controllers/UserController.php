<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "List User";

        $users= user::when(request('search'), function($query){
            return $query->where('name','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('user.index', compact('breadcumb', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Form Tambah User";
        
        return view('users.create', compact('breadcumb'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|confirmed'
        ]);

        // DB::beginTransaction();

        $hashedPassword = Hash::make($request->input('password'));

        try{

            User::create([
                'name' => $request->name,
                'email' => $request->input('email'),
                'password' => $hashedPassword, 
                 
            ]);

            // DB::commit();
            return redirect()->route('users.index')->with('success','Data berhasil disimpan');

        } catch(\Exeception $e) {

            // DB::rollback();
            return redirect()->back()->with('errorTransaksi','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('errorTransaksi','Data gagal disimpan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $breadcumb = "Edit User";

        $users = $users->find($id);
                    
        return view('users.edit', compact('breadcumb', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        // DB::beginTransaction();

        try{

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                
            ];

            $users->find($request->id)->update($data);

            // DB::commit();   
            return redirect()->back()->with('success','Data Berhasil Disimpan'); 

        } catch(\Exeception $e) {

            // DB::rollback();
            return redirect()->back()->with('error','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('error','Data gagal disimpan'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // DB::beginTransaction();

        try{
            $users = User::find($id);

        if ($users) {
            // Delete the user
            $users->delete();
            DB::commit();
            return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
        } else {
            // Handle the case where the user is not found
            return redirect()->route('users.index')->with('error', 'User tidak ditemukan');
        }                            
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
    }
}
