@extends('layouts.default-layout')
@section('pageContent')
<section class="section">
    <h2>@lang('pages.user-space.page-title')</h2>

    @canany('secretary-access')

    <div>

        <livewire:open-modal-button
        :title="__('modals.patient.for.add')"
        classes="button--primary"
        content="<i class='fa-solid fa-users'></i>"
        :data="$modalData"
    />
     </div>

        @endcanany

     <livewire:patient-table/>

  </section>
@endsection
