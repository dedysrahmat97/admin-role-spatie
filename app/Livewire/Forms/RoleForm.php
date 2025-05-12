<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Rule;

class RoleForm extends Form
{
    public ?Role $role;

    public $id;

    #[Rule('required|min:3', as: 'Name')]
    public $name;

    #[Rule('nullable', as: 'Permissions')]
    public $permissions = [];

    public function setForm(Role $role)
    {
        $this->role = $role;

        $this->name = $role->name;
        $this->permissions = $role->permissions->pluck('name')->toArray();
    }

    public function store()
    {
        $role = Role::create(['name' => $this->name]);
        
        if ($this->permissions) {
            $role->syncPermissions($this->permissions);
        }
        return $role;

    }

    public function update()
    {
        $this->role->update(['name' => $this->name]);
        $this->role->syncPermissions($this->permissions);
    }
}