{{--
    <x-menu-pills-modal icono="fas fa-history" id="modal_ultimas_actualizaciones" > Últ. Act.</x-menu-pills-modal>
--}}
@props(['icono' => '', 'active' => '', 'id'])


<li class="nav-item" role="presentation">
    <a class="nav-link mx-1 px-1 {{ $active }}" id="{{ $id }}-tab" data-bs-toggle="modal" href="#{{ $id }}">
        <span style="font-size: 0.8rem"><i class="{{ $icono }}"></i></span>
        {{ $slot }} 
        <span style="font-size: 0.8rem"><i class="far fa-window-restore"></i></span>
    </a>
</li>


