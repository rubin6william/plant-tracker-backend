<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Class Button
 * @package App\View\Components
 */
class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $type = 'button')
    {
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
