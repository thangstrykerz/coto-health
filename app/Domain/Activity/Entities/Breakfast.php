<?php

namespace App\Domain\Activity\Entities;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Domain\User\Entities\User;
use App\Domain\Activity\Traits\LoggableTrait;

/**
 * Class Breakfast.
 *
 * @package namespace App\Domain\Activity\Entities;
 */
class Breakfast extends AbstractMeal implements Transformable
{
    use TransformableTrait, LoggableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'uuid',
        'portion_value',
        'portion_rating',
        'balance_value',
        'balance_rating',
        'sugar_fat_value',
        'sugar_fat_rating',
        'completed_at',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
