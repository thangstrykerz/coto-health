<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Domain\User\Presenters\UserPublicPresenter;
use App\Domain\User\Contracts\UserRepository;
use Illuminate\Validation\ValidationException;

class LoginController extends ApiBaseController
{
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(
        UserRepository $repository,
        UserPublicPresenter $presenter
    )
    {
        $this->repository = $repository;
        $this->repository->setPresenter($presenter);
    }

    public function login(UserLoginRequest $request)
    {
        if(!$this->attemptLogin($request)) {
            throw ValidationException::withMessages(['Login Failed']);
        }
        return $this->repository->find($this->guard()->user()->id);
    }

    protected function attemptLogin($request)
    {
        $token = $this->guard()->attempt($request->all());

        if(!$token) {
            return false;
        }

        $this->guard()->setToken($token);
        return true;
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
