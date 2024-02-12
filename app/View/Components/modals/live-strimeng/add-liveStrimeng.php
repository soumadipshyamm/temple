<?php

namespace App\View\Components\modals\live-strimeng;

use Illuminate\View\Component;

class add-liveStrimeng extends Component
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
        return view('components.modals.live-strimeng.add-live-strimeng');
    }
}
