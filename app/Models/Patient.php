<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "last_name_fr",
        "first_name_fr",
        "last_name_ar",
        "first_name_ar",
        "code",
         "marital-state",//can be : single, married, widowed, divorced,
         "gender",//can be :female or male
        "national_card",
        "birth_place",
        "birth_date",
        "address",
        "observations",
        "first_phone",
        "second_phone",
        "doctor_id" ,//belongs to user table
        'email'
    ];



    public function medecinTraitant():BelongsTo
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function medicalStays(): HasMany
    {
        return $this->hasMany(MedicalStay::class);
    }
    public function examenRadios(): HasMany
    {
        return $this->hasMany(ExamenRadio::class);
    }

}
