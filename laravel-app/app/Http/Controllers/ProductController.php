<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as Product;

use League\Fractal\Manager as Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;

use App\Transformers\JsonApiProductTransformer as JsonApiProductTransformer;

class ProductController extends Controller
{
    private $fractal;
    private $jsonApiProductTransformer;

    function __construct(Manager $fractal, JsonApiProductTransformer $jsonApiProductTransformer)
    {
        $this->fractal = $fractal;
        $this->fractal->setSerializer(new JsonApiSerializer());
        $this->jsonApiProductTransformer = $jsonApiProductTransformer;
    }

    public function index(Request $request)
    {
        $products = Product::all(); // Get users from DB
        $products = new Collection($products, $this->jsonApiProductTransformer, 'product'); // Create a resource collection transformer
        $products = $this->fractal->createData($products); // Transform data

        return $products->toArray(); // Get transformed array of data
    }
}    
