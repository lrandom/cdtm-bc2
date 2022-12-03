@extends('backend.layout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>

        <form method="post" action="{{route('admin.user.do-edit',['id'=>$user->id])}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="input-name">Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="input-name" placeholder="Enter email">
                </div>


                @error('name')
                <div class="text-red">{{$message}}</div>
                @enderror


                <div class="form-group">
                    <label for="input-phone">Phone</label>
                    <input type="text" name="phone"
                           value="{{$user->phone}}"
                           class="form-control" id="input-phone" placeholder="Enter email">
                </div>
                @error('phone')
                <div class="text-red">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="input-address">Address</label>
                    <input type="text" name="address" value="{{$user->address}}" class="form-control" id="input-address" placeholder="Enter email">
                </div>
                @error('address')
                <div class="text-red">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="input-email">Email address</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" id="input-email" placeholder="Enter email">
                </div>
                @error('email')
                <div class="text-red">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="input-password">Password</label>
                    <input type="password" name="password" class="form-control" id="input-password"
                           placeholder="Password">
                </div>
                @error('password')
                <div class="text-red">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="select-level">Level</label>
                    <select id="select-level" name="level" class="form-control">
                        <option value="1" <?php if($user->level==1){echo 'selected="selected"';} ?>>Admin</option>
                        <option value="2" <?php if($user->level==2){echo 'selected="selected"';} ?>>User</option>
                    </select>
                </div>
                @error('level')
                <div class="text-red">{{$message}}</div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
