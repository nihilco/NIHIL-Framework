<?php
$followed = $resource->followed();
?>
<form method="POST" action="{{ ($followed) ? $followed->path() : '/follows' }}" class="form-inline" style="display:inline-block;">
  {{ csrf_field() }}
@if($followed)
  <input type="hidden" name="_method" value="Delete">    
@else
  <input type="hidden" name="resource_id" value="{{ $resource->id }}">
  <input type="hidden" name="resource_type" value="{{ get_class($resource) }}">
@endif
  <button type="submit" class="btn btn-sm btn-{{ ($followed) ? 'primary' : 'secondary' }}"><i class="fa fa-bell{{ ($followed) ? '' : '-o' }}" aria-hidden="true"></i></button>
</form>