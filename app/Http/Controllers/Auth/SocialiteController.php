<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAuthService;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function __construct(
        private SocialAuthService $socialAuthService
    ) {}


    public function callback()
    {
        $user = $this->socialAuthService->callback();

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful.',
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function redirect()
    {
        return $this->socialAuthService->redirect();
    }
}
