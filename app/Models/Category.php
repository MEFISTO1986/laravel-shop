<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
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

    public static function buildTree($categoryId, &$array)
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
