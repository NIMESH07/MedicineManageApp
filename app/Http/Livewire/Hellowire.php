<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Medicine;

class Hellowire extends Component
{

    public $search = '';
    public function render()
    {

        return view('livewire.hellowire',[
            'meds' => Medicine::where('name',"like", "%".$this->search."%")->take(10)->get(),
        ]);
    }
}
