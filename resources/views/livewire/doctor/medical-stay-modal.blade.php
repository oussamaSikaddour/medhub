@php
    $form = ($id !== '') ? 'updateForm' : 'addForm';
@endphp

<div class="form__container">


    <form class="form" wire:submit="handleSubmit">


        <div class="row center ">
                    <x-form.input name="{{$form}}.entry_date" :label="__('modals.medical-stay.entryDate')" type="date" html_id="MsM-ED" />
        </div>
        <div class="row">
            <div class="column">


                <x-form.input name="{{$form}}.entry_mode" :label="__('modals.medical-stay.entryMode')" type="text" html_id="MsM-EM" />
                <x-form.input name="{{$form}}.room" :label="__('modals.medical-stay.room')" type="number" html_id="MsM-r" />
                <x-form.input name="{{$form}}.bed" :label="__('modals.medical-stay.bed')" type="number" html_id="MsM-nb" />

            </div>
        <div class="column">
            <x-form.textarea
            name="{{$form}}.diagnostic"
            :label="__('modals.medical-stay.diagnostic')"
            html_id="MsM-EM"
            />
        </div>

        </div>

        @if($id !=="")
            <div class="row">
                <div class="column">


                <x-form.input name="{{$form}}.release_date" :label="__('modals.medical-stay.releaseDate')" type="date" html_id="MsM-RD" />
                <x-form.input name="{{$form}}.release_mode" :label="__('modals.medical-stay.releaseMode')" type="text" html_id="MsM-RM" />
            </div>
            <div class="column">
                <x-form.textarea
                name="{{$form}}.release_state"
                :label="__('modals.medical-stay.releaseState')"
                html_id="MsM-RS"
                />
                <x-form.textarea
                name="{{$form}}.indication_given"
                :label="__('modals.medical-stay.indicationGiven')"
                html_id="MsM-IG"
                />
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
