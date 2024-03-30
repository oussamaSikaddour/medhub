<?php

namespace App\Livewire\User;

use App\Models\Service;
use App\Models\User;
use App\Traits\TableTrait;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
use WithPagination, TableTrait;
#[Url()]
public $fullName = "";
#[Url()]
public $email = "";
public $customNoUserFoundMessage;
public $defaultNoUserFoundMessage;
public $showForSuperAdmin=false;




public function resetFilters(){
$this->fullName="";
$this->email="";
}

public function mount()
{
$this->defaultNoUserFoundMessage= __('tables.users.not-found');
}




#[Computed]
public function users()
{
        $query = User::query()
        ->with([
            'occupations',
            'personnelInfo',
            'images'
        ])->leftJoin('personnel_infos', 'users.id', '=', 'personnel_infos.user_id')
        ->leftJoin('occupations', 'users.id', '=', 'occupations.user_id');
        $query->where('email', 'like', "%{$this->email}%");
        $query->where('name', 'like', "%{$this->fullName}%");

        $query->select(
            'users.*',
            'personnel_infos.last_name',
            'personnel_infos.first_name',
            'personnel_infos.card_number',
            'personnel_infos.birth_date',
            'personnel_infos.birth_place',
            'personnel_infos.tel',
            'personnel_infos.address',
        );
        $query->orderBy($this->sortBy, $this->sortDirection);
        return $query->get();

}







public function updatedPerPage()
{
    $this->resetPage();
}

public function generateUsersExcel(){
    return $this->generateExcel(function() {
        return $this->users()->map(function ($user) {
            return [
                __("tables.users.fullName")=> $user->name,
                __("tables.users.email") => $user->email,
                __("tables.users.registration-date") => $user->created_at->format('d/m/Y'),
                __("tables.users.phone")=> $user->tel,
                __("tables.users.card_number")=> $user->card_number,
                __("tables.users.birth_date")=> $user->birth_date,
                __("tables.users.birth_place")=> $user->birth_place,
                __("tables.users.address")=> $user->address,
            ];
        })->toArray();
    }, "users");
}



#[On("delete-user")]
public function deleteUser(User $user){
    $user->delete();
}


public function placeholder(){

    return view('components.loading',['variant'=>'l']);
}


public function render()
    {
        return view('livewire.user.users-table');
    }
}
