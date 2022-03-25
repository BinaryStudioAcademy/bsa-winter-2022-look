<?php

namespace App\Actions\Auth;

use App\Exceptions\Auth\CantLoginException;
use App\Exceptions\Auth\EmailVerificationRequiredException;
use App\Exceptions\User\UserNotFoundException;
use App\Repositories\User\UserRepository;
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
            throw new CantLoginException('Invalid email or password');
        }

        if (is_null($this->userRepository->getByVerifiedEmail($request->getEmail()))) {
            throw new EmailVerificationRequiredException();
        }

        return new AuthenticationResponse(
            $token,
            'bearer',
            auth()->factory()->getTTL() * 1440
        );
    }
}
