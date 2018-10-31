@extends('admin.layouts.app_admin')

@section('content')

  {{-- var_dump($category->id) --}}
  <div class="container">
    <h2>Update Category</h2>
    <div class="row">            
        <div class="col-xs-offset-2 col-xs-8">
            @include('admin.common.messages',[
                'success_message'=>'New category was successfuly inserted!'
            ])
        </div>            
    </div>
    <div class="row">
        <form action="{{ route('admin.category.update', $category) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group">
                <label for="cat_name" class="control-label col-xs-2">Category Name</label>
                <div class="col-xs-8">
                  <input id="cat_name" name="name" type="text" class="form-control" value="{{ $category->name }}" required>
                </div>
            </div>            

            <div class="form-group">
                <label for="created_at" class="control-label col-xs-2">Created At</label>
                <div class="col-xs-8">
                  <input id="created_at" name="created_at" type="text" class="form-control" value="{{ $category->created_at }}" readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <label for="updated_at" class="control-label col-xs-2">Updated At</label>
                <div class="col-xs-8">
                  <input id="updated_at" name="updated_at" type="text" class="form-control" value="{{ $category->updated_at }}" readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-8">
                    <button type="submit" class="btn btn-primary col-xs-12">Update</button>
                </div>
            </div>
        </form>   
    </div>
  </div>

@endsection