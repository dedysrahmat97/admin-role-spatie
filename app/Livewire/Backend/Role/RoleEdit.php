<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\RoleForm;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Livewire\Forms\PermissionForm;
use Spatie\Permission\Models\Permission;

class RoleEdit extends Component
{
    public RoleForm $form;
    public PermissionForm $createPermissionForm;
    public string $title = 'Edit Peran';

    public $dataPermissions = [];
    public $cardPermissions = false;


    public function mount(Role $id)
    {

        $this->form->setForm($id);
        $this->dataRole = Role::get();
        if ($id->permissions) {
            $this->cardPermissions = true;
            $this->dataPermissions = Permission::get();
        } 
    }

    public function createPermissions()
    {
        $this->createPermissionForm->validate();

        try {
            $role = $this->createPermissionForm->store();

            $this->dispatch('sweet-alert', icon: 'success', title: 'Permission berhasil dibuat');
            $this->dispatch('refresh-permission');
            $this->dispatch('refresh');
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'Permission gagal dibuat', text: $th->getMessage());
            $this->dispatch('refresh');
        }
    }

    #[On('refresh-permission')]
    public function openCardPermissions()
    {
        $this->cardPermissions = true;

        $this->dataPermissions = Permission::get();
    }


    public function edit()
    {
        DB::beginTransaction();
        try {
            $simpan = $this->form->update();
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil diupdate');
            DB::commit();
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'data gagal di hapus', text: $th->getMessage());
            DB::rollback();
        }

    }

    public function render()
    {
        return view('livewire.backend.role.role-edit')->layout('layouts.app');
    }
}