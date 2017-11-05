<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as Product;

class ProductController extends Controller
{
    public function index() {
        return Product::all()->toJson();
    }
}
