<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreUser;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function store(StoreUser $request)
    {
        $data = $request->validated();

        $user = $this->model->create($data);

        return (new UserResource($user))
            ->additional([
                'token' => $user->createToken($request->device_name)->plainTextToken,
            ]);
    }
}
