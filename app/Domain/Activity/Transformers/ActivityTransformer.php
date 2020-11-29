<?php

namespace App\Domain\Activity\Transformers;

use League\Fractal\TransformerAbstract;
use App\Domain\Activity\Entities\ActivityLog;

/**
 * Class ActivityTransformer.
 *
 * @package namespace App\Domain\Activity\Transformers;
 */
class ActivityTransformer extends TransformerAbstract
{
    /**
     * Transform the Activity entity.
     *
     * @param \App\Domain\Activity\Entities\ActivityLog $model
     *
     * @return array
     */
    public function transform(ActivityLog $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
