<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\StoreIn;
use App\Models\Unit;
use App\Models\Warhouse;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class StoreInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['stores'] = StoreIn::with('unit')->get();
        $data['customers'] = Customer::all();
        $data['warhouses'] = Warhouse::all();
        $data['units'] = Unit::all();
        return view('pages.store-in.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['customers'] = Customer::all();
        $data['warhouses'] = Warhouse::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        $data['products'] = Product::all();
        return view('pages.store-in.create', $data);
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
            'name' => 'required',
            'unit_id' => 'required',
            'qty' => 'required',
            'container' => 'required',
            'customer_id' => 'required',
            'warhouse_id' => 'required',
            'price' => 'required',
            'date' => 'required',
        ]);

        $data = new StoreIn();
        $data->name = $request->name;
        $data->unit_id = $request->unit_id;
        $data->qty = $request->qty;
        $data->container = $request->container;
        $data->customer_id = $request->customer_id;
        $data->warhouse_id = $request->warhouse_id;
        $data->price = $request->price;
        $data->date = $request->date;
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
            'name' => 'required',
            'unit_id' => 'required',
            'qty' => 'required',
            'container' => 'required',
            'customer_id' => 'required',
            'warhouse_id' => 'required',
            'price' => 'required',
            'date' => 'required',
        ]);

        $data = StoreIn::findOrFail($id);
        $data->name = $request->name;
        $data->unit_id = $request->unit_id;
        $data->qty = $request->qty;
        $data->container = $request->container;
        $data->customer_id = $request->customer_id;
        $data->warhouse_id = $request->warhouse_id;
        $data->price = $request->price;
        $data->date = $request->date;
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
        $data = StoreIn::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
