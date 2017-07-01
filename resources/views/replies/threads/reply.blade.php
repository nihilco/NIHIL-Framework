    <div class="card">
      <div class="card-header">
        <a href="#">{{ $reply->user->name }}</a>
        said
        {{ $reply->created_at->diffForHumans() }}
      </div>
      <div class="card-block">
      {{ $reply->body }}
      </div>
    </div>