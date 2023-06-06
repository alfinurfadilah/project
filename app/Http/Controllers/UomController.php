<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use DataTables;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $breadcumb = "Unit Of Measure";

        if ($request->ajax()) {
            $data = Uom::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('uom.index', compact('breadcumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Form Tambah Unit Of Measure";

        return view('uom.create', compact('breadcumb'));
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
            'namaUom' => 'required',
            'simbol' => 'required'
        ]);

        DB::beginTransaction();

        try {

            Uom::create([
                'uom_name' => $request->namaUom,
                'symbol' => $request->simbol,
                'description' => $request->description,
            ]);

            DB::commit();
            return redirect()->route('uom.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exeception $e) {

            DB::rollback();
            return redirect()->back()->with('errorTransaksi', 'Data gagal disimpan');
        }

        return redirect()->back()->with('errorTransaksi', 'Data gagal disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function show(Uom $uom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Uom $uom)
    {
        // dd($id);
        $breadcumb = "Edit Unit Of Measure";

        $uom = $uom->find($id);

        return view('uom.edit', compact('breadcumb', 'uom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uom $uom)
    {
        // dd($request->all());

        $this->validate($request, [
            'namaUom' => 'required',
            'simbol' => 'required'
        ]);

        DB::beginTransaction();

        try {

            $data = [
                'uom_name' => $request->namaUom,
                'symbol' => $request->simbol,
                'description' => $request->description
            ];

            $uom->find($request->id)->update($data);

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
     * @param  \App\Models\Uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Uom $uom)
    {
        DB::beginTransaction();

        try {
            $uom->find($id)->delete();

            DB::commit();
            return redirect()->route('uom.index')->with('success', 'Kagegori berhasil dihapus');
        } catch (\Exeception $e) {
            DB::rollback();
            return redirect()->route('uom.index')->with('error', $e);
        }
    }
}
