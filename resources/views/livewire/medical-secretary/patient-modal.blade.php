@php
    $form = ($id !== '') ? 'updateForm' : 'addForm';
    $mStateOptions = app('my_constants')['MARITAL_STATE'][app()->getLocale()];
    $genderOptions = app('my_constants')['GENDER'][app()->getLocale()];
@endphp

<div class="form__container">


    @if(isset($this->doctors) && count($this->doctors) === 0)

         <h2>@lang("forms.patient.no-doctor-err")</h2>

    @else
    <form class="form" wire:submit="handleSubmit">

        <div class="row">
            <div class="column">
                <div class="row ">
                    <x-form.input name="{{$form}}.last_name_fr" :label="__('modals.patient.lNameFr')" type="text" html_id="PM-LNFr" />
                    <x-form.input name="{{$form}}.last_name_ar" :label="__('modals.patient.lNameAr')" type="text" html_id="PM-LNAr" />
                    <x-form.selector
                    htmlId="MP-G"
                    name="{{$form}}.gender"
                   :label="__('modals.patient.gender')"
                    :data="$genderOptions"
                    :showError="true"
                />
                </div>
                <div class="row ">
                    <x-form.input name="{{$form}}.first_name_fr" :label="__('modals.patient.fNameFr')" type="text" html_id="PM-FNFr" />
                    <x-form.input name="{{$form}}.first_name_ar" :label="__('modals.patient.fNameAr')" type="text" html_id="PM-FNAr" />
                    <x-form.selector
                    htmlId="MP-ms"
                    name="{{$form}}.marital_state"
                   :label="__('modals.patient.mState')"
                    :data="$mStateOptions"
                    :showError="true"
                />
                </div>
                <div class="row ">

                    <x-form.input name="{{$form}}.birth_date" :label="__('modals.patient.bDate')" type="date" html_id="PM-BD" />

                    <x-form.input name="{{$form}}.birth_place" :label="__('modals.patient.bPlace')" type="text" html_id="PM-BP" />

                </div>
            </div>
            <x-form.upload-profile-input model="{{$form}}.image" :src="$temporaryImageUrl" :label="__('modals.patient.patient-img')" />
        </div>

         <div class="row center">
           <div class="column">
            <x-form.input name="{{$form}}.national_card" :label="__('modals.patient.cardNumber')" type="text" html_id="PM-CN" />
            <x-form.input name="{{$form}}.email" :label="__('modals.patient.email')" type="email" html_id="PM-E" />
            <x-form.selector
            htmlId="MP-D"
            name="{{$form}}.doctor_id"
           :label="__('modals.patient.doctorId')"
            :data="$doctorsOptions"
            :showError="true"
        />

        </div>
        <div class="column">
            <x-form.input name="{{$form}}.first_phone" :label="__('modals.patient.FPhone')" type="text" html_id="PM-FP" />
            <x-form.input name="{{$form}}.second_phone" :label="__('modals.patient.SPhone')" type="text" html_id="PM-SP" />
            <x-form.textarea
            name="{{$form}}.address"
            :label="__('modals.patient.address')"
            html_id="PM-AD"
            />
        </div>
         </div>




        <div class="form__actions">
            @can('secretary-access')
            <div wire:loading wire:target="handleSubmit">
                <x-loading />
            </div>
            <button type="submit" class="button button--primary">@lang('modals.common.submit-btn')</button>
            @endcan
        </div>

    </form>
    @endif
</div>

@script
<script>
    $wire.on('form-submitted', () => {
        setTimeout(() => {
            patientTabsTriggers[0].click();
        }, 50);
        const clearFormErrorsOnFocusEvent = new CustomEvent('clear-form-errors-on-focus');
        document.dispatchEvent(clearFormErrorsOnFocusEvent);
    });
</script>
@endscript
