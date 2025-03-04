<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Http\Requests\Api\V1\UpdateUserRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\User;
use App\Traits\HttpResponse;

class UserController extends Controller
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
            UserResource::collection(User::all()),
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): array
    {
        $data = $request->only('name', 'email', 'password', 'uuid');

        $user = User::create($data);

        return $this->success('success', 200, UserResource::make($user));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): array
    {
        return $this->success('success', 200, new UserResource($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): array
    {
        $data = $request->validated();

        $user->update($data);

        return $this->success('success', 200, UserResource::make($user));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        //
    }
}
