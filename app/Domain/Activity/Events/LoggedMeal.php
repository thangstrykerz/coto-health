<?php

namespace App\Domain\Activity\Events;

use App\Domain\User\Entities\User;
use Illuminate\Queue\SerializesModels;
use App\Domain\Activity\Entities\AbstractMeal;

class LoggedMeal
{
    public $meal;

    public $user;

    public function __construct(AbstractMeal $meal, User $user)
    {
        $this->meal = $meal;
        $this->user = $user;
    }
}
