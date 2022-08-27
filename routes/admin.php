<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Users\UsersLists;
use App\Http\Livewire\Admin\Profile\ProfileUpdate;
use App\Http\Livewire\Admin\Setting\SettingUpdate;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\ConversationsAndMessagesList;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\UpdateAppointmentForm;
use App\Http\Livewire\Admin\appointmentCreate\AppointmentsCreate;



    Route::get('dashboard',DashboardController::class)->name('admin.dashboard');
    Route::get('users',UsersLists::class)->name('admin.users');
    Route::get('messages',ConversationsAndMessagesList::class)->name('admin.messages');
    Route::get('appointments',ListAppointments::class)->name('admin.appointments');
    Route::get('appointments/create',AppointmentsCreate::class)->name('admin.appointments.create');
    Route::get('appointments/{appointment}/edit',UpdateAppointmentForm::class)->name('admin.appointments.edit');
    Route::get('profile/edit',ProfileUpdate::class)->name('admin.profile.edit');
    Route::get('site/setting',SettingUpdate::class)->name('admin.site.setting');



?>
