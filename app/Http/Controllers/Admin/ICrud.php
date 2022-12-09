<?php
namespace App\Http\Controllers\Admin;
use  Illuminate\Http\Request;
interface ICrud
{
    public function add();

    public function doAdd(Request $request);

    public function edit($id);

    public function doEdit();

    public function delete($id);

    public function list();
}
