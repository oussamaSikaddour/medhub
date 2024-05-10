



@auth


<header class="header" >
<nav class="nav" aria-labelledby="main-nav">
    <h2 id="main-nav" class="sr-only">
        Main navigation
    </h2>
        <div class="nav__addons">
           <x-main-menu.open-btn   html_id="mainMenuDeskTopBtn" />
           <x-nav.nav-logo/>
        </div>
        <ol class="nav__items">
            <x-nav.nav-link
            route="home"
            :label="__('nav.user-space')"
             />
        </ol>
        <ol class="nav__items">
         @can('admin-access')
                  <x-nav.nav-link
                        route="dashboard"
                       :label="__('nav.dashboard')"
                    />
          @endcan
        <livewire:user.user-nav-btn/>
        </ol>
    </nav>
</header>
@endauth

 @guest
<header class="header" >
<nav class="nav" aria-labelledby="main-nav">
    <h2 id="main-nav" class="sr-only">
        Main navigation
    </h2>

         <ol class="nav__items">
                <x-nav.nav-link
                        route="homePage"
                        :label="__('nav.accueil')"
                 />
          </ol>

        <ol class="nav__items">
                 <x-nav.nav-link
                        route="loginPage"
                        :label="__('nav.login')"
                 />
        </ol>
    </nav>
</header>

@endguest

