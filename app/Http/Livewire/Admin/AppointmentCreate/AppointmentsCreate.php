<?php

namespace App\Http\Livewire\Admin\AppointmentCreate;

use Livewire\Component;
use App\Models\client;
use App\Models\appointments;
use Illuminate\Support\Facades\Validator;

class AppointmentsCreate extends Component
{
    public $state  = [];
    public function render()
    {
        $clients = client::get()->all();
        $this->state['status'] = "SCHEDULED";
        return view('livewire.admin.appointment-create.appointments-create',compact('clients'))->layout('admin.layouts.app');
    }
    public function CreateAppointments()
    {
        Validator::make(
			$this->state,
			[
				'client_id' => 'required',
				'date' => 'required',
				'time' => 'required',
				'note' => 'nullable',
				'status' => 'required|in:SCHEDULED,CLOSED',
			],
			[
				'client_id.required' => 'The client field is required.'
			])->validate();
        appointments::create($this->state);
        $this->dispatchBrowserEvent('Appointment-saved',['message'=>'Appointment added successfuly!']);
    }
}
