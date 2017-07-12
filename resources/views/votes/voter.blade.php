<?php
$vote = null;
$voteDown = false;
$voteUp = false;
if(!Auth::guest()) {
  $vote = auth()->user()->hasVoteForResource($resource);
}
if($vote) {
    if($vote->vote == 'up') {
        $voteUp = true;
    } elseif($vote->vote == 'down') {
        $voteDown = true;
    }
}
?>

          <form method="POST" action="{{ ($vote) ? $vote->path() : '/votes' }}" class="form-inline" style="display:inline-block;">
            {{ csrf_field() }}
            @if(!$vote)
            <input type="hidden" name="resource_id" value="{{ $resource->id }}">
            <input type="hidden" name="resource_type" value="{{ get_class($resource) }}">
            @else
            <input type="hidden" name="_method" value="PATCH">    
            @endif

           <div class="input-group input-group-sm">
             <span class="input-group-addon">
            {{ $resource->votesDownCount() }}
             </span>
             <span class="input-group-btn">
            <button type="submit" name="vote" value="down" class="btn btn-primary{{ ($voteDown) ? ' active' : '' }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
             </span>
             <span class="input-group-btn">
            <button type="submit" name="vote" value="up" class="btn btn-primary{{ ($voteUp) ? ' active' : '' }}"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
             </span>
             <span class="input-group-addon">
{{ $resource->votesUpCount() }}
             </span>
           </div>
</form>