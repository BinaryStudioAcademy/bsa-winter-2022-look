<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Exceptions\Auth\CantSaveTokenException;
use App\Exceptions\User\UserNotFoundException;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Mail\ForgotPasswordEmail;
use App\Models\PasswordResets;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

final class ForgotPasswordAction
{
    const TOKEN_LENGTH=60;

    public function __construct(
        protected UserRepository $userRepository,
        protected PasswordResets $passwordResets,
    ) {}

    public function execute(ForgotPasswordRequest $request): ForgotPasswordResponse
    {
        if (is_null($this->userRepository->getByEmail($request->get('email')))) {
            throw new UserNotFoundException();
        }

        $this->passwordResets->email = $request->get('email');
        $this->passwordResets->token = Str::random(self::TOKEN_LENGTH);

        if(is_null($this->passwordResets->save())) {
            throw new CantSaveTokenException();
        }

        $emailView = (new ForgotPasswordEmail($this->passwordResets->token))->build();
        Mail::to($request)->send($emailView);

        return new ForgotPasswordResponse();
    }
}
