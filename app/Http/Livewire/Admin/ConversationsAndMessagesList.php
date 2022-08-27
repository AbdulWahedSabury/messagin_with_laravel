<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Models\conversations;
use Illuminate\Support\Facades\Auth;

class ConversationsAndMessagesList extends Component
{
    public $selectedConversation;
    public function mount()
    {
        $this->selectedConversation = conversations::query()
        ->where('receiver_id',auth::user()->id)
        ->OrWhere('sender_id',auth::user()->id)
        ->with('message')
        ->first();
    }

    public function render()
    {
        $conversations = conversations::query()
        ->where('receiver_id',auth::user()->id)
        ->OrWhere('sender_id',auth::user()->id)
        ->with('message')
        ->get();
        return view('livewire.admin.conversations-and-messages-list'
        ,['conversations'=>$conversations])
        ->layout('admin.layouts.app');
    }
    public function messages($conversation_id)
    {
        $this->selectedConversation = conversations::findOrFail($conversation_id) ;
    }
}
