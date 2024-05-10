
<div
wire:ignore
>
        <textarea id="{{ $htmlId }}" ></textarea>
    </div>

    @script
    <script>
     $wire.on('initialize-tiny-mce', () => {
     tinymce.init({
     selector: `#{{ $htmlId }}`,
    plugins: 'code table lists ',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table ',
    setup: function (editor) {
     const updateContent = (content) => {
    editor.setContent(content);
    editor.save();
    };
     editor.on('init', function () {
    updateContent(`{!! $content !!}`);
    });
    editor.on('MouseLeave', ()=>{
        @this.call('setContent',editor.getContent());
    });
    },
    });
     });
    </script>
    @endscript
