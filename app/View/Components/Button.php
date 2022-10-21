<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $name;
    public $type;
    public $size;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type="submit", $size = "md")
    {
        $this->name = $name;
        $this->type = $type;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
