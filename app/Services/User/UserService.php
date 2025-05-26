<?php

namespace App\Services\User;

use App\Models\Constant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(array $params): array
    {
        $user = $this->user->register($params);

        if (!$user) {
            return ['status' => false, 'message' => 'No se pudo registrar el usuario', 'data' => []];
        }

        return ['status' => true, 'message' => 'Usuario registrado correctamente', 'data' => ['user' => $user]];
    }
}
