<?php

namespace App\Http\Livewire\Admin\Users;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Hash;
use App\Http\Livewire\Admin\AdminAppointments\AdminAppointments;
class UsersLists extends AdminAppointments
{
    public $state = [];
    public $user;
    public $editeUserState = false;
    public $confirmationUserDeleteId;
    // Add new User
    public function AddNewUser()
    {
        $this->state = [];
        $this->editeUserState = false;
        $this->dispatchBrowserEvent('show-form');
    }
    // save user data
    public function createNewUser()
    {
        $data = Validator::make($this->state,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ])->validate();
        $data['password'] = Hash::make($data['password']);
        //hide the modal on view
        $this->dispatchBrowserEvent('hide-form',['message'=>'User added successfuly!']);
        // save data to DB
        User::create($data);
        return redirect()->back();
    }
    public function editUser(User $user)
    {
        $this->user = $user;
       $this->editeUserState = true;
       $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }
    //Save Changes
    public function SaveUsersChanges()
    {
        $data = Validator::make($this->state,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->user->id,
            'password'=>'sometimes|confirmed',
        ])->validate();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        //hide the modal on view
        $this->dispatchBrowserEvent('hide-form',['message'=>'User updated successfuly!']);
        // save data to DB
        $this->user->update($data);
    }
    //
    public function ConfirmationUserDelete($userId)
    {
        $this->confirmationUserDeleteId = $userId;
        $this->dispatchBrowserEvent('show-delete-form');
    }
    // DeleteUser
    public function DeleteUser()
    {
        $userToDelete = User::findOrFail($this->confirmationUserDeleteId);
        $userToDelete->delete();
        $this->dispatchBrowserEvent('hide-delete-form',['message'=>'User Deleted successfuly!']);
    }
    // render userList view
    public function render()
    {
        $users = User::latest()->paginate(5);
        return view('livewire.admin.users.users-lists',compact('users'))
        ->layout('admin.layouts.app');;
    }
}
