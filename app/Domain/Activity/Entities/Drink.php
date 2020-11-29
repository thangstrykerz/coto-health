<?php

namespace App\Domain\Activity\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Domain\User\Entities\User;
use App\Domain\Activity\Traits\LoggableTrait;

/**
 * Class Breakfast.
 *
 * @package namespace App\Domain\Activity\Entities;
 */
class Drink extends Model implements Transformable
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
        'volume_rating',
        'volume_value',
        'sweet_creamy_rating',
        'sweet_creamy_value',
        'completed_at',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
