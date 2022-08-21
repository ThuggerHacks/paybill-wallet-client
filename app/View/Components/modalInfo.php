<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $name = false;
     public $number = false;
     public $email = false;

    public function __construct($nome,$numero,$email)
    {
        $this->nome = $nome;
        $this->numero = $numero;
        $this->email = $email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-info');
    }
}
