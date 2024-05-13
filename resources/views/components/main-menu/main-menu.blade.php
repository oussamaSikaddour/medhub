<div class="menu">
    <ul id="mainMenu" role="menu" aria-labelledby="menubutton" class="menu__items">
        @can('admin-access')
        <x-main-menu.item
             route="users"
            :routeName="__('nav.users')"
             icon="users"

          />
    @endcan
      </ul>
</div>

