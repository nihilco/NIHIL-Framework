<?php

namespace App\Filters;

use App\Models\User;
use App\Models\Forum;

class ThreadFilters extends Filters
{
    protected $filters = ['username', 'forum', 'replies'];
    
    public function forum($key)
    {
        $id = null;

        if(intval($key) > 0) {
            $id = $key;
        } else {
            $forum = Forum::where('slug', $key)->firstOrFail();
            $id = $forum->id;
        }

        return $this->builder->where('forum_id', $id);
    }

    public function username($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        
        return $this->builder->where('user_id', $user->id);
    }

    public function replies()
    {
        $this->builder->getQuery()->orders = [];
        
        $this->builder->orderBy('replies_count', 'desc');
    }
}