<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Models\client;
use App\Models\appointments;
use Illuminate\Support\Facades\Validator;
class UpdateAppointmentForm extends Component
{
    public $state ='';
    public $appointment;

    public function mount(appointments $appointment)
    {
        $this->state = $appointment->toArray();
        $this->appointment = $appointment;
    }
    public function render()
    {
        $clients = client::get()->all();
        return view('livewire.admin.appointments.update-appointment-form',compact('clients'))->layout('admin.layouts.app');;
    }
    public function UpateAppointments()
    {
        $state = Validator::make(
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

            $this->appointment->update($state);
            $this->dispatchBrowserEvent('Appointment-saved',['message'=>'Appointment Updated successfuly!']);

    }
}
