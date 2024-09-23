<?php

namespace App\Http\Controllers;

use App\Models\bull;
use App\Models\sections;
use App\Models\bull_detalies;
use Illuminate\Http\Request;

class BullDetaliesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $bull = bull::where('id', $id)->first();

        return view('bull.tabs', compact('bull'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(bull_detalies $bull_detalies)
    {
        $bull = bull::all();
        return view('bull.soft', compact('bull'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bull = bull::where('id', $id)->first();
        $sections = sections::all();
        return view('bull.edit', compact('sections', 'bull'));
        // return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bull_detalies $bull_detalies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bull_detalies $bull_detalies)
    {
        //
    }
}
