@props(['route','parameter'=>null,'icon'])

@php
    $iconsArray=app('my_constants')['ICONS'];
    $active = Route::is($route) ? 'active' : '';

@endphp
<button  class="button rounded ">
    <a role="menuitem"
    @if($parameter)
    href="{{ route($route,$parameter) }}"
    @else
    href="{{ route($route) }}"
    @endif
>
        <span>
            @if (array_key_exists($icon, $iconsArray))

           {!!$iconsArray[$icon]!!}
            @endif
        </span>
 </a>
</button>
