
<div class="table__container"
x-on:update-medical-stays-table.window="$wire.$refresh()"
>
    <div class="table__header">
        <div>
        </div>
        <div>
            <x-form.input name="entryDate"
            :label="__('modals.medical-stay.entryDate')"
            type="date"
            html_id="msEDate"
            role="filter"/>
            <x-form.input name="entryMode"
            :label="__('modals.medical-stay.entryMode')"
            type="text"
            html_id="msEMode"
            role="filter"/>
            <x-form.input name="room"
            :label="__('modals.medical-stay.room')"
            type="number"
            html_id="msRoom"
            role="filter"/>
        </div>
        <div>
            <x-form.input name="releaseDate"
            :label="__('modals.medical-stay.releaseDate')"
            type="date"
            html_id="msRDate"
            role="filter"/>
            <x-form.input name="releaseMode"
            :label="__('modals.medical-stay.releaseMode')"
            type="text"
            html_id="msRMode"
            role="filter"/>


        </div>


        <div>
            <button class="button button--primary rounded" wire:click="resetFilters">
                <i class="fa-solid fa-arrows-rotate"></i>
            </button>
        </div>
    </div>

    @if(isset($this->mStays) && $this->mStays->isNotEmpty())


    <div class="table__body">
    <table>
        <thead>
            <tr>

           <x-table.sortable-th
           wire:key="pMs-TH-1"
           name="entry_mode"
           :label="__('modals.medical-stay.entryMode')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pMs-TH-2"
           name="entry_date"
           :label="__('modals.medical-stay.entryDate')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pMs-TH-3"
           name="room"
           :label="__('modals.medical-stay.room')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pMs-TH-4"
           name="release_mode"
           :label="__('modals.medical-stay.releaseMode')"
           :$sortDirection :$sortBy/>
           <x-table.sortable-th
           wire:key="pMs-TH-5"
           name="release_date"
           :label="__('modals.medical-stay.releaseDate')"
           :$sortDirection :$sortBy/>

             <th scope="column"><div>actions</div></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($this->mStays as $ms)
                <tr wire:key="{{ $ms->id }}">
                    <td scope="row">{{ $ms->entry_mode }}</td>
                    <td >{{ $ms->entry_date}}</td>
                    <td >{{ $ms->room }}</td>
                    <td >{{ $ms->release_mode }}</td>
                    <td >{{ $ms->release_date}}</td>
                    <td>
                        <livewire:open-dialog-button wire:key="'ms-d-e-'.{{ $ms->id }}" classes="rounded"
                            content="<i class='fa-solid fa-trash'></i>"
                            :data='[
                                     "question" => "dialogs.title.medical-stay",
                                     "details" =>["medical-stay",$ms->code],
                                     "actionEvent"=>[
                                                     "event"=>"delete-medical-stay",
                                                     "parameters"=>$ms
                                                     ]
                                     ]'
                             />
                        <livewire:open-modal-button  wire:key="ms-p-m-{{ $ms->id }}" classes="rounded"
                            content="<i class='fa-solid fa-pen-to-square'></i>"
                            :data='[
                                  "title" => "modals.medical-stay.for.update",
                                  "component" => [
                                                 "name" => "doctor.medical-stay-modal",   "parameters" => ["id" => $ms->id]
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
        @lang('tables.patients.not-found')
    </h2>
    </div>
   @endif

</div>


