<?php

namespace App\Domain\User\Presenters;

use App\Domain\User\Transformers\UserLoginTransformer;
use Prettus\Repository\Presenter\FractalPresenter;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class UserPresenter.
 *
 * @package namespace App\Domain\User\Presenters;
 */
class UserPublicPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserLoginTransformer();
    }
}
