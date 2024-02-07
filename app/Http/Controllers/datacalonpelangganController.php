<?php

namespace App\Http\Controllers;

use App\Models\datacalonpelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class datacalonpelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "List Data Calon Pelanggan";

        $datacalonpelanggan= datacalonpelanggan::when(request('search'), function($query){
            return $query->where('name','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('datacalonpelanggan.index', compact('breadcumb', 'datacalonpelanggan'));
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Form Tambah Data Calon Pelanggan";
        
        return view('datacalonpelanggan.create', compact('breadcumb'));
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
            'Nama' => 'required',
            'Foto' => 'required|image|max:2048',
            'Nomor_Handphone' => 'required',
            'Nama_Paket' => 'required',
            'Alamat_Pemasangan' => 'required',
            'Titik_Kordinat' => 'required',
            // 'Hasil_Soft_Survey' => 'nullable'
        
            ]);
        DB::beginTransaction();

        try{

            $data = new datacalonpelanggan();
            $data->Nama = $request->Nama;
            $data->Nomor_Handphone = $request->Nomor_Handphone;
            $data->Nama_Paket = $request->Nama_Paket;
            $data->Alamat_Pemasangan = $request->Alamat_Pemasangan;
            $data->Titik_Kordinat = $request->Titik_Kordinat;
    
            if ($request->hasFile('Foto')) {
                $array['Foto'] = $request->file('Foto')->store('Foto');
                $data->Foto = $array['Foto'];
            }
    
            $data->save();
    
            // DB::commit();
            return redirect()->route('datacalonpelanggan.index')->with('success','Data berhasil disimpan');

        } catch(\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('errorTransaksi','Data gagal disimpan');    
                
        }

        return redirect()->back()->with('errorTransaksi','Data gagal disimpan');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datacalonpelanggan  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id, datacalonpelanggan $datacalonpelanggan)
    {
        // dd($id);
        $breadcumb = "Edit Data Calon Pelanggan";

        $datacalonpelanggan = $datacalonpelanggan->find($id);
                    
        return view('dtacalonpelanggan.edit', compact('breadcumb', 'datacalonpelanggn'));
    }

    
}