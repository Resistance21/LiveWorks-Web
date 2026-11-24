<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $unit_id
 * @property int $year
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Unit $unit
 * @method static \Database\Factories\AssessmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereYear($value)
 * @mixin \Eloquent
 */
class Assessment extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_id',
        'year',
        'name',
    ];

    public function unit(): BelongsTo{
        return $this->belongsTo(Unit::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
