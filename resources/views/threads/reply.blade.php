  <div class="row">
    <div class="col">
      <div class="card" id="reply-{{ $reply->id }}">
        <div class="card-header">
          <div class="row">
       <div class="col">
          {{ $reply->updated_at->diffForHumans()  }} by <a href="/users/{{ $reply->user->username }}">{{ $reply->user->name }}</a>
</div>
<div class="col text-right">
    @if(!Auth::guest())
       @include('votes.voter', ['resource' => $reply])
    @endif                   
</div>
</div>

        </div>
        <div class="card-block">
         {{ $reply->content }}
        </div>
        <div class="card-footer text-muted">
              @can('delete', $reply)

             <form action="{{ $reply->path() }}" method="POST" style="display:inline-block">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <button class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
             </form>
@endcan
                   @can('update', $reply)
             <a href="{{ $reply->path() . '/edit' }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                   @endcan
        </div>
      </div>
    </div>
  </div>