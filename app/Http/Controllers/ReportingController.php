<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ItemHistory;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;

use DB;

class ReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanPenjualan()
    {
        $breadcumb = "Laporan Penjualan";

        $dataTransaksiBulanIni = DB::select("
            SELECT SUM(transaction_items.qty * transaction_items.selling_price) AS TOTAL_PENJUALAN, SUM(transaction_items.qty * item_prices.current_price) AS TOTAL_MODAL_PENJUALAN, (SUM(transaction_items.qty * transaction_items.selling_price) - SUM(transaction_items.qty * item_prices.current_price)) AS TOTAL_MARGIN 
            FROM transaction_items
            JOIN items ON transaction_items.item_id = items.id
            JOIN item_stocks ON items.id = item_stocks.item_id
            JOIN item_prices ON item_stocks.item_price_id = item_prices.id
            WHERE item_stocks.batch_stock = transaction_items.batch_id
            AND MONTH(transaction_items.created_at) = '" . date('m') . "'
        ");

        $dataTransaksiHariIni = DB::select("
            SELECT SUM(transaction_items.qty * transaction_items.selling_price) AS TOTAL_PENJUALAN, SUM(transaction_items.qty * item_prices.current_price) AS TOTAL_MODAL_PENJUALAN, (SUM(transaction_items.qty * transaction_items.selling_price) - SUM(transaction_items.qty * item_prices.current_price)) AS TOTAL_MARGIN 
            FROM transaction_items
            JOIN items ON transaction_items.item_id = items.id
            JOIN item_stocks ON items.id = item_stocks.item_id
            JOIN item_prices ON item_stocks.item_price_id = item_prices.id
            WHERE item_stocks.batch_stock = transaction_items.batch_id
            AND DATE(transaction_items.created_at) = '" . date('Y-m-d') . "'
        ");

        $transactionHistory = TransactionHistory::when(request('search'), function ($query) {
            return $query->where('transaction_id', 'like', '%' . request('search') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('reporting.laporanPenjualan', compact('breadcumb', 'dataTransaksiBulanIni', 'dataTransaksiHariIni', 'transactionHistory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanTransaksiStock()
    {
        $breadcumb = "Laporan Transaksi Stock";

        $totalStockMasuk = ItemHistory::where('transaction_type_id', 1)->sum('qty');
        $totalStockKeluar = ItemHistory::where('transaction_type_id', 2)->sum('qty');

        $listTransaksiStock = DB::select('SELECT items.name, item_stocks.batch_stock AS BATCH_CODE, transaction_types.name AS TRX_TYPE, item_histories.description, item_histories.qty, item_histories.qty_current, item_histories.qty_change FROM item_histories
        JOIN item_stocks ON item_histories.item_stock_id = item_stocks.id
        JOIN items ON item_stocks.item_id = items.id
        JOIN transaction_types ON item_histories.transaction_type_id = transaction_types.id
        ORDER BY item_histories.id DESC');

        return view('reporting.laporanTransaksiStock', compact('breadcumb', 'totalStockMasuk', 'totalStockKeluar', 'listTransaksiStock'));
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
    }
}
