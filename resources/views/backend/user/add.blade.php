@extends('backend.layout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>

        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="input-name">Name</label>
                    <input type="text" name="name" class="form-control" id="input-name" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="input-phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="input-phone" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="input-address">Address</label>
                    <input type="text" name="address" class="form-control" id="input-address" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="input-email">Email address</label>
                    <input type="email" name="email" class="form-control" id="input-email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="input-password">Password</label>
                    <input type="password" name="password" class="form-control" id="input-password"
                           placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="select-level">Level</label>
                    <select id="select-level" name="level" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
