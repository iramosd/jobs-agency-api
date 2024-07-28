<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [],
        ]);
    }

    public function show(Applicant $applicant)
    {
        return response()->json([
            'data' => [],
        ]);
    }

    public function store()
    {
        return response("Successfully created",201);
    }
    public function destroy(Applicant $applicant)
    {
        return response()->noContent();
    }

    public function update(Applicant $applicant)
    {
        return response("Successfully updated",200);
    }
}
