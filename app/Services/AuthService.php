<?php

namespace App\Services;

use App\Models\User;

class AuthService
{

    public function generateToken(User $user): string
    {
        return $user->createToken('API Token')->plainTextToken;
    }

    public function loginResponse(User $user): array
    {
        return [
            'message' => 'Login successful.',
            'user' => $user,
            'token' => $this->generateToken($user),
        ];
    }

    public function logout(User $user): bool
    {
        return $user->currentAccessToken()->delete();
    }
}
