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
                        <h5>Add New Appointment</h5>
                    </div>
                    <form>
                          <div class="form-group">
                           <div class="form-row">
                               <div class="col-lg-6">
                            <label class="my-1 mr-2" for="SelectClients">
                                <b>Clients</b>
                            </label>
                            <select class="custom-select my-1 mr-sm-2" id="SelectClients">
                              <option selected>Choose...</option>
                              @foreach ($users as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                              @endforeach
                            </select>
                             </div>
                           </div>
                          </div>
                          <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6">
                                    <label for="AppointmentDate">Apoointment Date</label>
                                    <div class="form-group">
                                        <div class="input-group date" id="AppointmentDate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#AppointmentDate"/>
                                            <div class="input-group-append" data-target="#AppointmentDate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <label for="AppointmentDate">Apoointment Time</label>
                                    <div class="form-group">
                                        <div class="input-group date" id="AppointmentTime" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#AppointmentTime"/>
                                            <div class="input-group-append" data-target="#AppointmentTime" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        <div class="form-group my-1 mr-2">
                                <label for="AppointmentNote">Note:</label>
                                <textarea class="form-control" id="AppointmentNote" rows="3"></textarea>
                        </div>
                          <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </div>
              </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
</div>
