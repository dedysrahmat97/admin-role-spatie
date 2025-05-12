<?php

namespace App\Livewire\Backend\User;

use App\Models\User;
use Livewire\Component;
use App\Livewire\Backend\User\UserTable;

class UserIndex extends Component
{
    public $title = 'Manajemen User';

    public function confirmDelete($get_id)
    {
        try {
            User::destroy($get_id);
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'data gagal di hapus', text: $th->getMessage());
        }
        $this->dispatch('refresh')->to(UserTable::class);
    }
    public function render()
    {
        return view('livewire.backend.user.user-index')->layout('layouts.app');
    }
}