@component('activities.user-actions.user-action')

@slot('heading')
  {{ $user->username }} voted on
      @if($activity->resource)
      "<a href="{{ $activity->resource->resource->path() }}">
@if($activity->resource->resource_type == 'App\Models\Thread') 
{{ $activity->resource->resource->title }}
@elseif($activity->resource->resource_type == 'App\Models\Reply')
a reply to thread {{ $activity->resource->resource->resource->title }}
@else
a resource
@endif
</a>".
          @else
              something.
          @endif
@endslot

@slot('body')

@endslot

@endcomponent