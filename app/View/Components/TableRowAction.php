<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableRowAction extends Component
{
    public $route;
    public $value;
    public $isEditable;
    public $isDeletable;
    public $isShowable;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $route, 
        $value,
        $isDeletable = true,
        $isEditable = true,
        $isShowable = true,
    )
    {
        $this->route = $route;
        $this->value = $value;
        $this->isEditable = $isEditable;
        $this->isDeletable = $isDeletable;
        $this->isShowable = $isShowable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-row-action');
    }
}
