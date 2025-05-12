<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Livewire\Backend\Role\RoleTable;

class RoleIndex extends Component
{
    public $title = 'Manajemen Peran';

    public function confirmDelete($get_id)
    {
        try {
            Role::destroy($get_id);
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'data gagal di hapus', text: $th->getMessage());
        }
        $this->dispatch('refresh')->to(RoleTable::class);
    }
    public function render()
    {
        return view('livewire.backend.role.role-index')->layout('layouts.app');
    }
}