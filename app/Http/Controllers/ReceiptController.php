<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = Receipt::withTrashed()->orderBy('created_at', 'desc')->paginate(20); // 1ページあたり15件表示
        return view('receipt.index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receipt.create');
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
            // 'branch' => 'required|string|max:255',
            // 'section_staff' => 'required|string|max:255',
            // 'code' => 'required|string|max:255',
            // 'client_address' => 'required|string|max:255',
            // 'issued_at' => 'nullable|date',
            // 'client_company_name' => 'nullable|string|max:255',
            // 'face_value' => 'nullable|integer',
            // 'cash_value' => 'nullable|integer',
            // 'cheque_value' => 'nullable|integer',
            // 'promissory_value1' => 'nullable|integer',
            // 'promissory1_date' => 'nullable|date',
            // 'promissory_issuer1' => 'nullable|string|max:255',
            // 'promissory_value2' => 'nullable|integer',
            // 'promissory2_date' => 'nullable|date',
            // 'promissory_issuer2' => 'nullable|string|max:255',
            // 'tax' => 'nullable|integer',
            // 'note' => 'nullable|string|max:255',
            // 'other' => 'nullable|integer',
            // 'discount' => 'nullable|integer',
            // 'offset' => 'nullable|string|max:255',
            // 'receipt_value' => 'nullable|integer',
        ]);

        Receipt::create($request->all());

        return redirect()->route('receipts.index')->with('success', 'Receipt created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receipt = Receipt::withTrashed()->findOrFail($id);
        return view('receipt.show', compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        return view('receipt.edit', compact('receipt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        // $request->validate([
        //     'branch' => 'required|string|max:255',
        //     'section_staff' => 'required|string|max:255',
        //     'code' => 'required|string|max:255',
        //     'client_address' => 'required|string|max:255',
        //     'issued_at' => 'nullable|date',
        //     'client_company_name' => 'required|string|max:255',
        //     'face_value' => 'nullable|integer',
        //     'cash_value' => 'nullable|integer',
        //     'cheque_value' => 'nullable|integer',
        //     'promissory_value1' => 'nullable|integer',
        //     'promissory1_date' => 'nullable|date',
        //     'promissory_issuer1' => 'nullable|integer',
        //     'promissory_value2' => 'nullable|integer',
        //     'promissory2_date' => 'nullable|date',
        //     'promissory_issuer2' => 'nullable|integer',
        //     'tax' => 'nullable|integer',
        //     'receipt_value' => 'nullable|integer',
        // ]);

        $receipt->update($request->all());

        return redirect()->route('receipt.index')->with('success', 'Receipt updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        $receipt->delete();

        return redirect()->route('receipts.index')->with('success', 'Receipt deleted successfully.');
    }


    public function printPDF($id)
    {

        $receiptData = Receipt::find($id);


        $pdf = PDF::loadView('pdf_template', compact('receiptData'))
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'dpi' => 300,
                'defaultFont' => 'Noto Sans JP',
                'isRemoteEnabled' => true,
                'chroot' => realpath(base_path()),
                'fontCache' => storage_path('fonts'),
                'margin_top' => 0,
                'margin_right' => 0,
                'margin_bottom' => 0,
                'margin_left' => 0,
            ]);
        $receiptData->print_count++;
        $receiptData->save();
        return $pdf->stream('領収書_' . $id . '.pdf');
    }
}
