<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as Product;

use League\Fractal\Manager as Manager;
use League\Fractal\Resource\Collection;

use App\Transformers\ProductTransformer as ProductTransformer;

class ProductController extends Controller
{
    private $fractal;
    private $productTransformer;

    function __construct(Manager $fractal, ProductTransformer $productTransformer)
    {
        $this->fractal = $fractal;
        $this->productTransformer = $productTransformer;
    }

    public function index(Request $request)
    {
        $products = Product::all(); // Get users from DB
        $products = new Collection($products, $this->productTransformer); // Create a resource collection transformer
        $products = $this->fractal->createData($products); // Transform data

        return $products->toArray(); // Get transformed array of data
    }
}    
