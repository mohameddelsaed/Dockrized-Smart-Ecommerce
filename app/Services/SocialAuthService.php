<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthService
{
    public function callback(): User
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();

        $nameParts = explode(' ', trim($googleUser->getName()), 2);

        return User::firstOrCreate(
            [
                'email' => $googleUser->getEmail(),
            ],
            [
                'first_name'        => $nameParts[0] ?? 'User',
                'last_name'         => $nameParts[1] ?? '',
                'password'          => Str::random(40), // Automatically hashed by the model
                'email_verified_at' => now(),
            ]
        );
    }

    public function redirect()
    {
        return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }
}
