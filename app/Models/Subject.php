<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    //
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'public_id',
        'name',
        'description',
        'color',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'public_id' => 'string',
        'name' => 'string',
        'description' => 'string',
        'color' => 'string',
        'image' => 'string',
    ];

    public function chatSessions(): HasMany
    {
        return $this->hasMany(ChatSession::class);
    }
}
