<?php

namespace SAASBoilerplate\Domain\Loands\Models;

use Illuminate\Database\Eloquent\Model;
use SAASBoilerplate\App\Tenant\Traits\IsTenant;
use SAASBoilerplate\Domain\Projects\Models\Project;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loands extends Model
{
    use IsTenant;

    protected $fillable = [
        'client_id',
        'book_id',
        'expires_at',
        'created_at'
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
