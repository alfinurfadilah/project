<?php

namespace App\Http\Controllers;

use App\Models\ItemHistory;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breadcumb = "Dashboard";

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


        $totalStockKeluar = ItemHistory::where('transaction_type_id', 2)->whereDate('created_at', Carbon::today())->sum('qty_change');

        return view('home', compact('breadcumb', 'dataTransaksiBulanIni', 'dataTransaksiHariIni', 'totalStockKeluar'));
    }
}
