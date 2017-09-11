@component('activities.user-actions.user-action')

@slot('heading')
  {{ $user->username }} replied to
      @if($activity->resource)
          thread "<a href="{{ $activity->resource->resource->path() }}">{{ $activity->resource->resource->title }}</a>".
              @else
                  a resource.
                      @endif
@endslot

@slot('body')
                      @if($activity->resource)
  {{ $activity->resource->content }}
@endif
@endslot

@endcomponent