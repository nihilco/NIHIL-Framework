        <tr>
          <td scope="row"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></td>
          <td><a href="{{ $thread->forum->path() }}">{{ $thread->forum->title }}</a></td>
          <td><a href="/forums/profiles/{{ $thread->user->username }}">{{ $thread->user->name }}</a></td>
          <td>{{ $thread->replies_count }}</td>
          <td>{{ $thread->updated_at->diffForHumans()  }}</td>
          <td>

<form method="POST" action="/votes" class="form-inline" style="display:inline-block;">
          {{ csrf_field() }}
          <input type="hidden" name="resource_id" value="{{ $thread->id }}">
          <input type="hidden" name="resource_type" value="{{ get_class($thread) }}">
                                                                            {{ $thread->votesDownCount() }}
<div class="btn-group" role="group" aria-label="Basic example">
                                                                                <button type="{{ $thread->hasVoteDown() ? 'button' : 'submit' }}" name="vote" value="down" class="btn btn-sm btn-primary{{ $thread->hasVoteDown() ? ' active' : '' }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
               <button type="{{ $thread->hasVoteUp() ? 'button' : 'submit' }}" name="vote" value="up" class="btn btn-sm btn-primary{{$thread->hasVoteUp() ? ' active' : '' }}"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
             </div>
{{ $thread->votesUpCount() }}
</form>

@can ('delete', $thread)
             <form action="{{ $thread->path() }}" method="POST" style="display:inline-block;">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <button class="btn btn-sm btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
             </form>
@endcan
          </td>
        </tr>