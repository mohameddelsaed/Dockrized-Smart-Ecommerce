<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthService
{
    public function callback(): array
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();

        $user = User::firstOrCreate(
            [
                'email' => $googleUser->getEmail(),
            ],
            [
                'first_name' => $nameParts[0] ?? 'User',
                'last_name' => $nameParts[1] ?? '',
                'password' => Str::random(40),
                'email_verified_at' => now(),
            ]
        );
        return [
            'message' => 'Login successful.',
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ];
    }

    public function redirect()
    {
        return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }
}
