<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboare</li>
                <li class="breadcrumb-item active">Appointments</li>
                <li class="breadcrumb-item"><a href="#">Create</a></li>

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
                <div class="d-flex justify-content-end mb-2">
                </div>
              <div class="card">
                <div class="card-body">
                    <div class="title">
                        <h5>Update Appointment</h5>
                    </div>
                    <form wire:submit.prevent ="UpateAppointments" id="AddAppointment">
                          <div class="form-group">
                           <div class="form-row">
                               <div class="col-lg-6">
                                <label for="client">Client:</label>
                                <select wire:model.defer="state.client_id" class="form-control @error('client_id') is-invalid @enderror">
                                    <option value="">Select Client</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                             </div>
                           </div>
                          </div>
                          <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointmentDate">Appointment Date</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <x-datepicker wire:model.defer="state.date" id="appointmentDate" :error="'date'" />
                                            @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointmentTime">Appointment Time</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <x-timepicker wire:model.defer="state.time" id="appointmentTime" :error="'time'" />
                                            @error('time')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        <div wire:ignore class="form-group my-1 mr-2">
                                <label for="note">Note:</label>
                                <textarea id="note" wire:model.defer='state.text' data-note="@this" class="form-control" rows="3">
                                    {!! $state['text'] !!}
                                </textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client">Status:</label>
                                    <select wire:model.defer="state.status" class="form-control @error('status') is-invalid @enderror">
                                        <option value=" {!! $state['status'] !!}"> {!! $state['status'] !!}</option>
                                        <option value="SCHEDULED">Scheduled</option>
                                        <option value="CLOSED">Closed</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submitBtn">
                        <button id="save" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                      </form>
                </div>
              </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
      @push('js')
      <script>
        $(document).ready(function(){
        ClassicEditor
            .create( document.querySelector('#note' ) )
            .then( editor => {
                document.querySelector('#save').addEventListener('click',()=>{
                let note = $('#note').data('note');
                eval(note).set('state.text',editor.getData());
            });
            })
            .catch( error => {
                    console.error( error );
            } );
    })
      </script>
      @endpush
</div>
