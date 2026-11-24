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
 * @property int $version_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectArchive whereVersionNumber($value)
 * @mixin \Eloquent
 */
class ProjectArchive extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'file_path',
        'file_name',
        'version_number',
    ];

    public function project():BelongsTo{
        return $this->belongsTo(Project::class);
    }
}
