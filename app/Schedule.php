<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'schedules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'client_id',
        'team_id',
        'schedule_type_id',
        'meeting_at',
        'started_at',
        'finished_at',
    ];

    /**
     * Get the schedule type of the schedule.
     */
    public function scheduleType()
    {
        return $this->belongsTo('App\ScheduleType');
    }

    /**
     * Get the user of the schedule.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the client of the schedule.
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
