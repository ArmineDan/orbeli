@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h3>Create Category        
            <small> № {{$last_id}}<code>lang: {{$locale}}</code></small>
        </h3>

        <div class="row">            
            <div class="col-xs-offset-2 col-xs-8">
                @include('admin.common.messages',[
                    'success_message'=>'New category was successfuly inserted!'
                ])
            </div>            
        </div>


        <div class="row">
            <form action="{{ route('admin.category.store', $locale) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <input type="text" name="lang_id" value="{{$lang_id}}" hidden>
                
                <div class="form-group">
                    <label for="cat_name" class="control-label col-xs-2">Category Name</label>
                    <div class="col-xs-8">
                        <input id="cat_name" name="name" type="text" class="form-control"  placeholder="Category name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-8">                        
                        <button type="submit" class="btn btn-primary col-xs-12">Save</button>
                    </div>
                </div>
            </form>   
        </div>
            
    </div>
@endsection