@if ($conversations->isNotEmpty())
  <div class="container" wire:poll>
    <div class="pt-2 row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users</h3>
          </div>
          <div class="card-body">
            <ul class="contacts-list">
              @foreach ($conversations as $conversation)
                <li class='{{ $conversation->id === $selectedConversation->id ? 'bg-primary' : '' }}'>
                  <a href="#" wire:click.prevent='messages({{ $conversation->id }})'>
                    <img class="contacts-list-img"
                      src="
                     @if ($conversation->sender->id === auth()->user()->id) {{ $conversation->receiver->avatar_url }}
                      @else
                    {{ $conversation->sender->avatar_url }} @endif"
                      alt="User Avatar">
                    <div class="contacts-list-info">
                      <span
                        class="contacts-list-name {{ $conversation->id === $selectedConversation->id ? 'text-white' : 'text-dark' }}">
                        @if ($conversation->sender->id === auth()->user()->id)
                          {{ $conversation->receiver->name }}
                        @else
                          {{ $conversation->sender->name }}
                        @endif
                        <small
                          class="float-right contacts-list-date {{ $conversation->id === $selectedConversation->id ? 'text-white' : 'text-muted' }}">
                          @if ($conversation->message->isNotEmpty())
                            {{ $conversation->message->last()->created_at->format('d/m/y') }}
                          @endif
                        </small>
                      </span>
                      <span
                        class="contacts-list-msg {{ $conversation->id === $selectedConversation->id ? 'text-white' : 'text-secondary' }}">
                        @if ($conversation->message->isNotEmpty())
                          {{ $conversation->message->last()->body }}
                        @endif
                      </span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
              @endforeach
              <!-- End Contact Item -->
            </ul>
          </div>
        </div>
      </div>



      <div class="col-md-8">
        <div class="card direct-chat direct-chat-primary">
          <div class="card-header">
            <h3 class="card-title">Chat with
              <span>
                @if ($selectedConversation->sender->id === auth()->user()->id)
                  {{ $selectedConversation->receiver->name }}
                @else
                  {{ $selectedConversation->sender->name }}
                @endif
              </span>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages" id="conversation">
              <!-- Message. Default to the left -->
              @foreach ($selectedConversation->message as $message)
                <div class="direct-chat-msg {{ $message->user_id === auth()->user()->id ? 'right' : '' }}">
                  <div class="clearfix direct-chat-infos">
                    <span
                      class="float-left direct-chat-name">{{ $message->user->id === auth()->user()->id ? 'You' : $message->user->name }}</span>
                    <span
                      class="float-right direct-chat-timestamp">{{ $message->created_at->format('d M H:i a') }}</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="{{ $message->user->avatar_url }}" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    {{ $message->body }}
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
              @endforeach
              <!-- /.direct-chat-msg -->
            </div>
            <!--/.direct-chat-messages-->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <form action="#" wire:submit.prevent='sendMessage'>
              <div class="input-group">
                <input type="text" wire:model.defer='messageBody' name="message" placeholder="Type Message ..."
                  class="form-control">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-primary">Send</button>
                </span>
              </div>
            </form>
          </div>
          <!-- /.card-footer-->
        </div>
      </div>
    </div>
  </div>
@else
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="text-center"> <img
          src="https://thumbs.dreamstime.com/z/young-hipster-mailbox-no-messages-green-lawn-bird-sitting-message-letter-waiting-sad-80769633.jpg"
          width="250" height="250" class="img-fluid my-4">
        <h3><strong>You do not have any messages yet.</strong></h3>
        <h4>Click the button below to select the users to chat with</h4>
        <a href="/admin/users" class="btn btn-primary m-3">Go to Users</a>
      </div>
    </div>
  </div>
@endif
