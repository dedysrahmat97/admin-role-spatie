<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Rule;

class UserForm extends Form
{
    public ?User $user;

    public $id;

    #[Rule('required|min:3', as: 'Name')]
    public $name;

    #[Rule('required|email', as: 'Email')]
    public $email;

    #[Rule('nullable|min:8', as: 'Password')]
    public $password;

    #[Rule('required|array', as: 'Roles')]
    public $roles = [];

    public function setForm(User $user)
    {
        $this->user = $user;
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->roles = $user->roles->pluck('name')->toArray();;
    }

    public function store()
    {
        $user = User::create($this->except('user'));
        if ($this->roles) {
            $user->assignRole($this->roles);
        }
    }

    public function update()
    {
        $data = $this->except('user', 'roles');
        
        // Hanya update password jika diisi
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $this->user->update($data);
        $this->user->syncRoles($this->roles);
    }
}