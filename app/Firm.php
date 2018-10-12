<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Firm extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'firms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_id',
        'sector_id',
        'name',
        'email',
        'fax',
        'phone',
        'website',
        'division',
    ];

    /**
     * Get the sector of the firm.
     */
    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }
}
