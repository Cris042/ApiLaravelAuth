<?php

namespace SAASBoilerplate\Domain\Client\Models;

use Illuminate\Database\Eloquent\Model;
use SAASBoilerplate\App\Tenant\Traits\IsTenant;
use SAASBoilerplate\Domain\Projects\Models\Project;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use IsTenant;

    protected $table = 'client';

    protected $fillable = [
        'name',
        'cpf',
        'telefone'
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
