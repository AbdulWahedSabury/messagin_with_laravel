<div>
    <x-page_on_loading />
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Appointments</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Appointments</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between mb-2">
                    <a href="{{route('admin.appointments.create')}}">
                        <button class="bt btn-primary">
                            <i class="fa fa-plus-circle"></i>
                            Add new Appointments
                        </button>
                    </a>
                    @if ($selectedRows)
                    <div class="btn-group ml-2">
                        <button type="button" class="btn btn-default">Bulk Actions</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#">Delete Selected</a>
                            <a wire:click.prevent="markAllAsScheduled" class="dropdown-item" href="#">Mark as Scheduled</a>
                            <a wire:click.prevent="markAllAsClosed" class="dropdown-item" href="#">Mark as Closed</a>
                            <a wire:click.prevent="export" class="dropdown-item" href="#">Export</a>
                        </div>
                    </div>

                    <span class="ml-2">selected {{ count($selectedRows) }} {{ Str::plural('appointment', count($selectedRows)) }}</span>
                    @endif


                    <div class="btn-group">
                        <button wire:click="filterAppointmentsByStatus" type="button" class="btn {{ is_null($status) ? 'btn-secondary' : 'btn-default' }}">
                            <span class="mr-1">All</span>
                            <span class="badge badge-pill badge-info">{{ $appointmentsCount }}</span>
                        </button>

                        <button wire:click="filterAppointmentsByStatus('scheduled')" type="button" class="btn {{ ($status === 'scheduled') ? 'btn-secondary' : 'btn-default' }}">
                            <span class="mr-1">Scheduled</span>
                            <span class="badge badge-pill badge-primary">{{ $scheduledAppointmentsCount }}</span>
                        </button>

                        <button wire:click="filterAppointmentsByStatus('closed')" type="button" class="btn {{ ($status === 'closed') ? 'btn-secondary' : 'btn-default' }}">
                            <span class="mr-1">Closed</span>
                            <span class="badge badge-pill badge-success">{{ $closedAppointmentsCount }}</span>
                        </button>
                    </div>
                </div>
              <div class="card">
                <div class="card-body">
                {{-- user table --}}
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>
                            <div class="icheck-primary d-inline ml-2">
                                <input wire:model="selectPageRows" type="checkbox" value="" name="todo2" id="todoCheck2">
                                <label for="todoCheck2"></label>
                            </div>
                        </th>
                        <th scope="col">Number</th>
                        <th scope="col">Appointments</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Oprations</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                        <tr>
                            <th style="width: 10px;">
                                <div class="icheck-primary d-inline">
                                    <input wire:model="selectedRows" type="checkbox" value="{{ $appointment->id }}" name="todo2" id="{{ $appointment->id }}">
                                    <label for="{{ $appointment->id }}"></label>
                                </div>
                            </th>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$appointment->client->name }}</td>
                            <td>{{ $appointment->date}}</td>
                            <td>{{ $appointment->time}}</td>
                            <td>
                                <span class="badge badge-{{ $appointment->getStatusState() }}">
                                    {{ $appointment->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{route('admin.appointments.edit',$appointment)}}">
                                    <i class="fa fa-edit mr-2"></i>
                                </a>
                                <a href="">
                                    <i wire:click.prevent='ConfirmationDeleteAppoinment({{ $appointment->id }})' class="fa fa-trash"></i>
                                </a>
                            </td>
                          </tr>
                          @endforeach

                    </tbody>
                  </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                {{ $appointments->links() }}
                </div>
              </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
</div>
