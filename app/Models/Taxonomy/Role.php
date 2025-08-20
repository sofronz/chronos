<?php
namespace App\Models\Taxonomy;

use App\Models\Taxonomy;
use App\Models\Scopes\RoleScope;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int $status
 * @property object|null $metadata
 * @property string|null $parent_id
 * @property int|null $_lft
 * @property int|null $_rgt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection<int, Role> $children
 * @property-read int|null $children_count
 * @property-read Role|null $parent
 * @method static \Kalnoy\Nestedset\Collection<int, static> all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role d()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection<int, static> get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role query()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereDescription($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereMetadata($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereNodeBetween($values, $boolean = 'and', $not = false, $query = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereSlug($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereStatus($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Role withoutRoot()
 * @mixin \Eloquent
 */
class Role extends Taxonomy
{
    /**
     * @var string
     */
    public static string $rootSlug = 'roles';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new RoleScope);
    }
}
