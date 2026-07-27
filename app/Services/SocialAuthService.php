<?php

namespace App\Services;
use App\Repositories\UserRepository;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Str;

class SocialAuthService
{
    public function __construct(
        private UserRepository $userRepository,
        private AuthService $authService

    ) {}


    public function callback()
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();


        $user = $this->userRepository->findByEmail(
            $googleUser->getEmail()
        );


        if (! $user) {

            $user = $this->userRepository->create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(40)),
                'email_verified_at' => now(),
            ]);

        }


        return $this->authService->loginResponse($user);
    }

    public function redirect()
    {
        return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }
}
