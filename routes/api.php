<?php

use App\Http\Controllers\api\v1\ApplicantController;
use App\Http\Controllers\api\v1\ApplicantSkillController;
use App\Http\Controllers\api\v1\CompanyController;
use App\Http\Controllers\api\v1\JobApplicationController;
use App\Http\Controllers\api\v1\JobController;
use App\Http\Controllers\api\v1\MediaController;
use App\Http\Controllers\api\v1\RoleController;
use App\Http\Controllers\api\v1\SkillController;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\api\v1\UserRoleController;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
//middleware(['auth:sanctum'])->
Route::prefix('/v1')->as('api.')->group(function () {
    Route::apiResource('/applicants', ApplicantController::class);
    Route::post('/applicants/{applicant}/skills/{skill}', [ApplicantSkillController::class, 'store'])->name('applicants.skills.store');
    Route::delete('/applicants/{applicant}/skills/{skill}', [ApplicantSkillController::class, 'destroy'])->name('applicants.skills.destroy');

    Route::apiResource('/companies', CompanyController::class);
    Route::apiResource('/jobs', JobController::class);
    Route::apiResource('/jobs/{job}/applications', JobApplicationController::class);
    Route::apiResource('/medias', MediaController::class)->only(['show', 'store', 'destroy']);
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/skills', SkillController::class);

    Route::apiResource('/users', UserController::class);
    Route::post('/users/{user}/roles/{role}', [UserRoleController::class, 'store'])->name('users.roles.store');
    Route::delete('/users/{user}/roles/{role}', [UserRoleController::class, 'destroy'])->name('users.roles.destroy');

});

