@extends('backend.layout')
@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>

        <form method="post" enctype="multipart/form-data" action="{{route('admin.product.do-add')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="input-name">Name</label>
                    <input type="text" name="name" class="form-control" id="input-name" placeholder="Enter email">
                </div>


                @error('name')
                <div class="text-red">{{$message}}</div>
                @enderror


                <div class="form-group">
                    <label for="input-price">Price</label>
                    <input type="number" name="price" class="form-control" id="input-price" placeholder="Enter email">
                </div>
                @error('price')
                <div class="text-red">{{$message}}</div>
                @enderror

                <div class="form-group">
                    <label for="input-quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="input-quantity"
                           placeholder="Enter email">
                </div>
                @error('quantity')
                <div class="text-red">{{$message}}</div>
                @enderror

                <div class="form-group">
                    <label for="input-description">Description</label>
                    <textarea class="form-control" name="description" id="input-description">

                    </textarea>
                </div>
                @error('description')
                <div class="text-red">{{$message}}</div>
                @enderror

                <div class="form-group">
                    <label for="input-category">Category</label>
                    <select id="input-category" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Thumbnail</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="thumbnails" class="custom-file-input"
                                   id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#input-description'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>
@endsection
