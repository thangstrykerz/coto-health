<?php

namespace App\Infrastructure\Activity\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domain\Activity\Contracts\ActivityLogRepository;
use App\Domain\Activity\Entities\ActivityLog;
use App\Domain\Activity\Validators\ActivityValidator;

/**
 * Class ActivityRepositoryEloquent.
 *
 * @package namespace App\Infrastructure\Activity\Repositories;
 */
class ActivityLogRepositoryEloquent extends BaseRepository implements ActivityLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ActivityLog::class;
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
