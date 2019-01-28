<?php

namespace App\Containers\Category\Models;

use App\Ship\Parents\Models\Model;

/**
 * Class Category
 * @package App\Containers\Category\Models
 */
class Category extends Model
{
    /**
     * @var string
     */
    protected $table = 'categories';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id'
    ];
    /**
     * @var array
     */
    protected $attributes = [

    ];
    /**
     * @var array
     */
    protected $hidden = [

    ];
    /**
     * @var array
     */
    protected $casts = [

    ];
    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'categories';

    public static function root()
    {
        return self::whereNull('parent_id')->get(['id','name as text','parent_id']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->where('categories.parent_id', $this->parent_id);
    }

    /**
     * @return mixed
     */
    public function childrens()
    {
        return self::where('parent_id', $this->id)->get(['id','name as text','parent_id']);
    }

    /**
     * @return array
     */
    public static function getTree()
    {
        $root = self::root();
        $tree = self::buildTree($root);
        return $tree;
    }

    /**
     * @param $categories
     * @return array
     */
    private static function buildTree($categories)
    {
        $tree = [];
        foreach ($categories as $category) {
            $cat = $category->toArray();
            $childrens = $category->childrens();
            if (count($childrens) > 0) {
                $cat['nodes'] = self::buildTree($childrens);
            }
            $tree[] = $cat;
        }
        return $tree;
    }
}
