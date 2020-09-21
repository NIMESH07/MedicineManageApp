<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Coustomers;
use Livewire\Livewire;

class Usersearch extends Component
{
    public $search = '';
    public function render()
    {
        if($this->search=='')
        {
            return view('livewire.usersearch',['users'=>Coustomers::where('name',"like",$this->search)->get(),]);
        }
        return view('livewire.usersearch',[
            'users' => Coustomers::where('name',"like", "%".$this->search."%")->take(7)->get(),
        ]);
    }
}
