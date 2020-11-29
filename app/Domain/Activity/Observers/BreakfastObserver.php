<?php

namespace App\Domain\Activity\Observers;

use App\Domain\Activity\Entities\Breakfast;
use Ramsey\Uuid\Uuid;

class BreakfastObserver
{
    public function creating(Breakfast $breakfast)
    {
        $breakfast->uuid = Uuid::uuid4();
    }
}
