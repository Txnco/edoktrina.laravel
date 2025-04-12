<?php

namespace App\Models;

use App\Models\Subject;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

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
}
