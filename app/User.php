<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['start_date', 'end_date'];

    public function scopeHasRole($query, $role)
    {
        if ($role == 'all') {
            return $query;
        }

        return $query->where('role', $role);
    }

    public function scopeInGroup($query, $group)
    {
        if ($group == 'all') {
            return $query;
        }

        return $query->where('group', $group);
    }

    public function scopeTimePeriod($query, $time)
    {
        if ($time == 'current') {
            return $query->whereDate('end_date', '>', Carbon::today());
        }

        if ($time == 'all') {
            return $query;
        }
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
