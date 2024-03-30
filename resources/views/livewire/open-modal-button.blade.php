
<button class="button {{ $classes }} modal__opener" wire:click="openModal">
{{ $title }}
  {!! $content !!}
</button>


@script
<script>
$wire.on("open-modal",()=>{
const setAriaAttributesEvent = new CustomEvent('open-modal-js');
document.dispatchEvent(setAriaAttributesEvent);
})
</script>
@endscript
