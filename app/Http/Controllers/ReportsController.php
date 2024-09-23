<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bull;
use App\Models\sections;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('reports.reports');
    }

    public function cindex()
    {
        $sections = sections::all();
        return view('reports.creports', compact('sections'));
    }

    public function report(Request $request)
    {
        $rdio = $request->rdio;
        if ($rdio == 1) {


            if ($request->type && $request->start_at == '' && $request->end_at == '') {

                $bulls = bull::select('*')->where('Status', '=', $request->type)->get();
                $type = $request->type;
                // dd($request->all());

                // dd($bulls);
                // return $bulls;
                return view('reports.reports', compact('type'))->with('details', $bulls);
            }

            // في حالة تحديد تاريخ استحقاق
            else {

                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;

                $bulls = bull::whereBetween('bull_date', [$start_at, $end_at])->where('Status', '=', $request->type)->get();

                return view('reports.reports', compact('type', 'start_at', 'end_at'))->with('details', $bulls);
            }
        } else {

            $bulls = bull::select('*')->where('bull-number', '=', $request->invoice_number)->get();
            return view('reports.reports')->with('details', $bulls);
        }
    }




    public function creport(Request $request)
    {
        if ($request->Section && $request->product && $request->start_at == '' && $request->end_at == '') {

            $bulls = bull::select('*')->where('section_id', '=', $request->Section)->where('product', '=', $request->product)->get();
            $sections = sections::all();

            return view('reports.creports', compact('sections'))->with('details', $bulls);
        }

        // في حالة تحديد تاريخ استحقاق
        else {

            $start_at = date($request->start_at);
            $end_at = date($request->end_at);
            $bulls = bull::whereBetween('bull_date', [$start_at, $end_at])->where('section_id', '=', $request->Section)->where('product', '=', $request->product)->get();
            $sections = sections::all();

            return view('reports.creports', compact('sections'))->with('details', $bulls);
        }
    }


    //     public function report(Request $request)
    // {
    //     $rdio = $request->rdio;
    //     if ($rdio == 1) {

    //         if ($request->type && $request->start_at == '' && $request->end_at == '') {
    //             // عرض القيم المرسلة في الطلب
    //             dd($request->all());

    //             // إنشاء الاستعلام وعرضه
    //             $query = bull::select('*')->where('Status', '=', $request->type);
    //             dd($query->toSql(), $query->getBindings());

    //             // تنفيذ الاستعلام وعرض النتائج
    //             $bulls = $query->get();
    //             dd($bulls);

    //             $type = $request->type;
    //             return view('reports.reportst', compact('type'))->with('details', $bulls);
    //         }
    //     }
    // }


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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
