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
        
        if ($request->reports == 'dailyReports') {
            $sdate = date("Y-d-m", strtotime($request->sdate));
            $edate = date("Y-d-m", strtotime($request->edate));

            $data['title'] =  date_format(date_create($sdate), "d M Y") . ' - ' . date_format(date_create($edate), "d M Y");

            $data['allCost'] = Cost::where('user_id', Auth::user()->id)->whereBetween('date', [$sdate, $edate])->get();
        } elseif ($request->reports == 'monthlyReports') {
            $data['title'] =  date('F', mktime(0, 0, 0, $request->month, 10)) . ' ' . $request->year;
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
        if ($request->reports == 'dailyReports') {
            $sdate = date("Y-d-m", strtotime($request->sdate));
            $edate = date("Y-d-m", strtotime($request->edate));

            $data['title'] =  date_format(date_create($sdate), "d M Y") . ' - ' . date_format(date_create($edate), "d M Y");
            
            $data['allRevenue'] = Revenue::where('user_id', Auth::user()->id)->whereBetween('date', [$sdate, $edate])->get();
        } elseif ($request->reports == 'monthlyReports') {
            $data['title'] =  date('F', mktime(0, 0, 0, $request->month, 10)) . ' ' . $request->year;
            $data['allRevenue'] =   Revenue::whereMonth('date', $request->month)->whereYear('date', $request->year)->get();
        } elseif ($request->reports == 'yearlyReports') {
            $data['title'] =  $request->ryear;
            $data['allRevenue'] = Revenue::where('user_id', Auth::user()->id)->whereYear('date', $request->ryear)->get();
        } else {
            $data['title'] = "Expense List";
            $data['allRevenue'] = Revenue::where('user_id', Auth::user()->id)->get();
        }
        return view('pages.report.revenue-report', $data);
    }
}
