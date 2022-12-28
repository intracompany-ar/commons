@props(['icono' => '', 'active' => '', 'id'])


<li class="nav-item" role="presentation">
    <a class="nav-link mx-1 px-1 {{ $active }}" id="{{ $id }}-tab" data-bs-toggle="tab" href="#{{ $id }}" role="tab" aria-controls="{{ $id }}" aria-selected="true">
        <span style="font-size: 0.8rem"><i class="{{ $icono }}"></i></span> {{ $slot }} 
    </a>
</li>
