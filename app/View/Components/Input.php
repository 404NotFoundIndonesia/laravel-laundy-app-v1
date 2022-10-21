<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $label;
    public $value;

    public function __construct($label, $name, $type='text', $value='')
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.input');
    }
}
