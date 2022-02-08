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
    public function execute(ForgotPasswordRequest $request): ForgotPasswordResponse
    {
        if ((new UserRepository())->getByEmail($request->get('email'))) {
            $random = Str::random(60);
            $token = [];
            $token['value'] = hash('sha256', $random);
            $data['email'] = $request->get('email');
            $data['token'] = $token['value'];
            $data['created_at'] = (Carbon::now())->toDateTimeString();
            $item = new PasswordResets($data);
            $item->save();

            $emailView = (new ForgotPasswordEmail($token))->build();
            Mail::to($request)->send($emailView);
            return new ForgotPasswordResponse();
        } else {
            throw new UserNotFoundException();
        }
    }
}
