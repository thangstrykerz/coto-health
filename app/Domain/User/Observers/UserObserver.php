<?php

namespace App\Domain\User\Observers;

use App\Domain\User\Entities\User;
use Ramsey\Uuid\Uuid;

class UserObserver
{
    public function creating(User $user)
    {
        $user->uuid = Uuid::uuid4();
    }
}
