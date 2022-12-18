{{--
    <x-menu-pills-tab id="fate" ><img src="{{ asset('storage/img/img_icons/iconFate_32x32.png') }}" width="30em"> Dispon. Fate</x-menu-pills-tab>
--}}

@props(['icono' => '', 'id' => 'link', 'href', 'target' => '_blank', 'active' => ''])

<li class="nav-item" role="presentation">
    <a  class="nav-link mx-1 px-1 {{ $active }}" id="{{ $id }}-tab" href="{{ $href }}" role="tab" target="{{ $target }}"
        rel="noreferrer noopener" aria-controls="{{ $id }}" aria-selected="true" >
            
            <span style="font-size: 0.8rem"><i class="{{ $icono }}"></i></span>
            {{ $slot }}

            @if($target == '_blank')
                <span style="font-size: 0.8rem"><i class="fas fa-external-link-alt"></i></span>
            @endif

    </a>
</li>
