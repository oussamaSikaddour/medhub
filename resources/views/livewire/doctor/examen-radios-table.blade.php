
@php
$maxDateMin="";
if($dateMin !=="" ){
$maxDateMin =  date('Y-m-d', strtotime($dateMin . ' + 30 days'));
}
@endphp
<div class="table__container"
x-on:update-examen-radios-table.window="$wire.$refresh()">
    <div class="table__header">
        <div>

        </div>
        <div>
            <x-form.input
             name="doctorName"
             :label="__('tables.examen-radios.doctorName')"
             type="text"
             html_id="ER-DN"
             role="filter"/>
            <x-form.input
             name="dateMin"
             :label="__('tables.examen-radios.dateMin')"
             type="date"
             html_id="ER-DM"
             role="filter"/>
            <x-form.input
             name="dateMax"
             :label="__('tables.examen-radios.dateMax')"
             type="date"
             html_id="ER-DM"
             role="filter"
             :min="$maxDateMin"
             />
        </div>

        <div class="table__filters">
            @if(isset($filters) && is_array($filters) && count($filters) > 0)
            @foreach ($filters as $filter)
                    <x-form.selector
                     htmlId="{{ 'TS-'.$filter['name']}}"
                     :name="$filter['name']"
                     :label="$filter['label']"
                     :data="$filter['data']"
                     :toTranslate="$filter['toTranslate']"
                     type="filter"
                     />
            @endforeach
        @endif
        </div>

        <div>
            <button class="button button--primary rounded" wire:click="resetFilters">
                <i class="fa-solid fa-arrows-rotate"></i>
            </button>
        </div>
    </div>

    @if(isset($this->exams) && $this->exams->isNotEmpty())


    <div class="table__body">
    <table>
        <thead>
            <tr>
           <x-table.sortable-th
           wire:key="ER-th1"
           name="type"
           :label="__('tables.examen-radios.type')"
           :$sortDirection
           :$sortBy/>
           <x-table.sortable-th
           wire:key="ER-th2"
           name="doctor_name"
           :label="__('tables.examen-radios.doctorName')"
           :$sortDirection
           :$sortBy/>
           <x-table.sortable-th
           wire:key="ER-th3"
           name="created_at"
           :label="__('tables.examen-radios.createdAt')"
           :$sortDirection
           :$sortBy/>

           <th scope="column"><div>actions</div></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($this->exams as $ex)
                <tr wire:key="{{ $ex->id }}" >
                    @php
                        $createdAt = $ex->created_at->format('Y-m-d') ;
                    @endphp
                    <td scope="row">{{ app('my_constants')['RADIO_TYPES'][app()->getLocale()][$ex->type]}}</td>
                    <td>{{ $ex->doctor_name }}</td>
                    <td>{{ $createdAt }}</td>
                    <td>
                        <livewire:open-dialog-button wire:key="'m-d-s-'.{{ $ex->id }}" classes="rounded"
                            content="<i class='fa-solid fa-trash'></i>"
                            :data='[
                                     "question" => "dialogs.title.examen-radio",
                                     "details" =>["examen-radio",  $createdAt],
                                     "actionEvent"=>[
                                                     "event"=>"delete-examen-radio",
                                                     "parameters"=>$ex
                                                     ]
                                     ]'
                             />
                             <livewire:open-modal-button  wire:key="o-p-m-m-{{ $ex->id }}" classes="rounded"
                                content="<i class='fa-solid fa-pen-to-square'></i>"
                                :data='[
                                        "title" => "modals.examen-radio.for.update",
                                        "component" => [
                                                       "name" => "doctor.examen-radio-modal", "parameters" =>
                                                       ["id" => $ex->id,
                                                        "patientId"=>$ex->patient_id
                                                       ]
                                                       ]
                                       ]'
                            />

                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    </div>
    <div class="table__footer">
        {{-- {{ $this->establishments->links() }} --}}
    </div>
    @else
    <div class="table__footer">
    <h2>
        @lang('tables.examen-radios.not-found')
    </h2>
    </div>
   @endif
</div>

