<?php

namespace App\Livewire\Backend\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\RoleForm;
use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public UserForm $form;
    public RoleForm $createRoleForm;

    public array $roles = [];
    public bool $showPassword = false;
    public ?string $role = null;
    public $dataRole = [];

    public string $title = 'Edit User';

    #[On('refresh')]
    public function mount(User $id)
    {

        $this->form->setForm($id);
        $this->dataRole = Role::get();
    }

    public function createRole()
    {
        $this->createRoleForm->validate();

        try {
            $role = $this->createRoleForm->store();

            $this->dispatch('sweet-alert', icon: 'success', title: 'Role berhasil dibuat');
            $this->dispatch('refresh');
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'Role gagal dibuat', text: $th->getMessage());
            $this->dispatch('refresh');
        }
    }

    public function getRoles($query = '')
{
    $roles = Role::pluck('name', 'id')->map(function ($name, $id) {
        return ['value' => $id, 'name' => $name];
    })->values()->toArray();

    return $roles;
}


    public function edit()
    {
        DB::beginTransaction();
        $this->form->role = $this->role;
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
        return view('livewire.backend.user.user-edit')->layout('layouts.app');
    }
}