<?php

use App\Http\Controllers\api\v1\ApplicantController;
use App\Http\Controllers\api\v1\ApplicantSkillController;
use App\Http\Controllers\api\v1\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->prefix('/v1')->as('api.')->group(function () {
    route::apiResource('/applicants', ApplicantController::class);
    route::post('/applicants/{applicant}/skills/{skill}', [ApplicantSkillController::class, 'store'])->name('applicants.skills.store');
    route::delete('/applicants/{applicant}/skills/{skill}', [ApplicantSkillController::class, 'destroy'])->name('applicants.skills.destroy');

    route::apiResource('/skills', SkillController::class);
});
