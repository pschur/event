<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'free',
        'plans',
        'public',
        'date',
        'infos'
    ];

    protected $casts = [
        'plans' => 'array',
        'date' => 'array',
        'infos' => 'array',
    ];

    public function organist(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
