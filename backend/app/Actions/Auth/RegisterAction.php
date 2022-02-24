<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Mail\UserMailValidationEmail;
use App\Models\EmailVerification;
use App\Models\User;
use App\Repositories\EmailVerification\EmailVerificationRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

final class RegisterAction
{
    const TOKEN_LENGTH = 60;

    private UserRepository $userRepository;
    private EmailVerificationRepository $emailVerificationRepository;

    public function __construct(
        UserRepository $userRepository,
        EmailVerificationRepository $emailVerificationRepository
    ) {
        $this->userRepository = $userRepository;
        $this->emailVerificationRepository = $emailVerificationRepository;
    }

    public function execute(RegisterRequest $request): RegisterResponse
    {
        $user = new User();
        $user->email = $request->getEmail();
        $user->password = Hash::make($request->getPassword());
        $user->name = $request->getName();

        /**
         * TODO Remove this after demo!
         * task for set user role https://trello.com/c/m4Am8xY2/13-create-roles-for-users
         */
        $user->role_id = 1;

        $user = $this->userRepository->save($user);

        $emailVerificationData = new EmailVerification();
        $emailVerificationData->user_id = $user->getId();
        $emailVerificationData->token = Str::random(self::TOKEN_LENGTH);
        $this->emailVerificationRepository->save($emailVerificationData);

        $emailView = (new UserMailValidationEmail(
            $user->getName(),
            $this->emailVerificationRepository->getToken($emailVerificationData)
        ))->build();
        Mail::to($user->getEmail())->send($emailView);

        return new RegisterResponse($user);
    }
}
