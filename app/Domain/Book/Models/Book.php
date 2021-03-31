<?php

namespace SAASBoilerplate\Domain\Book\Models;

use Illuminate\Database\Eloquent\Model;
use SAASBoilerplate\App\Tenant\Traits\IsTenant;
use SAASBoilerplate\Domain\Projects\Models\Project;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use IsTenant;

    protected $table = 'book';

    protected $fillable = [
        'title',
        'author',
        'value',
        'description',
        'amount'
    ];

    /**
     * Get projects owned by company.
     * 
     * @return HasMany
     */
    public function projects()
    {
        return $this->hasMany( Project::class );
    }
}
