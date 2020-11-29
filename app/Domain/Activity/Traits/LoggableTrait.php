<?php

namespace App\Domain\Activity\Traits;

use App\Domain\Activity\Entities\ActivityLog;

trait LoggableTrait {

    public function logs()
    {
        return $this->morphMany(ActivityLog::class, 'loggable');
    }

    public function log()
    {
        return $this->logs()->first();
    }
}
