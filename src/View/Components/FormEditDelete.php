<?php

namespace IntraCompany\Commons\View\Components;

use Illuminate\View\Component;

class FormEditDelete extends Component
{
    public $urldelete;
    public $urledit;
    public $frase;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($urledit = null, $urldelete = null, $frase = 'Seguro quiere eliminar?', $id = 'form_edit_delete_')
    {
        $this->urldelete = $urldelete;
        $this->urledit = $urledit;
        $this->frase = $frase;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('commons::components.form-edit-delete');
    }
}
