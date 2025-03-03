<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\HabitResource;
use App\Models\Habit;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    use HttpResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        return $this->success(
            'success',
            200,
            HabitResource::collection(Habit::all()),
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit): array
    {
        return $this->success('success', 200, new HabitResource($habit));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        //
    }
}
