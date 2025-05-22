<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorApplicationEducation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tutor_application_educations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tutor_application_id',
        'institution',
        'degree',
        'field',
        'start_date',
        'end_date',
        'current',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'current' => 'boolean',
    ];

     /**
     * Get the tutor application that owns this education entry.
     */
    public function application()
    {
        return $this->belongsTo(TutorApplication::class, 'tutor_application_id');
    }
}