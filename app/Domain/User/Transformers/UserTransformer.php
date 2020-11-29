<?php

namespace App\Domain\User\Transformers;

use League\Fractal\TransformerAbstract;
use App\Domain\User\Entities\User;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Domain\User\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \App\Domain\User\Entities\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
