<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cost_categories'] = CostCategory::where('user_id', Auth::user()->id)->get();
        return view('pages.cost-category.index', $data);
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
            'name' => 'required|unique:cost_categories,name',
        ]);

        $data = new CostCategory();
        $data->name = $request->name;
        $data->description = $request->description;
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
            'name' => 'required|unique:cost_categories,name,'.$id,
        ]);

        $data = CostCategory::where('user_id', Auth::user()->id)->findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
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
        $warhouse = CostCategory::where('user_id', Auth::user()->id)->findOrFail($id);
        $warhouse->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
