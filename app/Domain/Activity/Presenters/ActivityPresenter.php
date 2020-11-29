<?php

namespace App\Domain\Activity\Presenters;

use App\Domain\Activity\Transformers\ActivityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ActivityPresenter.
 *
 * @package namespace App\Domain\Activity\Presenters;
 */
class ActivityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ActivityTransformer();
    }
}
