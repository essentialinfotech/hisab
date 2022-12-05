<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cost;
use App\Models\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $data['totalCost'] = Cost::where('user_id', Auth::user()->id)->sum('amount');
        $data['totalRevenue'] = Revenue::where('user_id', Auth::user()->id)->sum('amount');
        $data['totalCash'] = $data['totalRevenue'] - $data['totalCost'];
        return view('pages.report.index', $data);
    }

    // Cost
    public function cost_report_all()
    {
        $data['title'] = "Expense List";
        $data['allCost'] = Cost::where('user_id', Auth::user()->id)->get();
        return view('pages.report.cost-report', $data);
    }

    public function cost_report(Request $request)
    {
        // return $data['allCost'] =   Cost::whereMonth('date', '04')->get();


        if ($request->reports == 'dailyReports') {
            $data['title'] =  Carbon::parse($request->sdate)->format('d F Y') . ' - ' . Carbon::parse($request->edate)->format('d F Y');
            $sdate = date("Y-d-m", strtotime($request->sdate));
            $edate = date("Y-d-m", strtotime($request->edate));
            $data['allCost'] = Cost::where('user_id', Auth::user()->id)->whereBetween('date', [$sdate, $edate])->get();
        } elseif ($request->reports == 'monthlyReports') {
            $data['title'] =  $request->month. $request->year;
            $data['allCost'] =   Cost::whereMonth('date', $request->month)->whereYear('date', $request->year)->get();
        } elseif ($request->reports == 'yearlyReports') {
            $data['title'] =  $request->ryear;
            $data['allCost'] = Cost::where('user_id', Auth::user()->id)->whereYear('date', $request->ryear)->get();
        } else {
            $data['title'] = "Expense List";
            $data['allCost'] = Cost::where('user_id', Auth::user()->id)->get();
        }
        return view('pages.report.cost-report', $data);
    }


    // Revenue
    public function revenue_report_all()
    {
        $data['title'] = "Revenue List";
        $data['allRevenue'] = Revenue::where('user_id', Auth::user()->id)->get();
        return view('pages.report.revenue-report', $data);
    }

    public function revenue_report(Request $request)
    {
        // return $request->all();

        $data['title'] =  Carbon::parse($request->sdate)->format('d F Y') . ' - ' . Carbon::parse($request->edate)->format('d F Y');
        $sdate = date("Y-d-m", strtotime($request->sdate));
        $edate = date("Y-d-m", strtotime($request->edate));
        $data['allRevenue'] = Revenue::where('user_id', Auth::user()->id)->whereBetween('date', [$sdate, $edate])->get();
        return view('pages.report.revenue-report', $data);
    }
}
