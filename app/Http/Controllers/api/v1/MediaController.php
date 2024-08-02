<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\MediaServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Services\MediaService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private MediaServiceInterface $service;

    public function __construct()
    {
        $this->service = new MediaService();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaRequest $request)
    {
        $validated = $request->validated();

        return new MediaResource($this->service->create(auth()->user(), $validated['media'], $validated['collection_name']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        return new MediaResource($this->service->show($media));
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        $this->service->delete($media);

        return response()->noContent();
    }
}
