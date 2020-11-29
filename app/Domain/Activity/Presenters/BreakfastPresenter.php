<?php

namespace App\Domain\Activity\Presenters;

use App\Domain\Activity\Transformers\BreakfastTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ActivityPresenter.
 *
 * @package namespace App\Domain\Activity\Presenters;
 */
class BreakfastPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BreakfastTransformer();
    }
}
