<?php

namespace App\Repositories\EmailVerification;

use App\Models\EmailVerification;

interface EmailVerificationInterfaceRepository
{
    public function getByToken(string $token): ?EmailVerification;
    public function save(EmailVerification $emailVerification): ?EmailVerification;
    public function getToken(EmailVerification $emailVerification): string;
    public function getUserId(EmailVerification $emailVerification): int;
    public function deleteByToken(string $token): void;
}
