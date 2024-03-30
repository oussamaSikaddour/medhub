@php
// Use the ternary operator for concise conditional logic
$patientName = app()->getLocale() === 'ar' ?
    $this->patient->last_name_ar . ' ' . $this->patient->first_name_ar :
    $this->patient->last_name_fr . '  ' . $this->patient->first_name_fr;
@endphp

<div class="infos">
  <div class="infos__header">
    <div>
      <h2>{{ $patient->code }}</h2>
      <p>{{ $patientName }}</p>
    </div>

    <img
      src="{{ $temporaryImageUrl }}"
      alt="{{ $patientName }} image">
  </div>
  <div class="infos__body">
    <div class="row">

    <x-form.check-box
    model="includeRadios"
    :label="__('pages.patient.includeRadio')"
     value={{ !$includeRadios }}
     html_id="PI-IR"
     :live=true
      />

      <button class="button rounded" wire:click="printPatientIfonsPdf()">
        <i class="fa-solid fa-file-pdf"></i>
    </button>
    </div>




  </div>
</div>
