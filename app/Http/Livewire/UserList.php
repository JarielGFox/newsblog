<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{

    public $users;

    protected $listeners = [
        'loadUsers'
    ];

    public function mount()
    {
        $this->loadUsers();
    }


    public function loadUsers()
    {
        $this->users = User::All();
    }

    public function edit($user_id)
    {
        $this->emitTo('user-form', 'loadUser', $user_id);
    }

    public function delete(User $user)
    {
        $user->delete();

        $this->loadUsers();
    }

    public function render()
    {
        return view('livewire.user-list');
    }
}
