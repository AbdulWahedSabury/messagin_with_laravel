<?php

namespace App\Http\Livewire\Admin\Appointments;
use App\Http\Livewire\Admin\AdminAppointments\AdminAppointments;
class ListAppointments extends AdminAppointments
{
    public function render()
    {
        return view('livewire.admin.appointments.list-appointments')->layout('admin.layouts.app');
    }
}
