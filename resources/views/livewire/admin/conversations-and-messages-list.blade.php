<div class="container">
  <div class="pt-2 row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>
        </div>
        <div class="card-body">
          <ul class="contacts-list">
            @foreach ($conversations as $conversation)
              <li>
                <a href="#" wire:click.prevent='messages({{ $conversation->id }})'>
                  <img class="contacts-list-img" src="{{ $conversation->sender->avatar_url }}" alt="User Avatar">
                  <div class="contacts-list-info">
                    <span class="contacts-list-name text-dark">
                      {{ $conversation->sender->name }}
                      <small class="float-right contacts-list-date text-muted">
                        {{ $conversation->message->last()->created_at->format('y/m/d') }}
                      </small>
                    </span>
                    <span class="contacts-list-msg text-secondary">
                      {{ $conversation->message->last()->body }}
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
              {{ $selectedConversation->sender->name }}
            </span>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages" id="conversation">
            <!-- Message. Default to the left -->
            <div class="direct-chat-msg right">
              <div class="clearfix direct-chat-infos">
                <span class="float-left direct-chat-name">You</span>
                <span class="float-right direct-chat-timestamp">16 Nov 11:52 pm</span>
              </div>
              <!-- /.direct-chat-infos -->
              <img class="direct-chat-img" src="{{ auth()->user()->avatar_url }}" alt="message user image">
              <!-- /.direct-chat-img -->
              <div class="direct-chat-text">
                Hi
              </div>
              <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
          </div>
          <!--/.direct-chat-messages-->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <form action="#">
            <div class="input-group">
              <input type="text" name="message" placeholder="Type Message ..." class="form-control">
              <span class="input-group-append">
                <button type="button" class="btn btn-primary">Send</button>
              </span>
            </div>
          </form>
        </div>
        <!-- /.card-footer-->
      </div>
    </div>
  </div>
</div>
