<?php

namespace DuxDucisArsen\Commons\View\Components;

use Illuminate\View\Component;

/**
 * SI ES MODAL:  Link el Id del modal, modal= modal, onclick nada a menos que tenga que ejecutar algún script 
 */
class ButtonPlus extends Component
{
    public $link;
    public $modal;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link, $modal = null)
    {
        $this->link = $link;
        $this->modal = $modal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            <a  href="{{ $link }}" 
                data-bs-toggle="{{ $modal }} ? 'modal' : 'no_modal'" 
                accesskey="A">
                <i class="fa fa-plus-circle fa-3x" aria-hidden="true" style="color: rgb(106,108,106);" ></i>
            </a>
        blade;
    }
}