<?php

namespace App\Domain\Activity\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Domain\User\Entities\User;

/**
 * Class Activity.
 *
 * @package namespace App\Domain\Activity\Entities;
 */
class ActivityLog extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'loggable_id',
        'loggable_type',
        'rating',
        'star_score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function loggable()
    {
        return $this->morphTo();
    }

}
