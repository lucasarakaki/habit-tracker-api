<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreHabitRequest;
use App\Http\Requests\Api\V1\UpdateHabitRequest;
use App\Http\Resources\Api\V1\HabitResource;
use App\Models\Habit;
use App\Models\HabitLog;
use App\Traits\HttpResponse;

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
    public function store(StoreHabitRequest $request): array
    {
        $data = $request->only('title', 'uuid');

        $habit = Habit::create(array_merge($data, ['user_id' => 1]));

        return $this->success('success', 200, HabitResource::make($habit));
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
    public function update(UpdateHabitRequest $request, Habit $habit): array
    {
        $data = $request->validated();

        $habit->update($data);

        return $this->success('success', 200, HabitResource::make($habit));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit): array
    {
        HabitLog::whereHabitId($habit->id)->delete();

        $habit->delete();

        return $this->success('success', 200, []);
    }
}
