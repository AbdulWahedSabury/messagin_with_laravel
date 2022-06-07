<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
                    <button wire:click.prevent="AddNewUser"  class="bt btn-primary">
                        <i class="fa fa-plus-circle"></i>
                        Add new user
                    </button>
                </div>
              <div class="card">
                <div class="card-body">
                {{-- user table --}}
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Oprations</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$counter}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="" wire:click.prevent ="editUser({{$user}})">
                                    <i class="fa fa-edit mr-2"></i>
                                </a>
                                <a href="" wire:click.prevent = "ConfirmationUserDelete({{$user->id}})">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                          </tr>
                          <?php $counter += 1; ?>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    {{$users->links()}}
                </div>
              </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->

            <!-- Modal -->
        <div
        class="modal fade"
        id="form"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLongTitle"
        aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent = "
            @if ($editeUserState)
            SaveUsersChanges
            @else
            createNewUser
            @endif"  class="needs-validation">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">

                    @if ($editeUserState)
                        <span>Edit User</span>
                    @else
                    <span>Add new user</span>
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- Add new user form --}}
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                    type="text"
                    class="form-control
                    @error('name')
                    is-invalid
                    @enderror"
                    id="name" aria-describedby="emailHelp"
                    placeholder="Enter Full Name"
                    wire:model.defer = "state.name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email"></label>
                    <input type="email"
                    class="form-control
                    @error("email")
                        is-invalid
                    @enderror"
                    id="email"
                    placeholder="Email Address"
                    wire:model.defer = "state.email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}!
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                    type="password"
                    class="form-control
                    @error("password")
                    is-invalid
                    @enderror"
                    id="password"
                    placeholder="Password"
                    wire:model.defer = "state.password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input
                    type="password"
                    class="form-control"
                    id="password_confirmation"
                    placeholder="Confirm Password"
                    name="password_confirmation"
                    wire:model.defer = "state.password_confirmation">
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save pr-2"></i>
                    @if ($editeUserState)
                    Save Changes
                    @else
                    Save
                    @endif
                    </button>
                </div>

            </div>
        </form>

        </div>
        </div>





                    <!--Delete Modal -->
                    <div
                    class="modal fade"
                    id="deleteConfirmatinForm"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalLongTitle"
                    aria-hidden="true"
                    wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">

                                <span>Delete User</span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{-- Add new user form --}}
                        <div class="modal-body">
                            <h5>Are you shure that you want to delete this user?</h5>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                <button type="button" class="btn btn-danger"
                                wire:click.prevent = "DeleteUser"
                                ><i class="fa fa-save pr-2"></i>
                                    Delete User
                                </button>
                            </div>

                        </div>

                    </div>
                    </div>

</div>
