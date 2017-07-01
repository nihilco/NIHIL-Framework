<?php

namespace NIHILCo\Forums\Models;

trait CanVote
{
    public static function bootCanVote()
    {
        static::deleting(function ($resource) {
            $resource->votes()->delete();
        });
    }
    
    public function votes()
    {
        return $this->morphMany(Vote::class, 'resource');

            //            ->withCount([
            //            'votes AS votes_up' => function ($query) {
            //                $query->where('vote', Vote::VOTE_UP);
            //            },
            //            'votes AS votes_down' => function ($query) {
            //                $query->where('vote', Vote::VOTE_DOWN);
            //            }
            //        ]);
    }

    public function votesUpCount()
    {
        return $this->votes->where('vote', Vote::VOTE_UP)->count();
    }

    public function votesDownCount()
    {
        return $this->votes->where('vote', Vote::VOTE_DOWN)->count();
    }

    public function castVoteUp()
    {
        return $this->castVote(Vote::VOTE_UP);
    }

    public function castVoteDown()
    {
        return $this->castVote(Vote::VOTE_DOWN);
    }

    public function castVote($vote)
    {
        if(! $this->votes()->where([
            'user_id' => auth()->id(),
            'resource_id' => $this->id,
            'resource_type' => get_class($this)
        ])->exists()) {

            return Vote::create([
                'user_id' => auth()->id(),
                'resource_id' => $this->id,
                'resource_type' => get_class($this),
                'vote' => $vote,
            ]);
        }
    }

    public function hasVoteUp()
    {
        return !! $this->votes
            ->where('user_id', auth()->id())
            ->where('vote', Vote::VOTE_UP)
            ->count();
    }

    public function hasVoteDown()
    {
        return !! $this->votes
            ->where('user_id', auth()->id())
            ->where('vote', Vote::VOTE_DOWN)
            ->count();
    }
}