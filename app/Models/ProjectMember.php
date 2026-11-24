<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectMember query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectMember whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectMember whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProjectMember whereUserId($value)
 * @mixin \Eloquent
 */
class ProjectMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_id',
        'role',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

}
