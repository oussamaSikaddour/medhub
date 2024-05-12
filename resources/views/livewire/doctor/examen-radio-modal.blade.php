@php
   $form = ($id !== '') ? 'updateForm' : 'addForm';
   $typeOptions = app('my_constants')['RADIO_TYPES'][app()->getLocale()];
@endphp


<div class="form__container">

    <form class="form" wire:submit.prevent="handleSubmit">



            <div class="column ">
                <x-form.selector
                htmlId="EXR-Type"
                name="{{ $form }}.type"
              :label="__('modals.examen-radio.type')"
                :data="$typeOptions"
                :showError="true"
                type="filter"
                />
            <livewire:tiny-mce-text-area
            htmlId="MEReport"
            contentUpdatedEvent="set-report"
            wire:key="MEReport"
            :content="$report"
            />
           </div>

           <div class="column center"

           x-data="{ uploading: false, progress: 0 }"
           x-on:livewire-upload-start="uploading = true"
           x-on:livewire-upload-finish="uploading = false"
           x-on:livewire-upload-cancel="uploading = false"
           x-on:livewire-upload-error="uploading = false"
           x-on:livewire-upload-progress="progress = $event.detail.progress"
           >

             <x-form.upload-input
              model="{{ $form }}.images"
              :label="__('modals.examen-radio.images')"
               :multiple=true
               />

               <div x-show="uploading">
                 <progress max="100" x-bind:value="progress"></progress>


             </div>

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
            <div wire:loading wire:target="handleSubmit">
                <x-loading />
            </div>
            <button type="submit" class="button button--primary">@lang('modals.common.submit-btn')</button>
        </div>
    </form>
</div>
