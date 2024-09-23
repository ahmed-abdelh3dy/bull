<?php

namespace App\Http\Controllers;

use App\Models\produtes;
use App\Models\sections;
use Illuminate\Http\Request;

class ProdutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        $produtes = produtes::all();
        return view('Produtes.Produtes', compact('sections', 'produtes'));
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
        
        produtes::create([
            'descrption' => $request->descrption,
            'section_id' => $request->section_id,
            'produte_name' => $request->produte_name,

        ]);
        return redirect('Produtes');
        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(produtes $produtes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produtes $produtes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $id = sections::where('section_name', $request->section_name)->first()->id;

        $produtes = produtes::findOrFail($request->pro_id);

        $produtes->update([
            'produte_name' => $request->produte_name,
            'descrption' => $request->descrption,
            'section_id' => $id,
        ]);

        return back();


        // way 2

        // produtes::findorFail($id);
        // $produtes = produtes::findorFail($id);

        // $produtes->update(
        //     [

        //         // 'section_name' => $request->section_name,
        //         // 'descrption' => $request->descrption,

        //         'descrption' => $request->descrption,
        //         'section_id' => $request->section_id,
        //         'produte_name' => $request->produte_name,
        //     ]
        // );
        // return redirect('Produtes');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        produtes::findorFail($request->pro_id)->delete();
        return redirect('Produtes');


        // return $id;

    }
}
