<?php

namespace App\Actions\Auth;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\User\UserRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

final class LoginAction
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(LoginRequest $request): AuthenticationResponse
    {
        $userByEmail = $this->userRepository->getByEmail($request->getEmail());

        if (!$userByEmail) {
            throw new UserNotFoundException('No account exists for ' . $request->getEmail());
        }

        $token = Auth::attempt([
            'email' => $request->getEmail(),
            'password' => $request->getPassword(),
        ]);

        if (!$token) {
            throw new AuthenticationException('Invalid email or password');
        }

        if (is_null($this->userRepository->getByVerifiedEmail($request->getEmail()))) {
            throw new AuthorizationException('Please verify your email first to be able to log in');
        }

        return new AuthenticationResponse(
            $token,
            'bearer',
            auth()->factory()->getTTL() * 1440
        );
    }
}
