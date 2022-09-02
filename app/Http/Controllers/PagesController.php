<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Sale;
use PayMe;
class PagesController extends Controller
{

    

    public function form()
    {
         return view('form');

    }

    public function storeForm()
    {
        
         $responseBody = PayMe::pay();
        
         if($responseBody['status_code'])
           return redirect()->back()->withErrors($responseBody );
 
        $responseBody['description'] = request()->product_name;

        $sale = Sale::create($responseBody);


        return view('payment-page', compact('responseBody'));
    }
}
