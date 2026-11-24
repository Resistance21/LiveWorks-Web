<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $unit_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $unit_name
 * @method static \Database\Factories\UnitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereUnitCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereUnitName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_code',
        'unit_name'       
    ];

    public function assessments(): HasMany{
        return $this->hasMany(Assessment::class);
    }
}
