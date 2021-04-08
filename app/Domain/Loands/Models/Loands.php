<?php

namespace SAASBoilerplate\Domain\Loands\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Loands extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'client_id',
        'book_id',
        'value',
        'amount',
        'state',
        'expires_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
