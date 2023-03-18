<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentCompleteController extends Controller
{
    public function __invoke() 
    {
    	return redirect('/dashboard')->withStatus('Thank you. Payment processed successfully');
    }
}
