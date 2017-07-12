<?php

namespace App\Traits;

trait LogActivity
{
    public static function bootLogActivity()
    {
        foreach(static::getActionsToLog() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }

        static::deleting(function($resource) {
            $resource->activity()->delete();
        });
    }

    protected static function getActionsToLog()
    {
        return ['created'];
    }
    
    protected function recordActivity($action)
    {
        $uid = (auth()->id()) ? auth()->id() : 1;
        
        $this->activity()->create([
            'user_id' => $uid,
            'action' => $this->getActivityAction($action),
        ]);
    }

    public function activity()
    {
        return $this->morphMany('App\Models\Activity', 'resource');
    }

    protected function getActivityAction($action)
    {
        $type = strtolower(str_plural((new \ReflectionClass($this))->getShortName()));
        return $type . '.' . $action;
    }
}