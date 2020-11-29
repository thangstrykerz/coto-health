<?php

namespace App\Domain\User\Transformers;

use League\Fractal\TransformerAbstract;
use App\Domain\User\Entities\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Domain\User\Transformers;
 */
class UserLoginTransformer extends TransformerAbstract
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
        $token = (string) Auth::guard()->getToken();
        $expiration = Auth::guard()->getPayload()->get('exp');
        return [
            'id'         => $model->uuid,
            'email' => $model->email,
            'name' => $model->name,
            'phone_number' => $model->phone_number,
            'gender' => $model->gender,
            'token' =>  $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration - time()
        ];
    }
}
