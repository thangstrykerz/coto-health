<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\User\Presenters\UserPresenter;
use App\Domain\User\Presenters\UserPublicPresenter;
use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\UserUpdateRequest;
use App\Domain\User\Contracts\UserRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers\Api\V1;
 */
class UsersController extends ApiBaseController
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserPresenter
     */
    protected $presenter;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserPublicPresenter $presenter
     */
    public function __construct(UserRepository $repository, UserPublicPresenter $presenter)
    {
        $this->repository = $repository;
        $this->presenter  = $presenter;
        $this->repository->setPresenter($presenter);
    }

    public function updateProfile(UserUpdateRequest $request)
    {
        return $this->repository->update([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'gender' =>$request->get('gender')
        ], Auth::user()->id);
    }
}
