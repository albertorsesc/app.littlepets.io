<?php

namespace App\Models\Concerns;

use App\Models\Activity;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait RecordsActivity
{

    protected  static function bootRecordsActivity()
    {
        if(auth()->guest()) return;

        foreach (static::getActivitiesToRecord() as $event) {
            static::created(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }
    }

    protected static function  getActivitiesToRecord() : array
    {
        return ['created'];
    }

    protected function recordActivity($event) : void
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event)
        ]);
    }

    public function activity() : MorphMany
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    protected function getActivityType($event) : string
    {
        $type = Str::snake(strtolower((new \ReflectionClass($this))->getShortName()));

        return "{$type}_{$event}";
    }
}
