        <tr>
          <th>{{ $reply->updated_at->diffForHumans()  }} by <a href="#">{{ $reply->user->name }}</a></th>
        </tr>
        <tr>
          <td>{{ $reply->body }}</td>
        </tr>