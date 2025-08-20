<?php
namespace App\Models\Scopes;

use App\Models\Taxonomy;
use App\Models\Taxonomy\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class RoleScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $role = Taxonomy::whereSlug(Role::$rootSlug)->first();
        $builder->where('parent_id', $role->id);
    }
}
