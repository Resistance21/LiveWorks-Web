<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $assessment_id
 * @property string $name
 * @property string $status
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Assessment $assessment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProjectMember> $members
 * @property-read int|null $members_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProjectArchive> $projectArchive
 * @property-read int|null $project_archive_count
 * @property-read \App\Models\ProjectArchive|null $projectArchiveLatest
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProjectDocument> $projectDocument
 * @property-read int|null $project_document_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereAssessmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'description',
        'assessment_id'
    ];

    public function members(): HasMany{
        return $this->hasMany(ProjectMember::class);
    }

    public function assessment(): BelongsTo{
        return $this->belongsTo(Assessment::class);
    }

    public function projectArchive():HasMany{
        return $this->hasMany(ProjectArchive::class);
    }
    public function projectArchiveLatest():HasOne{
        return $this->hasOne(ProjectArchive::class)->latestOfMany('version_number');
    }

    public function projectDocument(): HasMany{
        return $this->hasMany(ProjectDocument::class);
    }

}
