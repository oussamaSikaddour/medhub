<?php

namespace App\Livewire\Doctor;

use App\Models\MedicalStay;
use App\Traits\GeneralTrait;
use App\Traits\TableTrait;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class MedicalStaysTable extends Component
{


    use WithPagination,TableTrait ,GeneralTrait;

    // Properties with default values
    #[Url()]
    public $entryDate = "";
    #[Url()]
    public $room = "";
    #[Url()]
    public $entryMode = "";
    #[Url()]
    public $releaseMode = "";
    #[Url()]
    public $releaseDate = "";

  public $patientId;



  public function resetFilters(){
$this->entryDate="";
$this->room="";
$this->releaseDate="";
$this->entryMode="";
$this->releaseMode="";
     }




    #[Computed()]
    public function mStays()
    {
 $query= MedicalStay::query();
 $query->where('patient_id', $this->patientId);
            if ($this->entryDate !==""){
                $query->where('entry_date', $this->entryDate);
            }

            if ($this->releaseDate !==""){
                $query->where('release_date', $this->releaseDate);
            }
            if ($this->room !==""){
                $query->where('room', $this->room);
            }
            $query->where('entry_mode', 'like', "%{$this->entryMode}%");
            // $query->where('release_mode', 'like', "%{$this->releaseMode}%");

            $query->orderBy($this->sortBy, $this->sortDirection);
       return $query->get();
    }




    #[On("delete-medical-stay")]
    public function deleteEstablishment(MedicalStay $ms)
    {
        try {
            $ms->delete();
        } catch (\Exception $e) {
            $this->dispatch('open-errors', [$e->getMessage()]);
        }
    }



public function placeholder(){

    return view('components.loading',['variant'=>'l']);
}
    public function render()
    {
        return view('livewire.doctor.medical-stays-table');
    }
}
