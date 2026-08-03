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
        return response()->json(
            $this->socialAuthService->callback()
        );
    }

    public function redirect()
    {
        return $this->socialAuthService->redirect();
    }
}
