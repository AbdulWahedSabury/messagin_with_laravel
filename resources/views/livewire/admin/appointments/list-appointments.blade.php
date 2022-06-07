<div>
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
                <div class="d-flex justify-content-end mb-2">
                    <a href="{{route('admin.appointments.create')}}">
                        <button class="bt btn-primary">
                            <i class="fa fa-plus-circle"></i>
                            Add new Appointments
                        </button>
                    </a>
                </div>
              <div class="card">
                <div class="card-body">
                {{-- user table --}}
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Oprations</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <tr>
                            <th scope="row">{{$counter}}</th>
                            <td>Client Name</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td>
                                <a href=""">
                                    <i class="fa fa-edit mr-2"></i>
                                </a>
                                <a href="")">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                          </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                {{-- pagination --}}
                </div>
              </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
</div>
