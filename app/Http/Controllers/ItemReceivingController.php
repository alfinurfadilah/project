<?php

namespace App\Http\Controllers;

use App\Models\ItemReceiving;
use App\Models\Supplier;
use App\Models\Item;
use App\Models\TransactionItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemReceivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcumb = "Penerimaan Barang";

        return View ("itemReceiving.index", compact('breadcumb'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcumb = "Tambah Penerimaan Barang";

        $supplier = Supplier::all();
        $barang = Item::all();
        return View ("itemReceiving.create", compact('breadcumb','supplier','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'uomId' => 'required',
        //     'qty' => 'required|numeric',
        //     'description' => 'nullable|string',
        // ]);

        // // Create a new ItemReceiving instance and populate its attributes
        // $itemReceiving = new ItemReceiving();
        // // Set other attributes as needed
        // $itemReceiving->save();

        // // Create a new TransactionItem instance and populate its attributes
        // $transactionItem = new TransactionItem();
        // $transactionItem->uom_id = $validatedData['uomId'];
        // $transactionItem->qty = $validatedData['qty'];
        // $transactionItem->description = $validatedData['description'];
        // $transactionItem->item_receiving_id = $itemReceiving->id; // Assuming you have a relationship between ItemReceiving and TransactionItem

        // // Save the new transaction item to the database
        // $transactionItem->save();

        // // You can return a response to the AJAX request
        // // For example, you can return a success message or the new item's ID
        // return response()->json(['message' => 'Item added successfully', 'itemId' => $transactionItem->id]);
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemReceiving  $itemReceiving
     * @return \Illuminate\Http\Response
     */
    public function show(ItemReceiving $itemReceiving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemReceiving  $itemReceiving
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemReceiving $itemReceiving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemReceiving  $itemReceiving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemReceiving $itemReceiving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemReceiving  $itemReceiving
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemReceiving $itemReceiving)
    {
        //
    }
}
