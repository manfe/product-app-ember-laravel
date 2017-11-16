<?php

namespace App\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class JsonApiProductTransformer extends TransformerAbstract
{
    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'value' => $product->value,
            'created-at' => $product->created_at->format('d M Y - H:i:s'),
            'updated-at' => $product->updated_at->format('d M Y - H:i:s')
        ];

    }
}