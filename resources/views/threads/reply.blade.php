        <tr>
          <th>{{ $reply->updated_at->diffForHumans()  }} by <a href="/forums/profiles/{{ $reply->user->username }}">{{ $reply->user->name }}</a></th>
<th class="text-right">
<form method="POST" action="{{ $reply->path() . '/vote' }}" class="form-inline" style="display:inline-block;">
          {{ csrf_field() }}
                                                                            {{ $reply->votesDownCount() }}
<div class="btn-group" role="group" aria-label="Basic example">
                                                                                <button type="submit" name="vote" value="down" class="btn btn-sm btn-primary{{ $reply->hasVoteDown() ? ' active' : '' }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
               <button type="submit" name="vote" value="up" class="btn btn-sm btn-primary{{$reply->hasVoteUp() ? ' active' : '' }}"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
             </div>
{{ $reply->votesUpCount() }}
</form>

@can('update', $reply)

             <form action="{{ $reply->path() }}" method="POST" style="display:inline-block">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <button class="btn btn-sm btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
             </form>
@endcan
                   
</th>
        </tr>
        <tr>
          <td colspan="2">{{ $reply->content }}</td>
        </tr>