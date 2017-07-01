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
    }

    protected static function getActionsToLog()
    {
        return ['created'];
    }
    
    protected function recordActivity($action)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'action' => $this->getActivityAction($action),
        ]);
    }

    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }

    protected function getActivityAction($action)
    {
        $type = strtolower(str_plural((new \ReflectionClass($this))->getShortName()));
        return 'forums.' . $type . '.' . $action;
    }
}