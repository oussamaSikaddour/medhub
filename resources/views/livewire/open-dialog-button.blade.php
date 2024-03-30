<button class="button {{ $classes }} box__opener" wire:click="openDialog">
    {{ $title }}
      {!! $content !!}
</button>


@script
<script>
$wire.on("open-dialog",()=>{
const openDialogBoxEvent = new CustomEvent('open-dialog-box');
document.dispatchEvent(openDialogBoxEvent);
})
</script>
@endscript
