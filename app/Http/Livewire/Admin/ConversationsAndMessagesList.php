<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Models\conversations;
use App\Models\Models\messages;
use Illuminate\Support\Facades\Auth;

class ConversationsAndMessagesList extends Component
{
    public $selectedConversation;
    public $messageBody;
    public function mount()
    {
        if(session('selectedConversation')){
            $this->selectedConversation = session('selectedConversation');
        }else{
        $this->selectedConversation = conversations::query()
        ->where('receiver_id',auth::user()->id)
        ->OrWhere('sender_id',auth::user()->id)
        ->with('message')
        ->first();
    }
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
    public function sendMessage()
    {
        messages::create([
            'conversation_id' => $this->selectedConversation->id,
            'user_id' => auth()->user()->id,
            'body' => $this->messageBody
        ]);
        $this->reset('messageBody');
        $this->messages($this->selectedConversation->id);
    }
}
