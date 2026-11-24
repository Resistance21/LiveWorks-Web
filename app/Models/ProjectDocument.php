<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $project_id
 * @property string $file_path
 * @property string $file_name
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'file_path',
        'file_name',
        'type',
    ];

    public function project():BelongsTo{
        return $this->belongsTo(Project::class);
    }

}
