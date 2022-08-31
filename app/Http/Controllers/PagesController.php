<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Sale;
class PagesController extends Controller
{
    
    

    public function form()
    {
         return view('form');

    }

    public function storeForm()
    {
        
        $apiURL = "https://preprod.paymeservice.com/api/generate-sale";
        $postInput =    request()->all();
 

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        $responseBody['description'] = request()->product_name;
        

        $sale = Sale::create($responseBody);
        dd($responseBody , request()->all() , $sale  );
        return view('payment-page', compact('responseBody'));
            }
        }
