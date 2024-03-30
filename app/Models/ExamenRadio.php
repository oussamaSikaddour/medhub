<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamenRadio extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "patient_id",
        "doctor_id",
        "type",
        "report"
    ];


    public function patient():BelongsTo{
        return $this->belongsTo(Patient::class);
    }

    public function doctor():BelongsTo
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
