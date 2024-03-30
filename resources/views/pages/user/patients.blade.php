@extends('layouts.default-layout')
@section('pageContent')

<section class="section">
    <div>

        <livewire:open-modal-button
        :title="__('pages.patients.add-patient')"
        classes="button--primary"
        content="<i class='fa-solid fa-users'></i>"
        :data="$modalData"
    />
     </div>

     <livewire:patient-table/>

  </section>
@endsection

