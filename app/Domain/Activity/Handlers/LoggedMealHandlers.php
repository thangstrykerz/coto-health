<?php

namespace App\Domain\Activity\Handlers;

use App\Domain\Activity\Events\LoggedMeal;
use App\Domain\Activity\Contracts\ActivityLogRepository;

class LoggedMealHandlers
{
    protected $repository;

    public function __construct(ActivityLogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(LoggedMeal $event)
    {
        $meal = $event->meal;
        $user = $event->user;

        $activityLog = $this->repository->create([
            'user_id' => $user->id,
            'rating' => $meal->portion_rating + $meal->balance_rating,
            'star_score' => $meal->portion_value + $meal->balance_value,
        ]);

        $meal->logs()->save($activityLog);
    }
}
