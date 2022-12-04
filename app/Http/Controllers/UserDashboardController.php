<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\User;
use App\Models\Setting;
use App\Models\Customer;
use App\Models\Revenue;
use App\Models\Warhouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {

        $data['setting'] = Setting::first();

        // total
        $data['totalCost'] = Cost::where('user_id', Auth::user()->id)->sum('amount');
        $data['totalRevenue'] = Revenue::where('user_id', Auth::user()->id)->sum('amount');

        // today
        $data['todayCost'] = Cost::where('user_id', Auth::user()->id)->whereDate('date', Carbon::today())->sum('amount');
        $data['todayRevenue'] = Revenue::where('user_id', Auth::user()->id)->whereDate('date', Carbon::today())->sum('amount');

        // this week
        $data['weekCost'] = Cost::where('user_id', Auth::user()->id)->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
        $data['weekRevenue'] = Revenue::where('user_id', Auth::user()->id)->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');

        // this month
        $data['monthCost'] =   Cost::whereMonth('date', date('m'))->whereYear('date', date('Y'))->sum('amount');
        $data['monthRevenue'] =  Revenue::whereMonth('date', date('m'))->whereYear('date', date('Y'))->sum('amount');

        // this year
        $data['yearCost'] =   Cost::whereYear('date', date('Y'))->sum('amount');
        $data['yearRevenue'] =  Revenue::whereYear('date', date('Y'))->sum('amount');
        return view('dashboard', $data);
    }
}
