@php
    $form = ($id !== '') ? 'updateForm' : 'addForm';
@endphp

<div class="form__container">

    @if($noReleaseDateYet)

    <div>
<h2>@lang("modals.medical-stay.active-stay-err")</h2>
</div>
    @else

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

        <h3>@lang('modals.medical-stay.diagnostic') : </h3>

            <livewire:tiny-mce-text-area
            htmlId="MsM-Em"
            contentUpdatedEvent="set-diagnostic"
            wire:key="MsM-Em"
            :content="$diagnostic"
            />

        </div>

        </div>

        @if($id !=="")
            <div class="row">



                <x-form.input name="{{$form}}.release_date" :label="__('modals.medical-stay.releaseDate')" type="date" html_id="MsM-RD" />
                <x-form.input name="{{$form}}.release_mode" :label="__('modals.medical-stay.releaseMode')" type="text" html_id="MsM-RM" />

            </div>
            <div class="row">
                <div class="column">
                    <h3>@lang('modals.medical-stay.releaseState')</h3>
                    <livewire:tiny-mce-text-area
                    htmlId="MsM-Rs"
                    contentUpdatedEvent="set-release-state"
                    wire:key="MsM-Rs"
                    :content="$releaseState"
                    />
                </div>
                <div class="column">
                    <h3>@lang('modals.medical-stay.indicationGiven')</h3>
                    <livewire:tiny-mce-text-area
                    htmlId="MsM-Ig"
                    contentUpdatedEvent="set-indication-given"
                    wire:key="MsM-Ig"
                    :content="$indicationGiven"
                    />
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
