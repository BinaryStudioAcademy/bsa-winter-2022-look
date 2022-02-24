<?php

declare(strict_types=1);

namespace App\Repositories\EmailVerification;

use App\Models\EmailVerification;
use App\Repositories\BaseRepository;

class EmailVerificationRepository extends BaseRepository implements EmailVerificationInterfaceRepository
{
    public function getByToken(string $token): ?EmailVerification
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

    public function getUserId(EmailVerification $emailVerification): int
    {
        return $emailVerification->user_id;
    }

    public function deleteByToken(string $token): void
    {
        EmailVerification::where('token', $token)->delete();
    }
}
