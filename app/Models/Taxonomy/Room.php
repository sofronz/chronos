<?php
namespace App\Models\Taxonomy;

use App\Models\Taxonomy;
use App\Models\Scopes\RoomScope;
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
 * @property-read \Kalnoy\Nestedset\Collection<int, Room> $children
 * @property-read int|null $children_count
 * @property-read Room|null $parent
 * @method static \Kalnoy\Nestedset\Collection<int, static> all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room d()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection<int, static> get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room query()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereDescription($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereMetadata($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereNodeBetween($values, $boolean = 'and', $not = false, $query = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereSlug($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereStatus($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Room withoutRoot()
 * @mixin \Eloquent
 */
class Room extends Taxonomy
{
    /**
     * @var string
     */
    public static string $rootSlug = 'rooms';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new RoomScope);
    }
}
