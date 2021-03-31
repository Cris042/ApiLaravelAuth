<?php
/**
 * Created by PhpStorm.
 * User: Cuthbert Mirambo
 * Date: 6/19/2018
 * Time: 5:13 PM
 */

namespace SAASBoilerplate\App\Tenant\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasTenancy
{
    /**
     * Get user's last accessed company.
     *
     * @return mixed
     */
    public function getLastAccessedCompanyAttribute()
    {
        return $this->companies()->orderByDesc(config('tenancy.owners.last_access_column'))->first();
    }

    /**
     * Get tenants that user belongs to.
     *
     * @return BelongsToMany
     */
    public function companies()
    {
        return $this->belongsToMany(config('tenancy.tenant.model'), config('tenancy.owners.table'));
    }
}