@extends("layouts.custom-layout")
@section("pageContent")
<div class="landing">
    <div class="landing__bg">
       <img src="{{ asset('img/bg.jpg') }}" alt="bg">
    </div>
    <div class="landing__logo">
      <img src="{{ asset('img/logo.png') }}" alt="">
    </div>
    <div class="landing__content">
      <div>
        <h3>@lang("pages.landing.text-1")</h3>
        <h3>@lang("pages.landing.text-2")</h3>
        <h3>@lang("pages.landing.text-3")</h3>

      </div>

    <div class="landing__actions">

        @auth

        <a class="button " href="{{ route('home') }}">
            @lang("nav.user-space")
        </a>
        @endauth
        @guest



        <a class="button " href="{{ route('loginPage') }}">
            @lang("nav.login")
        </a>
        @endguest

    </div>

    </div>
  </div>
@endsection
