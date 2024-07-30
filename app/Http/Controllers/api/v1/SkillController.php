<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\SkillServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use App\services\SkillService;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    private SkillServiceInterface $service;

    public function __construct()
    {
        $this->service = new SkillService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SkillResource::collection($this->service->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        return $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return new SkillResource($this->service->show($skill));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $this->service->update($skill, $request->validated());

        return new SkillResource($skill);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $this->service->delete($skill);

        return response()->noContent();
    }
}
