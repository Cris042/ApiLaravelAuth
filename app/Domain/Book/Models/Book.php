<?php

namespace SAASBoilerplate\Domain\Book\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Book extends Authenticatable
{
 
    use Notifiable;

    protected $table = 'book';

    protected $fillable = [
        'title',
        'author',
        'value',
        'description',
        'amount'
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
