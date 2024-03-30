@php
   $form = ($id !== '') ? 'updateForm' : 'addForm';
   $typeOptions = app('my_constants')['RADIO_TYPES'][app()->getLocale()];
@endphp


<div class="form__container">

    <form class="form" wire:submit.prevent="handleSubmit">



            <div class="column center">
                <x-form.selector
                htmlId="EXR-Type"
                name="{{ $form }}.type"
              :label="__('modals.examen-radio.type')"
                :data="$typeOptions"
                :showError="true"
                type="filter"
                />
            <x-form.textarea
            name="{{ $form }}.report"
            :label="__('modals.examen-radio.report')"
            html_id="MFContentFr"
            />
           </div>


          <div class="row center">

            <x-form.upload-input
             model="{{ $form }}.images"
             :label="__('modals.examen-radio.images')"
              :multiple=true
              />
              </div>
              @if (is_array($temporaryImageUrls) && !empty($temporaryImageUrls))
              <div class="imgs__container">
                  <div class="imgs">
                      @foreach ($temporaryImageUrls as $url)
                          <img class="img" src="{{ $url }}" alt="{{ __('modals.examen-radio.images') }}">
                      @endforeach
                  </div>
              </div>
          @endif


        <div class="form__actions">
            <div wire:loading>
                <x-loading />
            </div>
            <button type="submit" class="button button--primary">@lang('modals.common.submit-btn')</button>
        </div>
    </form>
</div>
