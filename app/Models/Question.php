<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = [
        'dataset_id',
        'title',
        'description',
        'correct_sql',
        'hint',
        'explanation',
        'difficulty',
        'topic',
    ];

    public function dataset(): BelongsTo
    {
        return $this->belongsTo(Dataset::class);
    }

    public function progress(): HasMany
    {
        return $this->hasMany(UserProgress::class);
    }
}