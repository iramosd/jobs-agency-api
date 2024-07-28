<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\api\v1\ApplicantController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1', 'as' => 'api.'], function () {
    route::apiResource('/applicants', ApplicantController::class);
});
