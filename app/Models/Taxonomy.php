<?php
namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

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
 * @property-read \Kalnoy\Nestedset\Collection<int, Taxonomy> $children
 * @property-read int|null $children_count
 * @property-read Taxonomy|null $parent
 * @method static \Kalnoy\Nestedset\Collection<int, static> all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy d()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection<int, static> get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy query()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereDescription($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereMetadata($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereNodeBetween($values, $boolean = 'and', $not = false, $query = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereSlug($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereStatus($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder<static>|Taxonomy withoutRoot()
 * @mixin \Eloquent
 */
class Taxonomy extends Model
{
    use HasUuids;
    use NodeTrait;

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $table = 'taxonomies';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'description',
        'status',
        'created_at',
        'metadata',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'metadata' => 'object',
    ];
}
