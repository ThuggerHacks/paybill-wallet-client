<?php

namespace App\View\Components;

use Illuminate\View\Component;

class transation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $data = [];
     public $walletId = 0;
    public function __construct($data,$wallet_id)
    {
        $this->data = $data;
        $this->wallet_id = $wallet_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.transation');
    }
}
