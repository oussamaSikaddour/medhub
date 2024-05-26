
<div class="table__container"
x-on:update-patients-table.window="$wire.$refresh()"
>
    <div class="table__header">
        <div>
                <h3>@lang('tables.patients.title') :</h3>
        </div>
        <div>
            <x-form.input name="lNameFr"
            :label="__('modals.patient.lNameFr')"
            type="text"
            html_id="plNameFr"
            role="filter"/>
            <x-form.input name="fNameFr"
            :label="__('modals.patient.fNameFr')"
            type="text"
            html_id="fNameFr"
            role="filter"/>
            <x-form.input name="code"
            :label="__('modals.patient.code')"
            type="text"
            html_id="pCode"
            role="filter"/>
        </div>
        <div>
            <x-form.input name="lNameAr"
            :label="__('modals.patient.lNameAr')"
            type="text"
            html_id="plNameAr"
            role="filter"/>
            <x-form.input name="fNameAr"
            :label="__('modals.patient.fNameAr')"
            type="text"
            html_id="fNameAr"
            role="filter"/>
            <x-form.input name="bDate"
            :label="__('modals.patient.bDate')"
            type="date"
            html_id="pBDate"
            role="filter"/>
        </div>
        <div>
            <x-form.input
              name="email"
              :label="__('modals.patient.email')"
              type="text"
              html_id="pEmail"
               role="filter"/>
            <x-form.input
              name="doctorName"
              :label="__('modals.patient.doctorName')"
              type="text"
              html_id="pDoctorName"
               role="filter"/>
        </div>
        <div class="table__filters">

            @if(isset($filters) && is_array($filters) && count($filters) > 0)
            @foreach ($filters as $filter)
                    <x-form.selector
                      htmlId="{{ 'TEF-'.$filter['name']}}"
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

    @if(isset($this->patients) && $this->patients->isNotEmpty())


    <div class="table__body">
    <table>
        <thead>
            <tr>

           <x-table.sortable-th
           wire:key="pT-TH-1"
           name="code"
           :label="__('modals.patient.code')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pT-TH-2"
           name="last_name_fr"
           :label="__('modals.patient.lNameFr')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pT-TH-3"
           name="first_name_fr"
           :label="__('modals.patient.fNameFr')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pT-TH-4"
           name="last_name_ar"
           :label="__('modals.patient.lNameAr')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pT-TH-5"
           name="first_name_ar"
           :label="__('modals.patient.fNameAr')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pT-TH-10"
           name="doctor_name"
           :label="__('modals.patient.doctorName')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pT-TH-8"
           name="email"
           :label="__('modals.patient.email')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pT-TH-9"
           name="birth_date"
           :label="__('modals.patient.bDate')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pT-TH-7"
           name="created_at"
           :label="__('tables.users.registration-date')"
           :$sortDirection :$sortBy/>

             <th scope="column"><div>actions</div></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($this->patients as $p)
                <tr wire:key="{{ $p->id }}">
                    <td scope="row">{{ $p->code }}</td>
                    <td  >{{ $p->last_name_fr }}</td>
                    <td  >{{ $p->first_name_fr }}</td>
                    <td  >{{ $p->last_name_ar }}</td>
                    <td  >{{ $p->first_name_ar }}</td>
                    <td  >{{ $p->doctor_name }}</td>
                    <td  >{{ $p->email}}</td>
                    <td >{{ $p->birth_date}}</td>
                    <td >{{ $p->created_at->format('Y-m-d')}}</td>
                    <td>
                        <livewire:open-dialog-button wire:key="'p-d-e-'.{{ $p->id }}" classes="rounded"
                            content="<i class='fa-solid fa-trash'></i>"
                            :data='[
                                     "question" => "dialogs.title.patient",
                                     "details" =>["patient",$p->code],
                                     "actionEvent"=>[
                                                     "event"=>"delete-patient",
                                                     "parameters"=>$p
                                                     ]
                                     ]'
                             />
                        <livewire:open-modal-button  wire:key="p-p-m-{{ $p->id }}" classes="rounded"
                            content="<i class='fa-solid fa-pen-to-square'></i>"
                            :data='[
                                  "title" => "modals.patient.for.update",
                                  "component" => [
                                                 "name" => "medical-secretary.patient-modal",   "parameters" => ["id" => $p->id]
                                                 ]
                                    ]'
                        />
                        @can("doctor-access")
                        <x-table.link route="patient" parameter="{{ $p->id}}" icon="view" />
                        @endcan
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
        @lang('tables.patients.not-found')
    </h2>
    </div>
   @endif

</div>


