@extends('admin.layouts.app_admin')

@section('content')

  {{-- var_dump($category->id) --}}
  <div class="container">
    <h3>Update Category <small> № {{$category->id}}<code>lang: {{$locale}}</code></small></h3>
    <div class="row">            
        <div class="col-xs-offset-2 col-xs-8">
            @include('admin.common.messages',[
                'success_message'=>'New category was successfuly inserted!'
            ])
        </div>            
    </div>
    <div class="row">
        <form action="{{ route('admin.category.update', [$category, $locale]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group">
                <label for="cat_name" class="control-label col-xs-2">Category Name</label>
                <div class="col-xs-8">
                  <input id="cat_name" name="name" type="text" class="form-control" value="{{ $category->name }}" required>
                </div>
            </div>
            <div class="form-group">
                    <label for="lang_id" class="control-label col-xs-2">Language ID</label>
                    <div class="col-xs-8">
                      <input id="lang_id" name="lang_id" type="text" class="form-control" value="{{ $category->lang_id }}" readonly="readonly">
                    </div>
                </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-8">
                        <input name="created_at" type="text" value="{{ $category->created_at }}"  hidden>
                        <input name="updated_at" type="text" value="{{ $category->updated_at }}"  hidden>
                        <input name="id" type="text" value="{{ $category->id }}"  hidden>
                    <button type="submit" class="btn btn-primary col-xs-12">Update</button>
                </div>
            </div>
        </form>   
    </div>
  </div>

@endsection