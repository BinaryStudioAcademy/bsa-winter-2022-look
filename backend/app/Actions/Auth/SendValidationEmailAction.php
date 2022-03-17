<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Mail\UserValidationEmail;
use App\Models\EmailVerification;
use App\Repositories\EmailVerification\EmailVerificationRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendValidationEmailAction
{
    const TOKEN_LENGTH = 60;

    public function __construct(
        private UserRepository $userRepository,
        private EmailVerificationRepository $emailRepository,
        private UserValidationEmail $userValidationEmail
    ) {
    }

    public function execute(SendValidationEmailRequest $request)
    {
        $user = $this->userRepository->getByEmail($request->getEmail());

        $verificationData = new EmailVerification();
        $verificationData->user_id = $user->getId();
        $verificationData->token = Str::random(self::TOKEN_LENGTH);

        $this->emailRepository->save($verificationData);

        $this->userValidationEmail->setToken($verificationData->token);
        $emailTemplate = $this->userValidationEmail->build();
        Mail::to($request->getEmail())->send($emailTemplate);
    }
}
