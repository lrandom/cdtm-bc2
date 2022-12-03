<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function add()
    {
        return view('backend.user.add');
    }
    public function doAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'level' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric|min:10',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'name.unique' => 'Name is already exists',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email is already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'level.required' => 'Level is required',
            'address.required' => 'Address is required',
            'phone.required' => 'Phone is required',
            'phone.min' => 'Phone must be at least 10 characters',
            'phone.numeric' => 'Phone is invalid',
        ]);
        //dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('admin.user.add')->with('success', 'Add user successfully');
    }

    public function delete($id)
    {
        //tìm user theo id
        $user = User::find($id);
        //xoá user
        $user->delete();
        //chuyển người dùng về trang list với thông báo xoá thành công
        return redirect()->route('admin.user.list')->with('success', 'Delete user successfully');
    }

    public function list()
    {
        $list = User::all();
        return view('backend.user.list', compact('list'));
    }
}
