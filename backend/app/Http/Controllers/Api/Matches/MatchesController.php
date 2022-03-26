<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Matches;

use App\Actions\Matches\SetLikeStatusAction;
use App\Http\Controllers\Api\ApiController;

class MatchesController extends ApiController
{
    public function setLikeStatus(
        SetLikeStatusAction $action,
    ) {
        return $this->emptyResponse();
    }
}
