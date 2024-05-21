<?php

namespace App\Livewire\Forms\Patient;

use App\Traits\ImageTrait;
use App\Traits\ResponseTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateForm extends Form
{
    use ResponseTrait,ImageTrait;
public $id;
public $last_name_fr;
public $first_name_fr;
public $last_name_ar;
public $first_name_ar;
public $code;
public $marital_state;
public $gender;
public $national_card;
public $birth_place;
public $birth_date;
public $address;
public $observations;
public $first_phone;
public $second_phone;
public $doctor_id;
public $email;
public $image;



    // Livewire rules
    public function rules()
    {

        return [
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('patients','email')->whereNull('deleted_at')->ignore($this->id),
            ],

            'last_name_fr' => 'required|string|max:255',
            'first_name_fr' => 'required|string|max:255',
            'last_name_ar' => 'required|string|max:255',
            'first_name_ar' => 'required|string|max:255',
            'marital_state' => [
                'required',
                Rule::in(['single', 'married', 'widowed', 'divorced']),
            ],
            'gender' => [
                'required',
                Rule::in(['female', 'male']),
            ],
            'national_card' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date|date_format:Y-m-d|after:1920-01-01|before:' . Carbon::now()->subWeek()->format('Y-m-d'),
            'address' => 'required|string',
            'observations' => 'nullable|string',
            'first_phone' => [
                'nullable',
                'regex:/^(05|06|07)\d{8}$/',
                Rule::unique('patients','first_phone', 'second_phone')->whereNull('deleted_at')->ignore($this->id)
            ],
            'second_phone' => [
                'nullable',
                'regex:/^(05|06|07)\d{8}$/',
                  Rule::unique('patients','first_phone', 'second_phone')->whereNull('deleted_at')->ignore($this->id)
            ],
            'doctor_id' => 'required|exists:users,id',
           'image' => 'nullable|file|mimes:jpeg,png,gif,ico,webp|max:10000',

        ];


    }

    public function validationAttributes()
    {
        return [
        'email' =>  __("modals.patient.email"),
        'image'=>__("modals.patient.patient-img"),
        'last_name_fr'=>__('modals.patient.lNameFr'),
        'first_name_fr'=>__('modals.patient.fNameFr'),
        'last_name_ar'=>__('modals.patient.lNameAr'),
        'first_name_ar'=>__('modals.patient.fNameAr'),
        'marital_state'=>__('modals.patient.mState'),
        'gender'=>__('modals.patient.gender'),
        'national_card'=>__('modals.patient.cardNumber'),
        'birth_place'=>__('modals.patient.bPlace'),
        'birth_date'=>__('modals.patient.bDate'),
        'address'=>__('modals.patient.address'),
        'observations'=>__('modals.patient.observations'),
        'first_phone'=>__('modals.patient.FPhone'),
        'second_phone'=>__('modals.patient.SPhone'),
        'doctor_id'=>__('modals.patient.doctorId')
        ];
    }


    public function messages(): array
    {
        return [
            'first_phone.regex' => __("forms.patient.tel-match-err"),
            'second_phone.regex' => __("forms.patient.tel-match-err"),
        ];
    }

    public function save($patient)
    {
        $data =$this->validate();
       try {

        return DB::transaction(function () use ($data, $patient) {

            $image = $this->image;
            if ($image) {
                $this->uploadAndUpdateImage($image, $patient->id, "App\Models\Patient", "patient_pic");
            }
            $patient->update($data);
            return $this->response(true,message:__("forms.patient.update.success-txt"));
        });
    } catch (\Exception $e) {
        return $this->response(false,errors:[$e->getMessage()]);
    }
    }
}
