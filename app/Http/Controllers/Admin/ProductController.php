<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function add()
    {
        $categories = Category::all();
        return view('backend.product.add', compact('categories'));
    }
}
