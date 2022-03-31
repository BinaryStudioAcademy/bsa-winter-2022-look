<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Exceptions\User\CantSaveUserParameterException;
use App\Exceptions\User\UserNotFoundException;
use App\Http\Requests\Api\User\ChangeUserParameterHttpRequest;
use App\Repositories\User\UserRepository;
use App\Repositories\UserInterest\UserInterestRepository;
use App\Repositories\UserParameter\UserParameterRepository;
use Illuminate\Support\Facades\Auth;

class ChangeUserParameterAction
{
    public function __construct(
        private UserParameterRepository $userParameterRepository,
        private UserRepository $userRepository
    ) {
    }

    public function execute(ChangeUserParameterRequest $request): ChangeUserParameterResponse
    {
        if (is_null($user = $this->userRepository->getById(Auth::id()))) {
            throw new UserNotFoundException();
        }

        $user->name = $request->getName();

        if (is_null($user->save())) {
            throw new UserNotFoundException();
        }

        foreach ($request->getAllParameters() as $parameterName => $parameterValue) {
            try {
                $userParameter = $this->userParameterRepository->getUserParameter($user->getId(), $parameterName);
                $userParameter->parameter_value = $parameterValue;
                $this->userParameterRepository->save($userParameter);
            } catch (\Exception $exception) {
                throw new CantSaveUserParameterException();
            }
        }

        return new ChangeUserParameterResponse();
    }
}
