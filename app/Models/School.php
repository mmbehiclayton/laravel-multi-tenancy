<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Role;
use App\Models\CustomPermission;


class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'

    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'school_user','school_id','user_id');
    }

    public function learners(): HasMany
    {
        return $this->hasMany(Learner::class);
    }

    public function classes(): HasMany
    {
        return $this->hasMany(Classes::class);
    }

    public function streams(): HasMany
    {
        return $this->hasMany(Stream::class);
    }


    public function roles()
    {
        return $this->hasMany(Role::class); 
    }

    public function custompermissions()
    {
        return $this->hasMany(CustomPermission::class); 
    }
}
