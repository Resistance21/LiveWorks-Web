<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitUserPivot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitUserPivot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitUserPivot query()
 * @mixin \Eloquent
 */
class UnitUserPivot extends Model
{
    protected $fillable = [
        'unit_id',
        'user_id',
    ];
}
