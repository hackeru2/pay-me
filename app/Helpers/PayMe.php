<?php
namespace App\Helpers; // Your helpers namespace 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Sale;

class PayMe
{
    public static function pay() 
    {
        $apiURL = env('API_URL');
        $postInput =    request()->all();
        $postInput['seller_id'] = env('SELLER_ID');
        $postInput['seller_payme_id'] = env('SELLER_PAYME_ID');
        $postInput['installments'] = env('INSTALLMENTS');
        // $postInput['sale_price'] = "invalid price";
         
        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        
        return $responseBody ;
    }
     
}