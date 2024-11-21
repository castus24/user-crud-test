<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Mail\PasswordMail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    public function index(Request $request): JsonResponse|AnonymousResourceCollection
    {
        return UserResource::collection(
            QueryBuilder::for(User::class)
                ->allowedSorts(User::getAllowedSorts())
                ->paginate($request->input('itemsPerPage', 10))
        );
    }

    public function store(UserCreateRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $password = Str::random(10);
        $validated['password'] = Hash::make($password);

        $user = User::query()->create($validated);

        Mail::to($validated['email'])->send(new PasswordMail($validated['name'], $password));

        return response()->json([
            'message' => 'User created.',
            'data' => new UserResource($user)
        ], ResponseAlias::HTTP_CREATED);
    }

    public function update(UserUpdateRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return response()->json([
            'message' => 'User updated.',
            'data' => new UserResource($user)
        ], ResponseAlias::HTTP_OK);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json([
            'message' => 'User deleted.',
        ]);
    }
}
