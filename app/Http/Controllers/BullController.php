<?php

namespace App\Http\Controllers;

use App\Models\bull;
use App\Models\bull_detalies;
use App\Models\bull_attachments;
use App\Models\produtes;
use App\Models\user;
use App\Models\sections;
use App\Notifications\Addbull;
use App\Notifications\newbull;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class BullController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bulls = bull::all();
        return view('bull.bull', compact('bulls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = sections::all();
        return view('bull.add', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        bull::create([
            'bull-number' => $request->invoice_number,  // تأكد من وجود قيمة افتراضية هنا
            'bull_date' => $request->invoice_Date,
            'due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'discount' => $request->Discount,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Rate_VAT' => $request->Rate_VAT,

            'total' => $request->Total,
            'Value_VAT' => $request->Value_VAT,
            'Status' => 'غير مدفوعه',
            'Value_Status' => "2",
            'note' => $request->note,
        ]);



        $id_bull = bull::latest()->first()->id;
        bull_detalies::create([
            'id_bull' => $id_bull,
            'bull_number' => $request->invoice_number,
            'product' => $request->product,
            'Section' => $request->Section,
            'status' => 'غير مدفوعه',
            'Value_Status' => 2,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);




        // bull_attachments::create([
        //     'id_bull' => $id_bull,
        //     'bull_number'=> $request->invoice_number,  
        //     'product' => $request->product,
        //     'Section' => $request->Section,
        //     'status' => 'غير مدفوعه',
        //     'Value_Status' => 2,
        //     'note' => $request->note,
        //     'user' => (Auth::user()->name),
        // ]);
        

        $user = user::first();
        $users = user::all();
        // $users = user::where('id','!=',auth()->user()->id)->get();
        $users_create =auth()->user()->name;

        // Notification::send($user, new newbull($id_bull));
        Notification::send($users, new Addbull($id_bull,$users_create));
       


        return redirect('bull');


        //  return $request;



        // bull::create([
        // 'invoice_number' => $request->invoice_number,
        //     'invoice_Date' => $request->invoice_Date,
        //     'Due_date' => $request->Due_date,
        //     'product' => $request->product,
        //     'section_id' => $request->Section,
        //     'Amount_collection' => $request->Amount_collection,
        //     'Amount_Commission' => $request->Amount_Commission,
        //     'Discount' => $request->Discount,
        //     'Value_VAT' => $request->Value_VAT,
        //     'Rate_VAT' => $request->Rate_VAT,
        //     'Total' => $request->Total,
        //     'Status' => 'غير مدفوعة',
        //     'Value_Status' => 2,
        //     'note' => $request->note,
        // ]);

        // $invoice_id = bull::latest()->first()->id;
        // bull_detalies::create([
        //     'id_Invoice' => $invoice_id,
        //     'invoice_number' => $request->invoice_number,
        //     'product' => $request->product,
        //     'Section' => $request->Section,
        //     'Status' => 'غير مدفوعة',
        //     'Value_Status' => 2,
        //     'note' => $request->note,
        //     'user' => (Auth::user()->name),
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //    $bull=bull::onlyTrashed()->get();
        //    return view('bull.soft',compact('bull')); 

        $bull = bull::where('id', $id)->first();
        return view('bull.status', compact('bull'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bull $bull)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bulls = bull::findorFail($id);
        $bulls->update([
            'bull-number' => $request->invoice_number,  // تأكد من وجود قيمة افتراضية هنا
            'bull_date' => $request->invoice_Date,
            'due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'discount' => $request->Discount,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Rate_VAT' => $request->Rate_VAT,
            'total' => $request->Total,
            'Value_VAT' => $request->Value_VAT,
            'Status' => 'غير مدفوعه',
            'Value_Status' => "2",
            'note' => $request->note,
        ]);
        return redirect('bull');
    }
    public function status_update(Request $request, $id)
    {

        $bull = bull::findOrFail($id);

        if ($request->Status === 'مدفوعة') {

            $bull->update([
                'Value_Status' => 1,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);
            bull_detalies::create([
                'id_bull' => $request->invoice_id,
                'bull_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $request->Section,
                'status' => 'غير مدفوعه',
                'Value_Status' => 2,
                'note' => $request->note,
                'user' => (Auth::user()->name),
            ]);
        } else
            $bull->update([
                'Value_Status' => 3,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);
        bull_detalies::create([
            'id_bull' => $request->invoice_id,
            'bull_number' => $request->invoice_number,
            'product' => $request->product,
            'Section' => $request->Section,
            'status' => 'مدفوعه جزئيا',
            'Value_Status' => 3,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);
        return redirect('bull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->invoice_id;
        bull::findorFail($id)->delete();
        return redirect('bull');


        //    bull::destroy($id);
        // return redirect('bull'); 


        // return $id;

    }

    public function softDeletes(Request $request)

    {
        // return $request;
        $id = $request->invoice_id;
        bull::where('id', $id)->delete();
        // return redirect('softDeletes');
        return redirect()->route('arc');
    }

    public function  pluck($id)
    {
        //    return 'pluck';
        //    $products = sections::where('section_id', $id->section_name)->first()->id;
        $products = produtes::where('section_id', $id)->pluck('produte_name', 'id');
        return json_encode($products);
    }




    public function paidbull()
    {
        $bulls = bull::where('Value_Status', 1)->get();
        return view('bull.paid', compact('bulls'));

        // return 'okkkkkk';
    }





    public function inpaidbull()
    {
        $bulls = bull::where('Value_Status', 2)->get();
        return view('bull.inpaid', compact('bulls'));

        
    }



    public function printbull(Request $request, $id)
    {
        // $invoices = bull::where('id', $id)->get();
        // return view('bull.printbull', compact('invoices'));

        // $bull = bull::where('id', $id)->get();
        // // dd($invoices); // يعرض محتويات $invoices ويتوقف عن التنفيذ
        // return view('bull.printbull', compact('bull'));

        $invoice = bull::where('id', $id)->first();

        if (!$invoice) {
            return redirect()->back()->with('error', 'لم يتم العثور على الفاتورة');
        }

        return view('bull.printbull', compact('invoice'));


        // $id = $request-> invoice_id;
        // return $request;
    }
}
