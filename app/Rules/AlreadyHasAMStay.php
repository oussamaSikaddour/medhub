<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class AlreadyHasAMStay implements ValidationRule
{
    protected $patientId; // Property to store classroom ID
    protected $attributeLabel;
    protected $mStayId;



    public function __construct($patientId,$attributeLabel,$mStayId =null)
    {
        $this->patientId = $patientId;
        $this->mStayId = $mStayId;
        $this->attributeLabel = $attributeLabel;
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = DB::table('medical_stays')
        ->where('patient_id', $this->patientId)
        ->where('entry_date', '<=', $value)
        ->where('release_date', '>=', $value);

      // Exclude the current stay if $mStayId is provided
      if ($this->mStayId) {
        $query->where('id', '<>', $this->mStayId);
      }

      $existingMStay = $query->select('entry_date', 'release_date')
                           ->first(); // Fetch the first conflicting record
      if ($existingMStay) {
        $fail(__('rules.medical_stay.not-valid', [
          'attribute' => $this->attributeLabel,
          'start' => $existingMStay->entry_date,
          'end' => $existingMStay->release_date,
        ]));
      }
    }
}
