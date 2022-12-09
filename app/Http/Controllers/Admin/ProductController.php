<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\ICrud;
use App\Models\Product;
class ProductController extends Controller implements ICrud
{
    public function add()
    {
        $categories = Category::all();
        return view('backend.product.add', compact('categories'));
    }

    public function doAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        ], [
            'name.required' => 'Name is required',
            'name.unique' => 'Name is already exists',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'category_id.required' => 'Category is required',
            'category_id.numeric' => 'Category must be a number',
            'quantity.required' => 'Quantity is required',
            'quantity.numeric' => 'Quantity must be a number',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->save();

        if ($request->has('thumbnails')) {
            $file = $request->file('thumbnails');
            //$file->move('uploads', $file->getClientOriginalName());
            //$product->image = $file->getClientOriginalName();
            Storage::disk('public')->put($file->getClientOriginalName(), file_get_contents($file->getRealPath()));
            $image = new Image();
            $image->path = $file->getClientOriginalName();
            $image->product_id = $product->id;
            $image->save();
        }
        return redirect()->route('admin.product.add')->with('success', 'Add product successfully');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function doEdit()
    {
        // TODO: Implement doEdit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function list()
    {
        // TODO: Implement list() method.
    }


}
