<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;

class ListUsers extends Component
{
    public function render()
    {
        return view('livewire.admin.users.list-users')
            ->layout('layouts.app');
           /*  ->slot('content'); */
    }
}
