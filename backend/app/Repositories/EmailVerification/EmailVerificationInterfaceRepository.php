<?php

namespace App\Repositories\EmailVerification;

use App\Models\EmailVerification;

interface EmailVerificationInterfaceRepository
{
    public function getByToken(int $token): ?EmailVerification;
    public function save(EmailVerification $emailVerification): ?EmailVerification;
    public function getToken(EmailVerification $emailVerification): string;
}
