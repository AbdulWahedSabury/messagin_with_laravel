<?php

namespace App\Http\Livewire\Admin\Appointments;
use App\Http\Livewire\Admin\AdminAppointments\AdminAppointments;
use App\Models\appointments;
class ListAppointments extends AdminAppointments
{
    public $appointmentIdToDelete;
    protected $listeners = ['deleteConfirmed'=>'DeleteAppoinment'];
    public $status = null;
    public $selectedRows = [];
	public $selectPageRows = false;
    public function filterAppointmentsByStatus($status = null)
    {
        $this->status = $status;
        $this->resetPage();
    }
    public function render()
    {
        $appointmentsCount = appointments::count();
        $scheduledAppointmentsCount = appointments::where('status','SCHEDULED')->count();
        $closedAppointmentsCount = appointments::where('status','CLOSED')->count();

        $appointments = appointments::
        when($this->status,function($query,$status){
            return $query->where('status',$status);
        })->
        latest()->paginate(5);

        return view('livewire.admin.appointments.list-appointments',
        ['appointments'=>$appointments,
        'appointmentsCount'=>$appointmentsCount,
        'scheduledAppointmentsCount'=>$scheduledAppointmentsCount,
        'closedAppointmentsCount' => $closedAppointmentsCount])
        ->layout('admin.layouts.app');
    }
    public function ConfirmationDeleteAppoinment($Id)
    {
        $this->appointmentIdToDelete = $Id;
        $this->dispatchBrowserEvent('Appointment-delete');
    }
    public function DeleteAppoinment()
    {

        $app = appointments::findOrFail($this->appointmentIdToDelete);
        $app->delete();
        $this->dispatchBrowserEvent('Appointment-saved',['message'=>'Appointment Deleted successfuly!']);
    }



        public function updatedSelectPageRows($value)
        {
            if ($value) {
                $this->selectedRows = $this->appointments->pluck('id')->map(function ($id) {
                    return (string) $id;
                });
            } else {
                $this->reset(['selectedRows', 'selectPageRows']);
            }
        }

        public function getAppointmentsProperty()
        {
            return appointments::with('client')
                ->when($this->status, function ($query, $status) {
                    return $query->where('status', $status);
                })
                // ->orderBy('order_position', 'asc')
                ->paginate(10);
        }

        public function markAllAsScheduled()
        {
            appointments::whereIn('id', $this->selectedRows)->update(['status' => 'SCHEDULED']);

            $this->dispatchBrowserEvent('Appointment-saved', ['message' => 'Appointments marked as scheduled']);

            $this->reset(['selectPageRows', 'selectedRows']);
        }

        public function markAllAsClosed()
        {
            appointments::whereIn('id', $this->selectedRows)->update(['status' => 'CLOSED']);

            $this->dispatchBrowserEvent('Appointment-saved', ['message' => 'Appointments marked as closed.']);

            $this->reset(['selectPageRows', 'selectedRows']);
        }

        public function deleteSelectedRows()
        {
            appointments::whereIn('id', $this->selectedRows)->delete();

            $this->dispatchBrowserEvent('Appointment-saved', ['updated' => 'All selected appointment got deleted.']);

            $this->reset(['selectPageRows', 'selectedRows']);
        }
}
