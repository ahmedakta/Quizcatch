<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class Counter extends Component
{
    public $count = 0;
    public $print= "ahmed";
    public function increment(Request $request)
    {
        // dd($request->all());
        $this->count++;
    }
    public function print()
    {
        // return $this->print;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
