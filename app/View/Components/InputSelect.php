<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputSelect extends Component
{
    public $name;
    public $label;
    public $value;
    public $options;

    public function __construct($label, $name, $options, $value=null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.input-select');
    }
}
