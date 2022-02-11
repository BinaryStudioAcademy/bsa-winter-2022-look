<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Exceptions\User\UserNotFoundException;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Mail\ForgotPasswordEmail;
use App\Models\PasswordResets;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

final class ForgotPasswordAction
{
    const TOKEN_LENGTH=60;

    public function execute(ForgotPasswordRequest $request): ForgotPasswordResponse
    {
        if (is_null((new UserRepository())->getByEmail($request->get('email')))) {
            throw new UserNotFoundException();
        }
        $token = Str::random(self::TOKEN_LENGTH);
        $data['email'] = $request->get('email');
        $data['token'] = $token;
        $data['created_at'] = (Carbon::now())->toDateTimeString();
        $item = new PasswordResets($data);
        $item->save();

        $emailView = (new ForgotPasswordEmail($token))->build();
        Mail::to($request)->send($emailView);
        return new ForgotPasswordResponse();
    }
}
