<?php

namespace App\Http\Controllers;

use App\Currency;
use App\PaymentPlatform;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $currencies = Currency::all();
        $paymentPlatforms = PaymentPlatform::all();
        return view('home', compact('currencies', 'paymentPlatforms'));
    }
}
