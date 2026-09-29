<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dataset extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function tables(): HasMany
    {
        return $this->hasMany(DatasetTable::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}