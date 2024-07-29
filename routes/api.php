<?php

use App\Http\Controllers\api\v1\ApplicantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->prefix('/v1')->as('api.')->group(function () {
    route::apiResource('/applicants', ApplicantController::class);
});
