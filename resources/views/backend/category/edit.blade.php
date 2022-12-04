@extends('backend.layout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>

        <form method="post" action="{{route('admin.category.do-edit',['id'=>$category->id])}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="input-name">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control" id="input-name" placeholder="Enter email">
                </div>
                @error('name')
                <div class="text-red">{{$message}}</div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
