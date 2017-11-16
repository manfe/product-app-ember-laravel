<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class JsonApiCategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'created-at' => $category->created_at->format('d M Y - H:i:s'),
            'updated-at' => $category->updated_at->format('d M Y - H:i:s')
        ];

    }
}