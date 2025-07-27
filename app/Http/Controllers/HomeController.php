<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'total_payments' => 0,
            'total_amount' => 0,
            'total_kwh' => 0
        ];

        if (Auth::user()->isAdmin()) {
            $stats['total_payments'] = Payment::count();
            $stats['total_amount'] = Payment::sum('total_amount');
            $stats['total_kwh'] = Payment::sum('kwh_usage');
            $stats['total_users'] = User::where('role', 'customer')->count();
        } else {
            $stats['total_payments'] = Payment::where('user_id', Auth::id())->count();
            $stats['total_amount'] = Payment::where('user_id', Auth::id())->sum('total_amount');
            $stats['total_kwh'] = Payment::where('user_id', Auth::id())->sum('kwh_usage');
        }

        return view('home', compact('stats'));
    }
}
