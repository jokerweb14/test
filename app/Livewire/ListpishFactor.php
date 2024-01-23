<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;


class ListpishFactor extends Component
{

    protected $listeners = [
        'refreshCart' => '$refresh'
    ];

    public function add($id, $f1, $n)
    {

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['id'] = $id;
            $cart[$id]['naka'] = $n;
            $cart[$id]['max_count'] = $f1;
            $cart[$id]['forosh1'] = $f1;
            $cart[$id]['count'] += 1;
        } else {
            $cart[$id] = [
                'id' => $id,
                'naka' => $n,
                'forosh1' => $f1,
                'count' => 1,
                'max_count' => 10,
            ];
        }
        session()->put('cart', $cart);

        $this->emit('refreshCart');
    }

    public function render()
    {

//        $db = new PDO('dblib:host=myhostname;dbname=mydbname', $username, $password);

        $products = DB::connection('sqlsrv')->table('KalaPrice')->get();


        return view('livewire.listpish-factor', compact('products'));
    }
}
