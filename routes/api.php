<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Sale;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('api')->post('/pay-me', function (Request $request) {

    // {
    //     "seller_payme_id":"MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N",  
    //     "sale_price":"12300", 
    //     "currency":"ILS",  
    //     "product_name": "Shirt", 
    //     "installments":"1",  
    //     "language": "en"  
    //     }
    $responseBody = PayMe::pay();
    $responseBody['description'] = request()->product_name;

    if(!$responseBody['status_code'])     
        $responseBody['sale_id'] = Sale::create($responseBody)->id;

    return $responseBody;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
