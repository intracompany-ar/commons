{{--
    <x-menu-pills-standard
        :menus="[ 
            ['id' => 'situacioncuit', 'icon' => 'fas fa-sliders-h', 'active' => 'active', 'text' => 'SITUACION CUIT' ],
            ['id' => 'cobranza', 'icon' => 'fas fa-tasks', 'text' => 'SALDOS' ],
            ['id' => 'cheques', 'icon' => 'fas fa-money-check-alt', 'text' => 'CH. 3ROS' ],
            ['id' => 'aperturactacte', 'icon' => 'fas fa-folder-open', 'text' => 'APERTURA CTA.CTE.' ],
            ['id' => 'limitesCredito', 'icon' => 'fas fa-ban', 'text' => 'LÍM. CRÉD.' ],
        ]"
        :submenus="[
            ['id' => 'blacklists', 'icon' => 'fas fa-user-ninja', 'text' => 'Listas Negras' ],
            ['id' => 'denouncedchecks', 'icon' => 'fas fa-shield-alt', 'text' => 'Cheques Denunciados' ],
            ['id' => 'ch_rech', 'icon' => 'fas fa-money-bill-wave', 'text' => 'Nota Ch.Rech.' ],
        ]"
    >
    </x-menu-pills-standard>
--}}
@props(['menus', 'submenus' => null ])

<ul class="nav nav-pills nav-fill">
    @foreach ($menus as $item)

        @if ( array_key_exists('class', $item) && $item['class'] == 'modal')
            <x-commons::menu-pills-modal
                id="{{ $item['id'] }}"
                icono="{{ array_key_exists('icon', $item) ? $item['icon'] : '' }}" 
                > 
                {{ strtoupper($item['text']) }}
            </x-commons::menu-pills-modal>
        
        @elseif ( array_key_exists('class', $item) && $item['class'] == 'link_blank')
            <x-commons::menu-pills-link href="{{ $item['id'] }}">
                {{ strtoupper($item['text']) }}
            </x-commons::menu-pills-link>
        
        @else
            <x-commons::menu-pills-tab 
                id="{{ $item['id'] }}" 
                icono="{{ array_key_exists('icon', $item) ? $item['icon'] : '' }}"
                active="{{ array_key_exists('active', $item) ? $item['active'] : '' }}" 
            >
                {{ strtoupper($item['text']) }}
            </x-commons::menu-pills-tab>
        @endif
    @endforeach

    @if ( $submenus)
        <li class="nav-item dropdown mx-1" role="presentation">
            
            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 1.5rem">
                <b> <i class="far fa-caret-square-down"></i></b>
            </a>

            <div class="dropdown-menu">
                
                @foreach ($submenus as $item)
                    
                    @if (array_key_exists('class', $item))
                        @switch($item['class'])
                            @case('modal')
                                <a  class="dropdown-item" 
                                    id="{{ $item['id'] }}-tab" 
                                    data-bs-toggle="modal" 
                                    href="#{{ $item['id'] }}"
                                >
                                    <i class="{{ array_key_exists('icon', $item) ? $item['icon'] : '' }}"></i> 
                                    <b>{{ strtoupper($item['text']) }}</b>
                                    <i class="far fa-window-restore"></i>
                                </a>        
                                @break
                            @case('link_blank')
                                <a class="dropdown-item" 
                                    id="{{ $item['id'] }}-link" 
                                    href="{{ $item['id'] }}" 
                                    target="_blank"
                                    rel="noreferrer noopener"
                                    >
                                    <i class="{{ array_key_exists('icon', $item) ? $item['icon'] : ''  }}"></i> 
                                    <b>{{ strtoupper($item['text']) }}</b>
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                @break
                            @case('javascript')
                                <a class="dropdown-item" 
                                    id="{{ $item['id'] }}-javascript" 
                                    href="#" 
                                    rel="noreferrer noopener"
                                    v-on:click.prevent={{ $item['id'] }}
                                    >
                                    <i class="{{ array_key_exists('icon', $item) ? $item['icon'] : ''  }}"></i> 
                                    <b>{{ strtoupper($item['text']) }}</b>
                                    <i class="far fa-window-restore"></i>
                                </a>
                                @break
                            @default
                                <a class="dropdown-item" 
                                    id="{{ $item['id'] }}-tab" 
                                    data-bs-toggle="tab" 
                                    href="#{{ $item['id'] }}" 
                                    aria-controls="{{ $item['id'] }}" 
                                    aria-selected="true"
                                    >
                                    <i class="{{ array_key_exists('icon', $item) ? $item['icon'] : ''  }}"></i> 
                                    <b>{{ strtoupper($item['text']) }}</b>
                                    
                                </a>
                        @endswitch    
                    @else
                        <a class="dropdown-item" 
                            id="{{ $item['id'] }}-tab" 
                            data-bs-toggle="tab" 
                            href="#{{ $item['id'] }}" 
                            aria-controls="{{ $item['id'] }}" 
                            aria-selected="true"
                            >
                            <i class="{{ array_key_exists('icon', $item) ? $item['icon'] : ''  }}"></i> 
                            <b>{{ strtoupper($item['text']) }}</b>
                        </a>
                    @endif
                @endforeach
            </div>
        </li>
    @endif
</ul>

@push('scriptsIni')
    <style>
        .dropdown-toggle:after {
            content: none !important;
        }
    </style>
@endpush
