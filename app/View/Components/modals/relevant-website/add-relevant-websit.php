<?php

namespace App\View\Components\modals\relevant-website;

use Illuminate\View\Component;

class add-relevant-websit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.relevant-website.add-relevant-websit');
    }
}
