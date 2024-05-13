<form class="form" wire:submit="handelSubmit">
    <h3>
    @lang("forms.login.instruction")
    </h3>
    <div class="column">
        <x-form.input
        name="form.email"
        :label="__('forms.login.email')"
        type="email"
        html_id="loginEmail" />
        <x-form.password-input
        name="form.password"
       :label="__('forms.login.password')"
        html_id="loginPassword"/>
   </div>



   <div class="form__actions">

    <div wire:loading>
         <x-loading  />
    </div>
    <a class="button"    href="{{ route("forgetPasswordPage") }}" >
     @lang("forms.login.forget-password-link")</a>
    <button type="submit" class="button button--primary">@lang("forms.common.submit-btn")</button>

</div>


  </form>


  @script
  <script>
      $wire.on('form-submitted',()=>{
        const clearFormErrorsOnFocusEvent = new CustomEvent('clear-form-errors-on-focus');
         document.dispatchEvent(clearFormErrorsOnFocusEvent);
         })
  </script>
  @endscript
