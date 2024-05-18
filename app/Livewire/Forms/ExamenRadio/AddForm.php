<?php

namespace App\Livewire\Forms\ExamenRadio;

use App\Models\ExamenRadio;
use App\Traits\ImageTrait;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddForm extends Form
{
    use ResponseTrait,ImageTrait;
    public $patient_id;
    public $doctor_id;
    public $images;
    public $type;
    public $report;


public function rules()
{

    return [
        'images.*' => 'required|file|mimes:jpeg,jpg,bmp,png,gif,ico,webp|max:10000',
        'images' => 'required|array|max:10',
        'type' => 'required|string|min:2|max:10',
        'report' => 'required|string|min:10',
        'doctor_id' => [
            'required',
            'integer',
            Rule::exists('users', 'id'),
        ],
        'patient_id' => [
            'required',
            'integer',
            Rule::exists('patients', 'id'),
        ],
    ];
 }



 public function validationAttributes()
 {
     return [
         'type' => __("modals.examen-radio.type"),
         'report' => __("modals.examen-radio.report"),
         'images' => __("modals.examen-radio.images"),
     ];
 }



    public function save()
    {

        try {

            $validatedData = $this->validate();
            return DB::transaction(function () use ($validatedData, ) {

                $eRadio= ExamenRadio::create($validatedData);
                  if ($this->images) {
                      $this->uploadAndCreateImages($this->images, $eRadio->id, "App\Models\ExamenRadio", "radio");
                  }
                  return $this->response(true,message:__("forms.examen-radio.add.success-txt"));

            });
        } catch (\Exception $e) {
            return $this->response(false, errors: [$e->getMessage()]);
        }
    }



}
