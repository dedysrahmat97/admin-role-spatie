<?php

namespace App\Livewire\Backend\User;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\RoleForm;
use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public UserForm $form;
    public RoleForm $createRoleForm;
    public string $title = 'Buat User';

    public bool $showPassword = false;


    public function getRoles($query = '')
    {
        return Role::select('id', 'name')
            ->where('name', 'like', '%'.$query.'%')
            ->get()
            ->map(function ($role) {
                return [
                    'id' => $role->id,
                    'name' => $role->name,
                ];
            })
            ->toArray();
    }

    public function save()
    {
        // $this->validate();

        DB::beginTransaction();

        try {
            $user = $this->form->store();
            
            $this->dispatch('sweet-alert', icon: 'success', title: 'Data berhasil disimpan');
            DB::commit();
            
            // Redirect or reset form
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'Data gagal disimpan', text: $th->getMessage());
        }
    }

    public function createRole()
    {
        $this->createRoleForm->validate();

        try {
            $role = $this->createRoleForm->store();
            
            $this->dispatch('set-role-create', data: [
                'id' => $role->id,
                'name' => $role->name
            ]);
            
            $this->createRoleForm->reset();
            $this->dispatch('refresh');
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'Role gagal dibuat', text: $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.user.user-create')->layout('layouts.app');
    }
}