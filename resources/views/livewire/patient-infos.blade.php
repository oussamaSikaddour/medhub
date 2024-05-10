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

    <div class="column ">
    <x-form.check-box
    model="includeRadios"
    :label="__('pages.patient.includeRadios')"
     value={{ !$includeRadios }}
     html_id="PI-IR"
     :live=true
      />
      @if ($includeRadios )
      <div class="row ">
            <x-form.input
                name="RdateMin"
               :label="__('pages.patient.start-d')"
                type="date"
                html_id="RDateMin"
                role="filter"
            />
            <x-form.input
                name="RdateMax"
                :label="__('pages.patient.end-d')"
                type="date"
                html_id="RDateMax"
                role="filter"
                :min="$RdateMax"

            />

      </div>
      @endif

    <x-form.check-box
    model="includeMStays"
    :label="__('pages.patient.includeMStays')"
     value={{ !$includeMStays }}
     html_id="PI-IS"
     :live=true
      />
      @if ($includeMStays)
      <div class="row">

            <x-form.input
                name="SdateMin"
               :label="__('pages.patient.start-d')"
                type="date"
                html_id="RDateMin"
                role="filter"
            />
            <x-form.input
                name="SdateMax"
                :label="__('pages.patient.end-d')"
                type="date"
                html_id="SDateMax"
                role="filter"

                :min="$SdateMax"

            />
      </div>
      @endif
    </div>
      <button class="button rounded" wire:click="printPatientIfonsPdf()">
        <i class="fa-solid fa-file-pdf"></i>
    </button>
    </div>
  </div>
</div>
