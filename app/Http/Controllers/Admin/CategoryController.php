<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    function doEdit($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.category.edit', ['id' => $id])->with('success', 'Edit category successfully');
    }

    function list()
    {
        $list = Category::paginate(10);
        return view('backend.category.list', compact('list'));
    }

    public function delete($id)
    {
        //tìm user theo id
        $category = Category::find($id);
        //xoá user
        $category->delete();
        //chuyển người dùng về trang list với thông báo xoá thành công
        return redirect()->route('admin.category.list')->with('success', 'Delete user successfully');
    }
}
