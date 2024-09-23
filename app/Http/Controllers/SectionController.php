<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSectionRequest;

class SectionController extends Controller
{


    public function index()
    {
        $sections = sections::all();
        return view('section.section ', compact('sections'));
    }



    public function store(StoreSectionRequest $request)
    {
        $input = $request->all();

        $validated = $request->validated();





        sections::create([
            'descrption' => $request->descrption,
            'section_name' => $request->section_name,
            'created-by' => Auth::user()->name,
        ]);
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

    public function update(Request $request, $id)
    {
        $sections = sections::findorFail($id);

        // $sections->update(
        //     [
        //     'descrption' => $request->descrption,
        //     'section_name' => $request->section_name,
        //     ]
        // );
        // return redirect('sections');
        // return $id;

    }



    public function destroy(string $id)
    {
        // sections::findorFail($id)->delete();

        // return $id;

        //     sections::destroy($id);
        //    return redirect('sections');
    }
}
