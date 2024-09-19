<?php

use App\Http\Controllers\api\v1\ApplicantController;
use App\Http\Controllers\api\v1\ApplicantSkillController;
use App\Http\Controllers\api\v1\MediaController;
use App\Http\Controllers\api\v1\RoleController;
use App\Http\Controllers\api\v1\SkillController;
use App\Http\Controllers\api\v1\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
//middleware(['auth:sanctum'])->
Route::middleware(['auth:sanctum'])->prefix('/v1')->as('api.')->group(function () {
    Route::apiResource('/applicants', ApplicantController::class);
    Route::post('/applicants/{applicant}/skills/{skill}', [ApplicantSkillController::class, 'store'])->name('applicants.skills.store');
    Route::delete('/applicants/{applicant}/skills/{skill}', [ApplicantSkillController::class, 'destroy'])->name('applicants.skills.destroy');

    // TODO simplify media routes with apiResource
    // Route::apiResource('/media/{media}', MediaController::class)->only(['show', 'store', 'destroy']);
    Route::get('/media/{media}', [MediaController::class, 'show'])->name('media.show');
    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');

    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/skills', SkillController::class);

    Route::post('/users/{user}/roles/{role}', [UserRoleController::class, 'store'])->name('users.roles.store');
    Route::delete('/users/{user}/roles/{role}', [UserRoleController::class, 'destroy'])->name('users.roles.destroy');

});

