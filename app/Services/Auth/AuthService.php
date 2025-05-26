<?php

namespace App\Services\Auth;

use App\Models\Constant;
use Symfony\Component\Process\Process;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function attemptLogin(string $email, string $password): array
    {
        $user = $this->user->findByEmail($email);

        if (!$user || !Hash::check($password, $user->password)) {
            return ['status' => false, 'message' => 'Credenciales inválidas', 'data' => []];
        }
        $token = $user->createToken('api-token')->plainTextToken;

        return ['status' => true, 'message' => 'ok', 'data' => ['token' => $token]];
    }
}
