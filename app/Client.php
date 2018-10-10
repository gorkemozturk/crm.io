<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_id',
        'firm_id',
        'name',
        'email',
        'phone',
        'birthday',
        'country',
        'city',
        'province',
        'address',
    ];

    /**
     * Get the firm of the client.
     */
    public function firm()
    {
        return $this->belongsTo('App\Firm');
    }
}
