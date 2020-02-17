<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::fallback(function () {
    return response()->json(['message' => 'Not Found.'], 404);
});
//Route::group(['prefix' => 'api'], function () {
    Route::resource("/clientes", "ClienteController");
    Route::resource('/vendas', 'VendaController');
//});
