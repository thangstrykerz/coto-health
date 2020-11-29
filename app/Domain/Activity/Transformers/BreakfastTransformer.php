<?php

namespace App\Domain\Activity\Transformers;

use League\Fractal\TransformerAbstract;
use App\Domain\Activity\Entities\Breakfast;

/**
 * Class ActivityTransformer.
 *
 * @package namespace App\Domain\Activity\Transformers;
 */
class BreakfastTransformer extends TransformerAbstract
{
    /**
     * Transform the Activity entity.
     *
     * @param \App\Domain\Activity\Entities\ActivityLog $model
     *
     * @return array
     */
    public function transform(Breakfast $model)
    {
        return [
            'id'         => $model->uuid,
            'portion_value' => $model->getAttribute('portion_value'),
            'portion_rating' => $model->getAttribute('portion_rating'),
            'balance_value' => $model->getAttribute('balance_value'),
            'balance_rating' => $model->getAttribute('balance_rating'),
            'sugar_fat_value' => $model->getAttribute('sugar_fat_value'),
            'sugar_fat_rating' => $model->getAttribute('sugar_fat_rating'),
            'description' => $model->getAttribute('description'),
            'completed_at' => $model->getAttribute('completed_at'),
        ];
    }
}
