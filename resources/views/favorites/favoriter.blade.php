<?php
$favorited = $resource->favorited();
?>
<form method="POST" action="{{ ($favorited) ? $favorited->path() : '/favorites' }}" class="form-inline" style="display:inline-block;">
  {{ csrf_field() }}
@if($favorited)
  <input type="hidden" name="_method" value="DELETE">
@else
  <input type="hidden" name="resource_id" value="{{ $resource->id }}">
  <input type="hidden" name="resource_type" value="{{ get_class($resource) }}">
@endif
  <button type="submit" class="btn btn-sm btn-{{ ($favorited) ? 'primary' : 'secondary' }}"><i class="fa fa-star{{ ($favorited) ? '' : '-o' }}" aria-hidden="true"></i></button>
</form>