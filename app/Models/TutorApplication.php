<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TutorApplication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'phone',
        'biography',
        'experience_years',
        'experience_description',
        'online_experience',
        'cv',
        'diploma',
        'id_card',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'online_experience' => 'boolean',
        'experience_years' => 'integer',
    ];

     /**
     * Get the user that owns the tutor application.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the education entries for the tutor application.
     */
    public function education(): HasMany
    {
        return $this->hasMany(\App\Models\TutorApplicationEducation::class);
    }
}
