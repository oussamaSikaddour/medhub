@php
   $form = ($id !== '') ? 'updateForm' : 'addForm';
@endphp

<div
class="form__container"
>
    <form
    class="form"
    wire:submit="handleSubmit" >
    @if ($id ==="")
    <h3>@lang('modals.user.h3')</h3>
    @endif
<div class="row">
    <div class="column">
        <div class="row">
            <x-form.input
            name="{{$form}}.personnelInfo.last_name"
            :label="__('modals.user.l-name')"
             type="text"
            html_id="UM-LN"  />
            <x-form.input
            name="{{$form}}.personnelInfo.first_name"
             :label="__('modals.user.f-name')"
              type="text"
              html_id="UM-FN"  />
        </div>
        <div class="row">
              @if(!$id)
              <x-form.input
                name="addForm.default.email"
               :label="__('modals.user.email')"
                type="email"
                html_id="UM-E"  />
              @endif
              <x-form.input
              name="{{$form}}.personnelInfo.tel"
               :label="__('modals.user.tel')"
                type="text"
                html_id="UM-T"  />
        </div>

            <div class="row">
                <x-form.input
                name="{{$form}}.personnelInfo.card_number"
                :label="__('modals.user.card-number')"
                 type="text"
                html_id="UM-CN"  />
                <x-form.input
                name="{{$form}}.personnelInfo.birth_date"
                 :label="__('modals.user.b-date')"
                  type="date"
                  html_id="UM-BD"  />
            </div>
            <div class="row">
                <x-form.input
                name="{{$form}}.personnelInfo.birth_place"
                :label="__('modals.user.b-place')"
                 type="text"
                html_id="UM-BP"  />
                <x-form.input
                name="{{$form}}.personnelInfo.address"
                :label="__('modals.user.address')"
                 type="text"
                html_id="UM-AD"  />
            </div>


    </div>


    <x-form.upload-profile-input
     model="{{$form}}.image"
     :src="$temporaryImageUrl"
    :label="__('modals.user.profile-img')" />
</div>




        <div class="form__actions">
            <div wire:loading>
                <x-loading  />
           </div>
            <button type="submit" class="button button--primary">@lang('modals.common.submit-btn')</button>
        </div>
    </form>

</div>

@script
<script>
$wire.on('form-submitted',()=>{

      setTimeout(() => {
        userTabsTriggers[0].click();
      }, 50);
const clearFormErrorsOnFocusEvent = new CustomEvent('clear-form-errors-on-focus');
 document.dispatchEvent(clearFormErrorsOnFocusEvent);
})
</script>
@endscript
