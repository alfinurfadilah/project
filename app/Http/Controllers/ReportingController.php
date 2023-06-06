<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ItemHistory;
use App\Models\TransactionHistory;
use App\Models\TransactionType;
use Illuminate\Http\Request;

use DB;
use DataTables;
use Carbon\Carbon;



class ReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanPenjualan(Request $request)
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

        $totalStockKeluar = ItemHistory::where('transaction_type_id', 2)->whereDate('created_at', Carbon::today())->sum('qty_change');

        if ($request->ajax()) {
            $data = TransactionHistory::latest();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('invoice', function ($row) {
                    return "INV-00" . $row->transaction_id;
                })
                ->addColumn('jumlah_penjualan', function ($row) {
                    return "Rp. " . number_format($row->total);
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('transactionItem.detail', $row->id) . '" class="btn btn-icon btn-primary me-2 mb-2"
                    title="Klik untuk melihat detail invoice">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen005.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path opacity="0.3"
                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z"
                                fill="black" />
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>';
                })
                ->make(true);
        }

        return view('reporting.laporanPenjualan', compact('breadcumb', 'dataTransaksiBulanIni', 'dataTransaksiHariIni', 'totalStockKeluar'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanTransaksiStock(Request $request)
    {
        $breadcumb = "Laporan Transaksi Stock";

        $totalStockMasuk = ItemHistory::where('transaction_type_id', 1)->sum('qty_change');
        $totalStockKeluar = ItemHistory::where('transaction_type_id', 2)->sum('qty_change');

        if ($request->ajax()) {

            $query = "SELECT item_histories.created_at AS TGL_TRX, items.name, item_stocks.batch_stock AS BATCH_CODE, transaction_types.name AS TRX_TYPE, item_histories.description, item_histories.qty, item_histories.qty_current, item_histories.qty_change,
            item_histories.transaction_type_id AS TRX_TYPE_ID
            FROM item_histories
            JOIN item_stocks ON item_histories.item_stock_id = item_stocks.id
            JOIN items ON item_stocks.item_id = items.id
            JOIN transaction_types ON item_histories.transaction_type_id = transaction_types.id";

            // if (!empty($request->get('search')['value'])) {
            //     $query += "WHERE items.name LIKE %" . $request->get('search') . "% AND WHERE item_stocks.batch_stock LIKE %" . $request->get('search') . "%";
            // }

            // dd($query);

            // if (!empty($request->get('tanggal'))) {
            //     $beginDate = "";
            //     $endDate = "";

            //     if ($request->get('tanggal') != "Invalid date/Invalid date") {
            //         $explodeDateRange = explode("/", $request->get('tanggal'));
            //         $beginDate = $explodeDateRange[0];
            //         $endDate = $explodeDateRange[1];
            //     }

            //     // dd($request->get('tanggal'));
            //     $query += "WHERE item_histories.created_at BETWEEN '" . $beginDate . "' AND '" . $endDate . "'";
            // }
            // if (!empty($request->get('jenisTransaksi'))) {
            //     dd($request->get('jenisTransaksi'));
            //     $query = "WHERE item_histories.transaction_type_id = $request->get('jenisTransaksi')";
            // }

            $data = DB::select($query);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('in_out', function ($row) {
                    if ($row->TRX_TYPE_ID == 2) {
                        return '(' . $row->qty_change . ')';
                    } else {
                        return $row->qty_change;
                    }
                })
                ->make(true);
        }

        $transactionTypes = TransactionType::get();

        return view('reporting.laporanTransaksiStock', compact('breadcumb', 'totalStockMasuk', 'totalStockKeluar', 'transactionTypes'));
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
