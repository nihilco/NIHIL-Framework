@component('activities.user-actions.user-action')

@slot('heading')
    {{ $user->username }} created thread "<a href="{{ $activity->resource->path() }}">{{ $activity->resource->title }}</a>".
@endslot

@slot('body')
  {{ $activity->resource->description }}
@endslot

@endcomponent