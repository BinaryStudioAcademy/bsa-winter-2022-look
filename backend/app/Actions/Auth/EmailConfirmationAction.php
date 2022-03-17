<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\EmailVerification\EmailVerificationRepository;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;

class EmailConfirmationAction
{
    public function __construct(
        private EmailVerificationRepository $verificationRepository,
        private UserRepository $userRepository
    ) {
    }

    public function execute(EmailConfirmationRequest $request)
    {
        $emailVerification = $this->verificationRepository->getByToken($request->getToken());

        try {
            $user = $this
                ->userRepository->getById(
                    $this->verificationRepository->getUserId($emailVerification)
                );
        } catch (\Exception $exception) {
            throw new UserNotFoundException();
        }

        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $this->userRepository->save($user);

        $this->verificationRepository->deleteByToken($request->getToken());
    }
}
