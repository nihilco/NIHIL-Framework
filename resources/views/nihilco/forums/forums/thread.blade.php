        <tr>
          <th scope="row"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></th>
          <td><a href="#">{{ $thread->user->name }}</a></td>
          <td>{{ $thread->replies->count() }}</td>
          <td>{{ $thread->updated_at->diffForHumans()  }}</td>
        </tr>