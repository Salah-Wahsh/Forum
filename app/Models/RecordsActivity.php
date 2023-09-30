<?php

namespace App\Models;

trait RecordsActivity
{

    protected static function bootRecordsActivity(){
        if (auth()->guest()) return;

        static::created(function ($thread){
            $thread->recordActivity('created');
        });

    }
    public function recordActivity($event)
    {
        $this->Activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event),
        ]);
//        Activity::create([
//            'subject_id' => $this->id,
//            'subject_type' => get_class($this)
//        ]);
    }

    public function Activity(){
    return $this->morphMany('App\Models\Activity', 'subject');
    }

    protected function getActivityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName()); // ex: App/foo/thread -> thread,
        return "{$event}_{$type}";
    }
}
