<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'parent_id',
        'image'
    ];

    protected $chain = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected function getParent($categoryId)
    {
        $category = Category::find($categoryId);
        $this->chain[] = $category->code;
        if (is_null($category->parent_id)) {
            return $this->chain;
        }
        $parentCategory = Category::find($category->parent_id);
        return $this->getParent($parentCategory->id);
    }

    public function getCategoryChain()
    {
        $chunks = $this->getParent($this->id);
        return url('/categories/'. implode('/', array_reverse($chunks)));
    }

    public static function getTree()
    {
        $rootCategories = Category::where('parent_id', null)->get();
        $treeCategories = [];
        foreach ($rootCategories as $category) {
            $treeCategories[$category->id] = [
                'id' => $category->id,
                'name' => $category->name
            ];
        }
        $categoryIds = array_keys($treeCategories);
        foreach ($categoryIds as $categoryId) {
            self::buildTree($categoryId, $treeCategories);
        }

        return $treeCategories;
    }

    protected static function buildTree($categoryId, &$array)
    {
        $childCategories = Category::where('parent_id', $categoryId)->get();
        if ($childCategories->isNotEmpty()) {
            foreach ($childCategories as $childCategory) {
                if (!isset($array[$categoryId]['childs'][$childCategory->id])) {
                    $array[$categoryId]['childs'][$childCategory->id] = [
                        'id' => $childCategory->id,
                        'name' => $childCategory->name
                    ];
                }
                self::buildTree($childCategory->id, $array[$categoryId]['childs']);
            }
        }
    }
}
