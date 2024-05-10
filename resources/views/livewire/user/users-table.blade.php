
<div class="table__container"
x-on:update-users-table.window="$wire.$refresh()"

>
    <div class="table__header">
        <div>

        </div>
        <div>
            <x-form.input
                 name="fullName"
                 :label="__('tables.users.fullName')"
                 type="text"
                 html_id="fullNameUT"
                 role="filter"/>
            <x-form.input
                   name="email"
                  :label="__('tables.users.email')"
                   type="text"
                   html_id="usersEmailUT"
                   role="filter"/>
        </div>
        <div class="table__filters">
            @if(isset($filters) && is_array($filters) && count($filters) > 0)
            @foreach ($filters as $filter)
                    <x-form.selector
                     htmlId="{{ 'TU-'.$filter['name']}}"
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
    @if(isset($this->users) && $this->users->isNotEmpty())
    <div class="table__body">
      <table>
          <thead>
             <tr>
             <x-table.sortable-th
                      wire:key="U-TH-2"
                      name="name"
                      :label="__('tables.users.fullName')"
                      :$sortDirection :$sortBy/>
             <x-table.sortable-th
                       wire:key="U-TH-3"
                       name="email"
                       :label="__('tables.users.email')"
                        :$sortDirection :$sortBy/>
             <x-table.sortable-th
                       wire:key="U-TH-4"
                       name="created_at"
                       :label="__('tables.users.registration-date')"
                       :$sortDirection :$sortBy/>
             <x-table.sortable-th
                       wire:key="U-TH-4"
                        name="tel"
                        :label="__('tables.users.phone')"
                        :$sortDirection :$sortBy/>
             <x-table.sortable-th
                       wire:key="U-TH-5"
                        name="card_number"
                        :label="__('tables.users.card_number')"
                        :$sortDirection :$sortBy/>
             <x-table.sortable-th
                       wire:key="U-TH-6"
                        name="birth_date"
                        :label="__('tables.users.birth_date')"
                        :$sortDirection :$sortBy/>
             <x-table.sortable-th
                       wire:key="U-TH-6"
                        name="birth_place"
                        :label="__('tables.users.birth_place')"
                        :$sortDirection :$sortBy/>
             <x-table.sortable-th
                       wire:key="U-TH-7"
                        name="address"
                        :label="__('tables.users.address')"
                        :$sortDirection :$sortBy/>

             <th scope="column"><div>actions</div></th>
             </tr>
          </thead>
          <tbody>




             @foreach ($this->users as $u)
             <tr wire:key="{{ $u->id }}" scope="row">
             <td>{{ $u->name}}</td>
             <td>{{ $u->email}}</td>
             <td>{{ $u->created_at->format('d/m/Y')}}</td>
            <td>{{ $u->tel}}</td>
            <td>{{ $u->card_number}}</td>
            <td>{{ $u->birth_date}}</td>
            <td>{{ $u->birth_place}}</td>
            <td>{{ $u->address}}</td>
            <td>
            <livewire:open-dialog-button
                wire:key="'o-d-u-'.{{ $u->id }}"
                classes="rounded"
                content="<i class='fa-solid fa-trash'></i>"
                :data='[
                         "question" => "dialogs.title.user",
                         "details" =>["user", $u->name],
                         "actionEvent"=>[
                                         "event"=>"delete-user",
                                         "parameters"=>$u
                                         ]
                         ]'
                 />
           <livewire:open-modal-button
             wire:key="'o-b-u-'.{{ $u->id }}"
             classes="rounded"
            content="<i class='fa-solid fa-pen-to-square'></i>"
            :data='[
                    "title" => "modals.user.for.update-employee",
                     "component" => [
                                     "name" => "user.user-modal",
                                     "parameters" => ["id"=>$u->id]
                                     ]
                    ]'
             />
             <livewire:open-modal-button
                wire:key="'o-b-m-u-'.{{ $u->id }}"
                classes="rounded"
                 content="<i class='fa-solid fa-link'></i>"
                 :data='[
                         "title" => "modals.role.for.manage",
                         "component" => [
                                         "name" => "admin.manage-roles-modal",
                                         "parameters" => ["id" => $u->id]
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
            {{$customNoUserFoundMessage ?? $defaultNoUserFoundMessage }}
        </h2>
    </div>
   @endif
</div>



