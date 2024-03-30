<?php

namespace App\Livewire\Doctor;

use App\Models\ExamenRadio;
use App\Traits\GeneralTrait;
use App\Traits\TableTrait;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ExamenRadiosTable extends Component
{



    use WithPagination,TableTrait ,GeneralTrait,WithFileUploads;

    // Properties with default values
    #[Url()]
    public $doctorName = "";
    #[Url()]
    public $type = "";
    #[Url()]
    public $dateMin= "";
    #[Url()]
    public $dateMax= "";
    public $patientId="";


    public function resetFilters(){
   $this->doctorName="";
   $this->type="";
   $this->dateMin="";
   $this->dateMax="";
    }






    #[Computed()]
    public function exams()
    {
 $query= ExamenRadio::query()
 ->with([
    'doctor',
])
 ->leftJoin('users', 'examen_radios.doctor_id', '=', 'users.id')
            ->where('patient_id',$this->patientId);
            $query->where('type', 'like', "%{$this->type}%");
            $query->whereHas('doctor', function ($query) {
                    $query->where('name', 'like', "%{$this->doctorName}%");
             });

               if($this->dateMin !==""){
            $query->where('examen_radios.created_at', '>=', $this->dateMin)
                  ->where('examen_radios.created_at', '<=', date('Y-m-d', strtotime($this->dateMin . ' +30 days')));
                }
                 if ($this->dateMin !== "" && $this->dateMax !== "") {
                     $query->whereBetween('examen_radios.created_at', [$this->dateMin, $this->dateMax]);
             }
            $query->select(
                'examen_radios.*',
                'users.name as doctor_name',
            );
            $query->orderBy($this->sortBy, $this->sortDirection);
       return $query->get();
    }




    #[On("delete-examen-radio")]
    public function deleteEstablishment(ExamenRadio $eRadio)
    {
        try {
            $eRadio->delete();
        } catch (\Exception $e) {
            $this->dispatch('open-errors', [$e->getMessage()]);
        }
    }


    public function mount()
    {

        // Add the second filter to $filters
        $this->initializeFilter('type',
                                __('tables.examen-radios.filters.type'),
                                app('my_constants')['RADIO_TYPES'][app()->getLocale()]);
    }


public function placeholder(){

    return view('components.loading',['variant'=>'l']);
}
    public function render()
    {
        return view('livewire.doctor.examen-radios-table');
    }
}
