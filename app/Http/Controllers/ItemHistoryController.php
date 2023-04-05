<?php

namespace App\Http\Controllers;

use App\Models\ItemHistory;
use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcumb = "History Barang";

        $items = Item::when(request('search'), function($query){
            return $query->where('item_name','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        
        return view('itemHistory.index', compact('breadcumb', 'items'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemHistory  $itemHistory
     * @return \Illuminate\Http\Response
     */
    public function show($id, ItemHistory $itemHistory)
    {
        //
        $breadcumb = "Detail History Barang";

        $item = Item::where('id', '=', $id)->get()[0];

        // dd($item);
        
        return view('itemHistory.show', compact('breadcumb', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemHistory  $itemHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemHistory $itemHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemHistory  $itemHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemHistory $itemHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemHistory  $itemHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemHistory $itemHistory)
    {
        //
    }
}
