<?php

namespace App\Livewire;

use App\Models\Patient;
use App\Traits\GeneralTrait;
use App\Traits\TableTrait;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PatientTable extends Component
{

    use WithPagination,TableTrait ,GeneralTrait,WithFileUploads;

    // Properties with default values
    #[Url()]
    public $fNameFr = "";
    #[Url()]
    public $fNameAr = "";
    #[Url()]
    public $lNameFr = "";
    #[Url()]
    public $lNameAr = "";
    #[Url()]
    public $doctorName= "";

    #[Url()]
    public $code = "";
    #[Url()]
    public $bDate = "";
    #[Url()]
    public $email = "";


    public function resetFilters(){
   $this->fNameAr="";
   $this->fNameFr="";
   $this->lNameAr="";
   $this->lNameFr="";
   $this->code="";
   $this->bDate="";
   $this->email="";
   $this->doctorName="";
    }

    public function callUpdatedSelectedChoiceOnKeyDownEvent(){
       $this->updatedSelectedChoice();
    }

    public function updatedSelectedChoice(){
        $this->dispatch('set-patient-id-Externally', $this->selectedChoice);

        dd($this->selectedChoice);
    }




    #[Computed()]
    public function patients()
    {
 $query= Patient::query()
 ->with([
    'medecinTraitant',
])
 ->leftJoin('users', 'patients.doctor_id', '=', 'users.id')
            ->where('first_name_ar', 'like', "%{$this->fNameAr}%")
            ->where('first_name_fr', 'like', "%{$this->fNameFr}%")
            ->where('last_name_ar', 'like', "%{$this->lNameAr}%")
            ->where('last_name_fr', 'like', "%{$this->lNameFr}%")
            ->where('patients.email', 'like', "%{$this->email}%")
            ->where('code', 'like', "%{$this->code}%");
            if ($this->bDate !==""){
                $query->where('birth_date', $this->bDate);
            }

            $query->whereHas('medecinTraitant', function ($query) {
                    $query->where('name', 'like', "%{$this->doctorName}%");
             });

            $query->select(
                'patients.*',
                'users.name as doctor_name',
                'users.email as doctor_email',
            );
            $query->orderBy($this->sortBy, $this->sortDirection);
       return $query->get();
    }




    #[On("delete-patient")]
    public function deleteEstablishment(Patient $patient)
    {
        try {
            $patient->delete();
        } catch (\Exception $e) {
            $this->dispatch('open-errors', [$e->getMessage()]);
        }
    }



public function placeholder(){

    return view('components.loading',['variant'=>'l']);
}

    public function render()
    {
        return view('livewire.patient-table');
    }
}
