<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Activity\Contracts\MealRepository;
use App\Domain\Activity\Events\LoggedMeal;
use App\Domain\Activity\Presenters\BreakfastPresenter;
use App\Http\Requests\LogMealRequest;
use App\Http\Controllers\Api\ApiBaseController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Class ActivitiesController.
 *
 * @package namespace App\Http\Controllers\Api\V1;
 */
class MealController extends ApiBaseController
{
    /**
     * @var MealRepository
     */
    protected $repository;

    /**
     * @var BreakfastPresenter
     */
    protected $presenter;

    /**
     * ActivitiesController constructor.
     *
     * @param MealRepository $repository
     * @param BreakfastPresenter $presenter
     */
    public function __construct(MealRepository $repository, BreakfastPresenter $presenter)
    {
        $this->repository = $repository;
        $this->presenter  = $presenter;
        $this->repository->setPresenter($presenter);
    }

    public function logMeal(LogMealRequest $request)
    {
        $meal = $this->repository->skipPresenter()->create([
            'portion_value' => $request->get('portion_value'),
            'portion_rating' => $request->get('portion_rating'),
            'balance_value' => $request->get('balance_value'),
            'balance_rating' => $request->get('balance_rating'),
            'sugar_fat_value' => $request->get('sugar_fat_value'),
            'sugar_fat_rating' => $request->get('sugar_fat_rating'),
            'description' => $request->get('description'),
            'completed_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        event(new LoggedMeal($meal, Auth::user()));

        return $this->repository->setPresenter($this->presenter)->find($meal->id);
    }
}
