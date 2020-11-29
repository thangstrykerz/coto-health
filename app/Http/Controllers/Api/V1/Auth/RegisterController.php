<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Domain\User\Validators\UserValidator;
use App\Domain\User\Contracts\UserRepository;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends ApiBaseController
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function register(UserCreateRequest $request)
    {
        $user = $this->repository->skipPresenter()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'gender' =>$request->get('gender'),
            'password' => Hash::make($request->get('password'))
        ]);

        event(new Registered($user));

        return $this->successResponse();
    }
}
