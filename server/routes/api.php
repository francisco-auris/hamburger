<?php
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
Route::apiResource('users', 'UserController', ['middleware' => 'cors']);

Route::post('login', 'Api\\AuthController@login', ['middleware' => 'cors']);

Route::apiResource("produto", "ProdutoController", ['middleware' => 'cors']);

Route::group(['middleware' => ['apiJwt']], function(){

    Route::post('logout', 'Api\\AuthController@logout');

    //Route::apiResource('users', 'Api\\UserController');

});


