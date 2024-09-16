<?php

namespace App\Models;
use App\Models\School;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends SpatieRole
{
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
