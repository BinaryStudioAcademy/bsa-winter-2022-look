<?php

declare(strict_types=1);

namespace App\Actions\User;


use App\Exceptions\User\CantSaveUserParameterException;
use App\Exceptions\User\UserNotFoundException;
use App\Http\Requests\Api\User\ChangeUserParameterHttpRequest;
use App\Repositories\User\UserRepository;
use App\Repositories\UserParameter\UserParameterRepository;
use Illuminate\Support\Facades\Auth;

class ChangeUserParameterAction
{
    const USER_PARAMETERS = ['looking', 'gender', 'age', 'weight', 'height', 'bio'];

    public function __construct(
        private UserParameterRepository $userParameterRepository,
        private UserRepository $userRepository
    ) {}

    public function execute(ChangeUserParameterHttpRequest $request): ChangeUserParameterResponse
    {
        if (is_null($user = $this->userRepository->getById(Auth::id()))) {
            throw new UserNotFoundException();
        }

        $user->name = $request->get('name');

        if (is_null($user->save())) {
            throw new UserNotFoundException();
        }

        foreach ($request->all() as $parameterName => $parameterValue ) {
            if (!in_array($parameterName, self::USER_PARAMETERS)) {
                continue;
            }

            try {
                $userParameter = $this->userParameterRepository->getUserParameter($user->getId(), $parameterName);
                $userParameter->parameter_value = $parameterValue;
                $userParameter->save();
            } catch (\Exception $exception) {
                throw new CantSaveUserParameterException();
            }
        }
    }
}
