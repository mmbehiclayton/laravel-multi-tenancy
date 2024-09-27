<?php

// app/Models/CustomPermission.php

namespace App\Models;
use App\Models\School;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomPermission extends SpatiePermission
{
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
