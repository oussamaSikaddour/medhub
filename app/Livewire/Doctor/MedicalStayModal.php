<?php

namespace App\Livewire\Doctor;

use App\Livewire\Forms\MedicalStay\AddForm;
use App\Livewire\Forms\MedicalStay\UpdateForm;
use App\Models\MedicalStay;
use App\Traits\GeneralTrait;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class MedicalStayModal extends Component
{

    use WithFileUploads,GeneralTrait;
    public AddForm $addForm;
    public UpdateForm $updateForm;
    public MedicalStay $mStay;
    public $id = "";
    public $patientId;











    public function mount()
    {


        if ($this->id !== "") {
            try {
              $this->mStay = MedicalStay::findOrFail($this->id);


                $this->updateForm->fill([
                    'id' => $this->id,
                    "entry_date"=>$this->mStay->entry_date,
                    "room"=>$this->mStay->room,
                    "bed"=>$this->mStay->bed,
                    "entry_mode"=>$this->mStay->entry_mode,
                    "diagnostic"=>$this->mStay->diagnostic,
                    "release_date"=>$this->mStay->release_date,
                    "release_mode"=>$this->mStay->release_mode,
                    "release_state"=>$this->mStay->release_state,
                    "indication_given"=>$this->mStay->indiction_give,
                    "patient_id"=>$this->mStay->patient_id
                ]);

            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $this->dispatch('open-errors', [$e->getMessage()]);
            }
        }else{
         $this->addForm->patient_id = $this->patientId;
        }
    }


    public function handleSubmit()
    {
        $this->dispatch('form-submitted');

        $response = ($this->id !== "")
            ? $this->updateForm->save($this->mStay)
            : $this->addForm->save();
        if ($this->id === "") {
            $this->addForm->reset();
        }
        if ($response['status']) {
            $this->dispatch('update-medical-stays-table');
            $this->dispatch('open-toast', $response['message']);
        } else {
            $this->dispatch('open-errors', $response['errors']);
        }
    }
    public function render()
    {
        return view('livewire.doctor.medical-stay-modal');
    }
}
