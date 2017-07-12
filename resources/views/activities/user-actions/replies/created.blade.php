@component('activities.user-actions.user-action')

@slot('heading')
  {{ $user->username }} replied to thread "<a href="{{ $activity->resource->resource->path() }}">{{ $activity->resource->resource->title }}</a>".
@endslot

@slot('body')
  {{ $activity->resource->content }}
@endslot

@endcomponent