<?php

namespace IntraCompany\Commons\View\Components;

use Illuminate\View\Component;

class ModalPpal extends Component
{

    public $id;
    public $large;
    public $titulo;
    public $footer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $large = '', $titulo = '', $footer = '')
    {
        $this->id = $id;
        $this->large = $large;
        $this->titulo = $titulo;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('commons::components.modal-ppal');
    }
}
