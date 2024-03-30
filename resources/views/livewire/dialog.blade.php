@php
$dialogQuestion = [
    "user" => function ($attribute) {
        return __('dialogs.delete.user', ['attribute' => $attribute]);
    },
    "patient" => function ($attribute) {
        return __('dialogs.delete.patient', ['attribute' => $attribute]);
    },
    "medical-stay" => function ($attribute) {
        return __('dialogs.delete.medical-stay', ['attribute' => $attribute]);
    },
    "examen-radio" => function ($attribute) {
        return __('dialogs.delete.examen-radio', ['attribute' => $attribute]);
    },


];
@endphp

<div role="dialog"
    aria-labelledby="dialog_box"
    class="box"
    x-bind:class="{ 'open': {{ $isOpen ? 'true' : 'false' }} }"
    id="box">
    <h3 id="dialog_box" class="sr-only">help about the box</h3>
    <div class="box__header">
        <h3>{{ __($question) }}</h3>
    </div>
    <div class="box__body">
        @if (count($details) === 2 && array_key_exists($details[0], $dialogQuestion))
            {{ $dialogQuestion[$details[0]]($details[1]) }}
        @else
            {{ '' }}
        @endif
    </div>
    <div class="box__footer">
        <button class="button box__closer" wire:click="closeDialog">Non</button>
        <button class="button button--primary" wire:click="confirmAction">Oui</button>
    </div>
</div>

@script
    <script>
        document.addEventListener('dialog-will-be-close', function(event) {
            @this.closeDialog();
        });
    </script>
@endscript
