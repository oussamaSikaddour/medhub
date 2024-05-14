<?php

namespace App\Livewire\Doctor;

use App\Livewire\Forms\ExamenRadio\AddForm;
use App\Livewire\Forms\ExamenRadio\UpdateForm;
use App\Models\ExamenRadio;
use App\Models\Image;
use App\Traits\GeneralTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ExamenRadioModal extends Component
{


    use WithFileUploads,GeneralTrait;
    public AddForm $addForm;
    public UpdateForm $updateForm;
    public ExamenRadio $eRadio;
    public $id = "";
    public $patientId;
    public $report;
    public $temporaryImageUrls=[];






    public function updated($property)
    {
        try {

            if ($property === "addForm.images" && $this->addForm->images) {
                $this->temporaryImageUrls = [];
                foreach ($this->addForm->images as $image) {
                    if (!$image->temporaryUrl()) {
                        $this->temporaryImageUrls = []; // Set to empty array if any image doesn't have a temporary URL
                        break; // Exit the loop
                    }
                    $this->temporaryImageUrls[] = $image->temporaryUrl();
                }
            }

            if ($property === "updateForm.images" && $this->updateForm->images) {

                $this->temporaryImageUrls= [];
                foreach ($this->updateForm->images as $image) {
                    if (!$image->temporaryUrl()) {
                        $this->temporaryImageUrls = []; // Set to empty array if any image doesn't have a temporary URL
                        break; // Exit the loop
                    }
                    $this->temporaryImageUrls[] = $image->temporaryUrl();
                }
            }
        } catch (\Exception $e) {
            $this->dispatch('open-errors', [__('modals.slide.pic-type-err')]);
        }
    }



    #[On('set-report')]
    public function setReport($content)
    {
     if ($this->id !== "") {
        $this->updateForm->fill([
            'report'=>$content
        ]);
     }else{
         $this->addForm->fill([
             'report'=>$content
         ]);
     }
    }


    public function mount()
    {

        if ($this->id !== "") {
            try {
              $this->eRadio = ExamenRadio::findOrFail($this->id);
              $this->report =  $this->eRadio->report;
               $images = Image::where('imageable_id', $this->id)
               ->where('imageable_type','App\Models\ExamenRadio')
               ->where('use_case','radio')->get();

               foreach($images as $image){
                $this->temporaryImageUrls[] = $image?->url ?? "";

               }

                $this->updateForm->fill([
                    'id' => $this->id,
                    'doctor_id' =>auth()->id(),
                    'patient_id'=>$this->patientId,
                    'type'=>$this->eRadio->type,
                    'report'=>$this->eRadio->report,
                ]);

            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $this->dispatch('open-errors', [$e->getMessage()]);
            }
        }else{
            $this->addForm->fill([
                'doctor_id' =>auth()->id(),
                'patient_id'=>$this->patientId,

            ]);
        }
    }


    public function handleSubmit()
    {


        $this->dispatch('form-submitted');
        if(auth()->id()===$this->id){
           $this->dispatch("update-nav-user-btn");
        }
        $response = ($this->id !== "")
            ? $this->updateForm->save($this->eRadio)
            : $this->addForm->save();
            if ($this->id === "") {
                $this->addForm->images=[];
                $this->temporaryImageUrls=[];
        }

        if ($response['status']) {
            $this->dispatch('update-examen-radios-table');
            $this->dispatch('open-toast', $response['message']);
            if ($this->id === "") {
                $this->addForm->reset('report','type');
                $this->report="";

            }
        } else {
            $this->dispatch('open-errors', $response['errors']);

        }
    }
    public function render()
    {
        return view('livewire.doctor.examen-radio-modal');
    }
}
