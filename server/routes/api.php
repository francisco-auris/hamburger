<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::middleware(['cors'])->group(function (){


    Route::post('teste', 'TesteController@teste');

    Route::apiResource('users', 'UserController');

    Route::apiResource('order', 'OrderController');

    Route::get("user-address/{id}", "UserController@userAddress");

    Route::post('login', 'Api\\AuthController@login');

    Route::apiResource("address", "AddressController");

    Route::apiResource("produto", "ProdutoController");

    Route::group(['middleware' => ['apiJwt']], function(){

        Route::post('logout', 'Api\\AuthController@logout');



    });

//});
