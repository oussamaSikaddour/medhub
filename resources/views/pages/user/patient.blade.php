@extends('layouts.default-layout')
@section('pageContent')

@php

@endphp

<section class="section">
    <livewire:patient-infos  :$patientId/>
    <div  >
      <button class="button rounded button--primary">
        <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i></a>
      </button>

        <livewire:open-modal-button
        :title="__('pages.patient.add-medical-stay')"
        classes="button--primary"
        content="<i class='fa-solid fa-users'></i>"
        :data="$modalData1"
    />


    <livewire:open-modal-button
    :title="__('modals.examen-radio.for.add')"
    classes="button--primary"
    content="<i class='fa-solid fa-users'></i>"
    :data="$modalData2"
/>
    </div>
<livewire:doctor.medical-stays-table  :$patientId/>

<livewire:doctor.examen-radios-table  :$patientId/>

  </section>
@endsection

