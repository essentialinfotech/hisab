<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Revenue;
use App\Models\RevenueCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_revenue'] = Revenue::where('user_id', Auth::user()->id)->get();
        $data['revenue_categories'] = RevenueCategory::where('user_id', Auth::user()->id)->get();
        return view('pages.revenue.index', $data);
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
        $request->validate([
            'revenue_category_id' => 'required',
            'amount' => 'required',
        ]);
        
        $data = new Revenue();
        $data->revenue_category_id = $request->revenue_category_id;
        $data->amount = $request->amount;
        $data->date = date("Y-d-m", strtotime($request->date));
        $data->note = $request->note;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success', 'Data Saved Successfully');
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
        $request->validate([
            'revenue_category_id' => 'required',
            'amount' => 'required',
        ]);

        $data = Revenue::where('user_id', Auth::user()->id)->findOrFail($id);
        $data->revenue_category_id = $request->revenue_category_id;
        $data->amount = $request->amount;
        $data->date = date("Y-d-m", strtotime($request->date));
        $data->note = $request->note;
        $data->user_id = Auth::user()->id;
        $data->update();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data = Revenue::where('user_id', Auth::user()->id)->findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
