        <tr>
          <th scope="row"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></th>
          <td><a href="/forums/profiles/{{ $thread->user->username }}">{{ $thread->user->name }}</a></td>
          <td>{{ $thread->replies_count }}</td>
          <td>{{ $thread->updated_at->diffForHumans()  }}</td>
          <td>

@if(!Auth::guest())
    @include('votes.voter', ['resource' => $thread])
    @endif

@can ('update', $thread)
             <form action="{{ $thread->path() }}" method="POST" style="display:inline-block;">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <button class="btn btn-sm btn-danger" style="margin-top:-3px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
             </form>
@endcan

          </td>
        </tr>