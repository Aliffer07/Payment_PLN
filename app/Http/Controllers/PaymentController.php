<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'meter_number' => 'required|string|max:255',
            'kwh_usage' => 'required|numeric|min:1',
            'price_per_kwh' => 'required|numeric|min:1',
        ]);

        $totalAmount = $request->kwh_usage * $request->price_per_kwh;

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'meter_number' => $request->meter_number,
            'kwh_usage' => $request->kwh_usage,
            'price_per_kwh' => $request->price_per_kwh,
            'total_amount' => $totalAmount,
            'invoice_number' => Payment::generateInvoiceNumber(),
            'payment_status' => 'paid',
        ]);

        // Generate PDF
        $pdf = PDF::loadView('payments.invoice', compact('payment'));
        $filename = 'invoice_' . $payment->invoice_number . '.pdf';
        $path = 'invoices/' . $filename;

        // Store PDF file
        \Storage::put('public/' . $path, $pdf->output());

        // Update payment with receipt path
        $payment->update(['payment_receipt' => $path]);

        return redirect()->route('payments.history')
                        ->with('success', 'Pembayaran berhasil diproses! Invoice telah digenerate.');
    }

    public function history()
    {
        if (Auth::user()->isAdmin()) {
            $payments = Payment::with('user')->latest()->paginate(10);
        } else {
            $payments = Payment::where('user_id', Auth::id())->latest()->paginate(10);
        }

        return view('payments.history', compact('payments'));
    }

    public function downloadInvoice($id)
    {
        $payment = Payment::findOrFail($id);

        // Check if user has permission
        if (!Auth::user()->isAdmin() && $payment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $path = \Storage::path('public/' . $payment->payment_receipt);
        return response()->download($path, 'invoice_' . $payment->invoice_number . '.pdf');
    }
}
