<?php
namespace App\Helpers; // Your helpers namespace 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Sale;

class PayMe
{
    public static function pay() 
    {
        $apiURL = "https://preprod.paymeservice.com/api/generate-sale";
        $postInput =    request()->all();
        $postInput['seller_id'] = env('seller_id');
        $postInput['seller_payme_id'] = env('seller_payme_id');
        $postInput['installments'] = env('installments');
         
        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);

         
        if($responseBody['status_code'])
        return redirect()->back()->withErrors($responseBody );
 
        $responseBody['description'] = request()->product_name;

        $sale = Sale::create($responseBody);
        return $responseBody ;
    }
     
}