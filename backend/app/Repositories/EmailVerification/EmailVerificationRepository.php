<?php

declare(strict_types=1);

namespace App\Repositories\EmailVerification;

use App\Models\EmailVerification;
use App\Repositories\BaseRepository;

class EmailVerificationRepository extends BaseRepository implements EmailVerificationInterfaceRepository
{
    public function getByToken(int $token): ?EmailVerification
    {
        return EmailVerification::where('token', $token)->firstOrFail;
    }

    public function save(EmailVerification $emailVerification): ?EmailVerification
    {
        $emailVerification->save();

        return $emailVerification;
    }

    public function getToken(EmailVerification $emailVerification): string
    {
        return $emailVerification->token;
    }
}
