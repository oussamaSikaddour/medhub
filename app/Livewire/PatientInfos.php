<?php

namespace App\Livewire;

use App\Models\Image;
use App\Models\Patient;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use PDF;
class PatientInfos extends Component
{

    public Patient $patient;
    public $patientId = "";
    public $temporaryImageUrl=null;
    public $includeRadios=false;
    public $includeMStays=false;
    public $RdateMax="";
    public $RdateMin="";
    public $SdateMax="";
    public $SdateMin="";
  public $patientData=[];







 public function updated($property){

    if($property ==="SdateMin"){
   $this->SdateMax=Carbon::parse($this->SdateMin)->addDays(120)->toDateString();
    }
    if($property ==="RdateMin"){
        $this->RdateMax=Carbon::parse($this->RdateMin)->addDays(120)->toDateString();
}
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



    public function mount()
    {

     $this->temporaryImageUrl=asset('img/default.png');

            try {
              $this->patient = Patient::findOrFail($this->patientId);
               $patientPic = Image::where('imageable_id', $this->patient->id)
               ->where('imageable_type','App\Models\Patient')
               ->where('use_case','patient_pic')
               ->first();
               $this->temporaryImageUrl = $patientPic?->url ?? $this->temporaryImageUrl;
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $this->dispatch('open-errors', [$e->getMessage()]);
            }

    }


    #[Computed]
    public function patientData()
    {
      $relations = ['image'];

      if ($this->includeRadios) {
        $relations['examenRadios'] = function ($query) {
          if ($this->RdateMin !== "") {
            $query->where('examen_radios.created_at', '>=', Carbon::parse($this->RdateMin));
            if ($this->RdateMax !== "") {
              $query->where('examen_radios.created_at', '<=', Carbon::parse($this->RdateMax));
            } else {
              $query->where('examen_radios.created_at', '<=', Carbon::parse($this->RdateMin . ' +120 days'));
            }
          }
        };
      }

      if ($this->includeMStays) {
        $relations['medicalStays'] = function ($query) {
          if ($this->SdateMin !== "") {
            $query->where('medical_stays.created_at', '>=', Carbon::parse($this->SdateMin));
            if ($this->SdateMax !== "") {
              $query->where('medical_stays.created_at', '<=', Carbon::parse($this->SdateMax));
            } else {
              $query->where('medical_stays.created_at', '<=', Carbon::parse($this->SdateMin . ' +120 days'));
            }
          }
        };
      }

      $query = Patient::query()
        ->with($relations);

      $query->where('id', $this->patientId);

      return $query->first();
    }





    public function printPatientIfonsPdf()
{

$patientData = $this->patientData();
$patientData['includeRadios']= $this->includeRadios;
$patientData['includeMStays']= $this->includeMStays;
   try {
        $pdf = PDF::loadView("pdfs.patient-infos", compact('patientData'));
        $tempDir = storage_path('app/temp/');
        $tempFilePath = $tempDir . 'patientInfos.pdf';
        $pdf->save($tempFilePath);
        return response()->download($tempFilePath, 'patientInfos.pdf')
            ->deleteFileAfterSend(true);
    } catch (\Exception $e) {
        $this->dispatch('open-errors', [$e->getMessage()]);
    }
}

    public function render()
    {
        return view('livewire.patient-infos');
    }
}
