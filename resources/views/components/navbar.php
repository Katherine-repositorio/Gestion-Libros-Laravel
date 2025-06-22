<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $brand;

    /**
     * Create a new component instance.
     *
     * @param string|null $brand
     * @return void
     */
    public function __construct($brand = null)
    {
        $this->brand = $brand ?? 'MiApp';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
