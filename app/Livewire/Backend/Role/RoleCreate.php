<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\RoleForm;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Livewire\Forms\PermissionForm;
use Spatie\Permission\Models\Permission;

class RoleCreate extends Component
{
    public RoleForm $form;
    public PermissionForm $createPermissionForm;
    public string $title = 'Buat Peran';

    public $cardPermissions = false;
    public $dataPermissions = [];

    public function save()
    {
        $this->form->validate();

        DB::beginTransaction();

        try {
            $user = $this->form->store();
            $this->dispatch('sweet-alert', icon: 'success', title: 'Data berhasil disimpan');
            DB::commit();
            
            // Redirect or reset form
            $this->dispatch('sweet-alert', icon: 'success', title: 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'Data gagal disimpan', text: $th->getMessage());
        }
    }

    #[On('refresh-permission')]
    public function openCardPermissions()
    {
        $this->cardPermissions = true;

        $this->dataPermissions = Permission::get();
    }

    public function createPermissions()
    {
        $this->createPermissionForm->validate();
        try {
            $permission = $this->createPermissionForm->store();
            
            $this->createPermissionForm->reset();
            $this->dispatch('sweet-alert', icon: 'success', title: 'Permission berhasil dibuat');
            $this->dispatch('refresh');
            $this->dispatch('refresh-permission');
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'Role gagal dibuat', text: $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.role.role-create')->layout('layouts.app');
    }
}