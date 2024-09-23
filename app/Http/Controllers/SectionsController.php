<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSectionRequest;


class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        return view('section.section ', compact('sections'));
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
    public function store(StoreSectionRequest $request)
    {
        $input = $request->all();

        $validated = $request->validated();





        sections::create([
            'descrption' => $request->descrption,
            'section_name' => $request->section_name,
            'created-by' => Auth::user()->name,
        ]);

        // sections::create([
        //     'section_name' => $request->section_name,
        //     'description' => $request->description,
        //     'Created_by' => (Auth::user()->name),

        // ]);
        session()->flash('success', 'تم حفظ البيانات بنجاح!');
        return redirect('sections');





        // if (sections::where('section_name', $input['section_name'])->exists()) {

        //     session()->flash('error', 'user is exists');
        //     return redirect('sections');
        // } else {
        //     sections::create([
        //         'descrption' => $request->descrption,
        //         'section_name' => $request->section_name,
        //         'created-by' => Auth::user()->name,
        //     ]);
        //     session()->flash('success', 'تم حفظ البيانات بنجاح!');
        //     return redirect('sections');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request)
    // {
    //     echo 'ahmed';
    // }


    public function update(Request $request, $id)
    {
        $sections = sections::findorFail($id);

        $sections->update(
            [

                'section_name' => $request->section_name,
                'descrption' => $request->descrption,
            ]
        );
        return redirect('sections');
        // return $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        sections::findorFail($id)->delete();
        return back();
        // return $id;
    }
}
