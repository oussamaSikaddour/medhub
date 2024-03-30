<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalStay extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "entry_date",
        "room",
        "bed",
        "entry_mode",
        "diagnostic",
        "release_date",
        "release_mode",
        "release_state",
        "indication_given",
        "patient_id",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "deleted_at"
    ];
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }


}
