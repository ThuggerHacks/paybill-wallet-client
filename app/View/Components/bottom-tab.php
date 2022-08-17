<?php

namespace App\View\Components;

use Illuminate\View\Component;

class bottomTab extends Component
{
    public $user = true;
    public $config = false;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user,$config)
    {
        $this->user = $user;
        $this->config = $config;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bottom-tab');
    }
}
