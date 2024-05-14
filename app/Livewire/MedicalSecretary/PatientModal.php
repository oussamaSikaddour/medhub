<?php

namespace App\Livewire\MedicalSecretary;

use App\Livewire\Forms\Patient\AddForm;
use App\Livewire\Forms\Patient\UpdateForm;
use App\Models\Image;
use App\Models\Patient;
use App\Models\User;
use App\Traits\GeneralTrait;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PatientModal extends Component
{

    use WithFileUploads,GeneralTrait;
    public AddForm $addForm;
    public UpdateForm $updateForm;
    public Patient $patient;
    public $id = "";
    public $temporaryImageUrl=null;

    public $doctorsOptions =[];







 public function updated($property){

    try{
    if($property ==="addForm.image" && $this->addForm->image){
           $this->temporaryImageUrl = $this->addForm->image->temporaryUrl();

      }
    if($property ==="updateForm.image" && $this->updateForm->image){
           $this->temporaryImageUrl = $this->updateForm->image->temporaryUrl();
      }
    }catch (\Exception $e) {
        $this->dispatch('open-errors', [__('modals.patient.patient-pic-type-err')]);
    }
 }



 #[Computed()]
 public function doctors()
 {

    return User::whereHas('roles', function ($query) {
        $query->where('slug', 'doctor');
    })->get(['id', 'name']);
 }
    public function mount()
    {
        $this->doctorsOptions = $this->populateUsersOptions($this->doctors(),
        __('selectors.default-option.doctor') );

     $this->temporaryImageUrl=asset('img/default.png');
        if ($this->id !== "") {
            try {
              $this->patient = Patient::findOrFail($this->id);
               $patientPic = Image::where('imageable_id', $this->patient->id)
               ->where('imageable_type','App\Models\Patient')
               ->where('use_case','patient_pic')
               ->first();
               $this->temporaryImageUrl = $patientPic?->url ?? $this->temporaryImageUrl;

                $this->updateForm->fill([
                    'id' => $this->id,
                    'last_name_fr'=> $this->patient->last_name_fr,
                    'first_name_fr'=>$this->patient->first_name_fr,
                    'last_name_ar'=>$this->patient->last_name_ar,
                    'first_name_ar'=>$this->patient->first_name_ar,
                    'code'=>$this->patient->code,
                    'marital_state'=>$this->patient->marital_state,
                    'gender'=>$this->patient->gender,
                    'national_card'=>$this->patient->national_card,
                       'birth_place'=>$this->patient->birth_place,
                    'birth_date'=>$this->patient->birth_date,
                    'address'=>$this->patient->address,
                    'first_phone'=>$this->patient->first_phone,
                    'second_phone'=>$this->patient->second_phone,
                    'doctor_id'=>$this->patient->doctor_id,
                    'email'=>$this->patient->email,
                ]);

            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $this->dispatch('open-errors', [$e->getMessage()]);
            }
        }
    }


    public function handleSubmit()
    {
        $this->dispatch('form-submitted');
        if(auth()->id()===$this->id){
           $this->dispatch("update-nav-user-btn");
        }
        $response = ($this->id !== "")
            ? $this->updateForm->save($this->patient)
            : $this->addForm->save();
        if ($this->id === "") {
            $this->addForm->reset();
            $this->temporaryImageUrl=asset('img/default.png');
        }
        if ($response['status']) {
            $this->dispatch('update-patients-table');
            $this->dispatch('open-toast', $response['message']);
        } else {
            $this->dispatch('open-errors', $response['errors']);
        }
    }
    public function render()
    {
        return view('livewire.medical-secretary.patient-modal');
    }
}
