<?php

namespace App\Livewire\Backend\Dashboard;

use Livewire\Component;

class DashboardIndex extends Component
{
    public $title = 'Dashboard';
    public function render()
    {
        return view('livewire.backend.dashboard.dashboard-index')->layout('layouts.app');
    }
}