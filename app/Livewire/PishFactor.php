<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PishFactor extends Component
{
    public function render()
    {
        $total_price=0;
//        foreach(session('cart') as $product => $cart){
//
//            $total_price += ($product->forosh1) * $cart['count'];
//        }


        return view('livewire.pish-factor',compact('total_price'));
    }
}
