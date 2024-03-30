

@auth
<nav class="nav--phone" aria-labelledby="main-nav-phone">
    <h2 id="main-nav-phone" class="sr-only">
        Main navigation
    </h2>
        <ol class="nav__items">
            <x-nav.nav-link
                   route="homePage"
                   :label="__('nav.accueil')"
              />
            <x-nav.nav-link
                    route="home"
                    :label="__('nav.user-space')"
            />
         @can('admin-access')
             <x-nav.nav-link
                     route="dashboard"
                     :label="__('nav.dashboard')"
             />
        @endcan
        <livewire:user.user-nav-btn />
        </ol>
</nav>
@endauth
@guest
   <nav class="nav--phone" aria-labelledby="main-nav-phone">
    <h2 id="main-nav-phone" class="sr-only">
        Main navigation
    </h2>
        <ol class="nav__items">
            <x-nav.nav-link
                  route="homePage"
                  :label="__('nav.accueil')"
             />
            <x-nav.nav-link
                   route="loginPage"
                   :label="__('nav.login')"
             />
            <x-nav.nav-link
                    route="registerPage"
                    :label="__('nav.register')"
            />
        </ol>
    </nav>
@endguest

