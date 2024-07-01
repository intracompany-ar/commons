<?php

namespace IntraCompany\Commons\View\Components;

use Illuminate\View\Component;

class TableStandard extends Component
{

    public $id;
    public $heads;
    public $tableStriped;
    public $datatable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $heads, $datatable = false, $tableStriped = 'table-striped')
    {
        $this->id = $id;
        $this->heads = $heads;
        $this->tableStriped = $tableStriped;
        $this->datatable = $datatable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('commons::components.table-standard');
    }
}
