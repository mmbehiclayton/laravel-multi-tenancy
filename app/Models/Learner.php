<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Learner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'birth_certificate_number', 'date_of_birth', 'status'];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
