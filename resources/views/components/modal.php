<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $size;
    public $title;

    public function __construct($id = 'modal', $size = '', $title = '')
    {
        $this->id = $id;
        $this->size = $size;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.modal');
    }
}
