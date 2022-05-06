<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\MOdels\Category;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::all();
        return view('index', ['offices' => $offices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $office = new Office;
        $office->name = request('name');
        $office->address = request('address');
        $office->category_id = request('category_id');
        $office->save();
        return redirect()->route('office.detail', ['id' => $office->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office, $id)
    {
        $office = Office::find($id);
        return view('show', ['office' => $office]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office, $id)
    {
        $office = Office::find($id);
        $categories = Category::all()->pluck('name', 'id');
        return view('edit', ['office' => $office, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Office $office)
    {
        $office = Office::find($id);
        $office->name = request('name');
        $office->address = request('address');
        $office->category_id = request('category_id');
        $office->save();
        return redirect()->route('office.detail', ['id' => $office->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = Office::find($id);
        $office->delete();
        return redirect('/offices');
    }
}
