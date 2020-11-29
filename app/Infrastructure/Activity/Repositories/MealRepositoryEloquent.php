<?php

namespace App\Infrastructure\Activity\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domain\Activity\Contracts\MealRepository;
use App\Domain\Activity\Entities\Breakfast;
use App\Domain\Activity\Validators\ActivityValidator;

/**
 * Class ActivityRepositoryEloquent.
 *
 * @package namespace App\Infrastructure\Activity\Repositories;
 */
class MealRepositoryEloquent extends BaseRepository implements MealRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Breakfast::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ActivityValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
