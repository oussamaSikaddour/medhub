<?php

namespace App\Livewire\Forms\MedicalStay;

use App\Models\MedicalStay;
use App\Traits\ResponseTrait;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateForm extends Form
{
    use ResponseTrait;

public $id;
public $entry_date;
public $room;
public $bed;
public $entry_mode;
public $diagnostic;
public $release_date;
public $release_mode;
public $release_state;
public $indication_given;
public $patient_id;



    // Livewire rules
    public function rules()
    {
        $mStay = MedicalStay::findOrFail($this->id);

        return [
            'entry_date' => 'required|date|date_format:Y-m-d|after_or_equal:'. $mStay->entry_date,
            'room' => 'required|string|max:255',
            'bed' => 'nullable|string|max:255',
            'entry_mode' => 'required|string|max:255',
            'diagnostic' => 'nullable|string',
            'release_date' => 'nullable|date|date_format:Y-m-d|after_or_equal:entry_date',
            'release_mode' => 'nullable|string|max:255',
            'release_state' => 'nullable|string|max:255',
            'indication_given' => 'nullable|string',
            'patient_id' => 'required|exists:patients,id',
        ];


    }


    public function validationAttributes()
    {
        return [
            'entry_date'=>__('modals.medical-stay.entryDate'),
            'room'=>__('modals.medical-stay.room'),
            'bed'=>__('modals.medical-stay.bed'),
            'entry_mode'=>__('modals.medical-stay.entryMode'),
            'diagnostic'=>__('modals.medical-stay.diagnostic'),
            'release_date'=>__('modals.medical-stay.releaseDate'),
            'release_mode'=>__('modals.medical-stay.releaseMode'),
            'release_state'=>__('modals.medical-stay.releaseDate'),
            'indication_given'=>__('modals.medical-stay.indicationGiven'),
        ];
    }


    public function save($mStay)
    {
        $data = $this->validate();
        try {

    $mStay->update($data);
         return $this->response(true, message:__("forms.medical-stay.add.success-txt"));
        } catch (\Exception $e) {
            return $this->response(false,errors:[$e->getMessage()]);
        }
    }
}
