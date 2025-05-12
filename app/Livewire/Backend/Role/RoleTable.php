<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleTable extends Component
{
    use WithPagination;
    
    #[On('refresh')]
    public function render()
    {
        $dataPeran = Role::with('users')->paginate(10);
        return view('livewire.backend.role.role-table', compact('dataPeran'));
    }
}