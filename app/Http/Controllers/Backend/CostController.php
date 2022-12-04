<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\CostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_cost'] = Cost::get();
        $data['cost_categories'] = CostCategory::get();
        return view('pages.cost.index', $data);
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
            'cost_category_id' => 'required',
            'amount' => 'required',
        ]);

        $data = new Cost();
        $data->cost_category_id = $request->cost_category_id;
        $data->amount = $request->amount;
        $data->date = $request->date;
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
            'cost_category_id' => 'required',
            'amount' => 'required',
        ]);

        $data = Cost::findOrFail($id);
        $data->cost_category_id = $request->cost_category_id;
        $data->amount = $request->amount;
        $data->date = $request->date;
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
        $data = Cost::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
