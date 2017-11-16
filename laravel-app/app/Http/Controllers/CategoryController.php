<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;

use App\Transformers\JsonApiCategoryTransformer;

class CategoryController extends Controller
{
    private $fractal;
    private $jsonApiCategoryTransformer;

    function __construct(Manager $fractal, JsonApiCategoryTransformer $jsonApiCategoryTransformer)
    {
        $this->fractal = $fractal;
        $this->fractal->setSerializer(new JsonApiSerializer());
        $this->jsonApiCategoryTransformer = $jsonApiCategoryTransformer;
    }

    public function index(Request $request)
    {
        $categories = Category::all(); // Get users from DB
        $categories = new Collection($categories, $this->jsonApiCategoryTransformer, 'category'); // Create a resource collection transformer
        $categories = $this->fractal->createData($categories); // Transform data

        return $categories->toArray(); // Get transformed array of data
    }
}
