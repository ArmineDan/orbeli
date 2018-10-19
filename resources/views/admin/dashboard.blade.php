@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('admin.post.index') }}">
                    <div class="jumbotron text-center">
                        <p class="text-indent btn btn-primary">Posts:
                            <span class="label label-success">150</span>
                        </p>                    
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.category.index')}}">
                    <div class="jumbotron text-center">
                        <p class="text-indent btn btn-primary">Categories:
                            <span class="label label-success">8</span>
                        </p>                    
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ 'link.to.all.visitors' }}">
                    <div class="jumbotron text-center">
                        <p class="text-indent btn btn-primary">Visitors: 
                            <span class="label label-success">3000</span>
                        </p>                    
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{'link.to.all.authors'}}">
                    <div class="jumbotron text-center">
                        <p class="text-indent btn btn-primary">Authors: 
                            <span class="label label-success">25</span>
                        </p>                    
                    </div>
                </a>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="list-group">
                    <a href="{{ route('admin.category.create') }}" class="list-group-item active text-center">
                        <span class="h4">Create Category</span>
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>        
                    <a class="list-group-item" href="#">
                        <h4 class="list-group-item-heading">First Category</h4>
                        <p class="list-group-item-text">
                            posts-count
                        </p>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    <a href="{{ route('admin.post.create') }}" class="list-group-item active text-center">
                        <span class="h4">Create Post</span>
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>        
                    <a class="list-group-item" href="#">
                        <h4 class="list-group-item-heading">First Post</h4>
                        <p class="list-group-item-text">
                            category
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
