<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Exceptions\User\CantSaveUserParameterException;
use App\Exceptions\User\UserNotFoundException;
use App\Repositories\User\UserRepository;
use App\Repositories\UserParameterNew\UserParameterNewRepository;
use Illuminate\Support\Facades\Auth;

class ChangeUserParameterAction
{
    public function __construct(
        private UserParameterNewRepository $userParameterRepository,
        private UserRepository $userRepository
    ) {
    }

    public function execute(ChangeUserParameterRequest $request): ChangeUserParameterResponse
    {
        if (Auth::check()) {
            $user = $this->userRepository->getById(Auth::id());
            $user->name = $request->getName();

            try {
                $this->userRepository->save($user);
            } catch (\Exception $exception) {
                throw new UserNotFoundException();
            }
        } elseif ($this->userRepository
            ->getByAllUserValues(
                $request->getUserId(),
                $request->getEmail(),
                $request->getName()
            ) && is_null($this->userRepository
            ->getByVerifiedEmail(
                $request->getEmail()
            ))) {
            $user = $this->userRepository->getByAllUserValues(
                $request->getUserId(),
                $request->getEmail(),
                $request->getName()
            );
        } else {
            throw new UserNotFoundException();
        }

        $userParameter = $this->userParameterRepository->getByUserId($user->id);
        $userParameter->fill($request->getAllParameters());

        try {
            $this->userParameterRepository->save($userParameter);
        } catch (\Exception $exception) {
            throw new CantSaveUserParameterException();
        }

        return new ChangeUserParameterResponse();
    }
}
