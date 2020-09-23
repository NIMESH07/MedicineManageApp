<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Coustomers;

class Coustomerselect extends Component
{

    public $search = '';
    public function render()
    {

        return view('livewire.coustomerselect', [
            'users' => Coustomers::where('name', "like", "%" . $this->search . "%")->take(7)->get(),
        ]);
    }
}
