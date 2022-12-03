<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function add()
    {
        return view('backend.category.add');
    }

    function doAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ], [
            'name.required' => 'Name is required',
            'name.unique' => 'Name is already exists',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.category.add')->with('success', 'Add category successfully');
    }

    function edit()
    {

    }

    function doEdit()
    {

    }

    function list()
    {

    }
}
