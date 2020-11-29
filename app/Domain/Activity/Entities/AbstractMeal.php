<?php

namespace App\Domain\Activity\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Activity\Traits\LoggableTrait;

class AbstractMeal extends Model
{
    use LoggableTrait;
}
