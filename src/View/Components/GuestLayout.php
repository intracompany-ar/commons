<?php

namespace IntraCompany\Commons\View\Components;

use Illuminate\View\Component;

/**
 * Cuando se ingresa a la pantalla login. (invitado)
 *
 */
class GuestLayout extends Component
{

    public $title;

    public function __construct($title = '')
    {
        $this->title = $title;
    }
    
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('commons::layouts.guest');
    }
}
