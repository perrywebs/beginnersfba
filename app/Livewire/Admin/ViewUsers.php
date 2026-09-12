<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class ViewUsers extends Component
{
    public $users;

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        session()->flash('success', 'Account deleted successfully');
                
        $this->reset();

        return redirect()->route('admin_dashboard')->with('wire:navigate', true);
    }

    public function render()
    {
        return view('livewire.admin.view-users');
    }
}
