<?php

namespace App\Http\Livewire\Admin\AppointmentCreate;

use Livewire\Component;
use App\Models\User;

class AppointmentsCreate extends Component
{
    public function render()
    {
        $users = User::get()->all();
        return view('livewire.admin.appointment-create.appointments-create',compact('users'))->layout('admin.layouts.app');
    }
}
