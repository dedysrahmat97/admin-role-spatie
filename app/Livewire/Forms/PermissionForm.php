<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Permission;

class PermissionForm extends Form
{
    public ?Permission $permission = null;

    public $id;

    #[Rule('required', as: 'Name')]
    public $name;

    #[Rule('nullable', as: 'Roles')]
    public $roles = [];

    public function setForm(Permission $permission)
    {
        $this->permission = $permission;

        $this->name = $permission->name;
        $this->roles = $permission->roles->pluck('name')->toArray();
    }

    public function store()
    {
        $permission = Permission::create(['name' => $this->name]);

        if ($this->roles) {
            $permission->assignRole($this->roles);
        }

        return $permission;
    }

    public function update()
    {
        $this->permission->update(['name' => $this->name]);
        $this->permission->syncRoles($this->roles);
    }
}