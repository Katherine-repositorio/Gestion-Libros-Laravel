<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $text;
    public $size;

    public function __construct($type = 'primary', $text = 'Botón', $size = '')
    {
        $this->type = $type;
        $this->text = $text;
        $this->size = $size;
    }

    public function render()
    {
        return view('components.button');
    }
}
