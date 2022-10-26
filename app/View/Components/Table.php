<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $create;
    public $columns;
    public $search;
    public $datum;
    public $numPage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($columns, $search, $datum, $numPage, $create=null)
    {
        $this->create = $create;
        $this->columns = $columns;
        $this->search = $search;
        $this->datum = $datum;
        $this->numPage = $numPage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
