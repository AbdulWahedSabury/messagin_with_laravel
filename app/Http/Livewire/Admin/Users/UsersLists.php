<?php

namespace App\Http\Livewire\Admin\Users;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Hash;
use Livewire\withFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\AdminAppointments\AdminAppointments;
use Illuminate\Validation\Rule;
class UsersLists extends AdminAppointments
{
    public $state = [];
    public $user;
    public $editeUserState = false;
    public $confirmationUserDeleteId;
    public $searchTerm = null;
    public $photo;
    use withFileUploads;
    // Add new User
    public function AddNewUser()
    {
        $this->reset();
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

        if($this->photo){
            $data['avatar'] = $this->photo->store('/','avatars');
        }
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
        if($this->photo){
            Storage::disk('avatars')->delete($this->user->avatar);
            $data['avatar'] = $this->photo->store('/','avatars');
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
        $users = User::query()
        ->where('name','like','%'.$this->searchTerm.'%')
        ->orWhere('email','like','%'.$this->searchTerm.'%')
        ->latest()->paginate(5);
        return view('livewire.admin.users.users-lists',compact('users'))
        ->layout('admin.layouts.app');;
    }
    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function changeRole(User $user, $role)
	{
		Validator::make(['role' => $role], [
			'role' => [
				'required',
				Rule::in('admin', 'user '),
			],
		])->validate();

		$user->update(['role' => $role]);

		$this->dispatchBrowserEvent('role_changed', ['message' => "Role changed to {$role} successfully."]);
	}
}
