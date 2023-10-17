<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    protected $listeners = ['deleteUser'];

    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user->role == 1){
            $cliente = Cliente::find($user->cliente->id);
            $cliente->delete();
        }
        $user->delete();
    }

    public function render()
    {
        $users = User::paginate(18);
        return view('livewire.show-users',[
            'users' => $users
        ]);
    }
}
