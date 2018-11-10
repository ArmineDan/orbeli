@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('admin.post.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">Posts:
                            <span class="label label-success">150</span>
                        </span>
                        <div>                            
                            <a href="{{ route('admin.post.create', $locale) }}" class="label label-info">
                                create new <i class="glyphicon glyphicon-plus"></i>                                
                            </a>
                        </div>           
                    </div>                    
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.post.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-primary">Video-Posts:
                         <span class="label label-success">150</span>
                        </span>                    
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.post.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-primary">News:
                            <span class="label label-success">150</span>
                        </span>                    
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.post.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-primary">Announcement:
                            <span class="label label-success">150</span>
                        </span>                    
                    </div>
                </a>
            </div>            
        </div>
        <hr>

        <div class="row">
        <div class="col-md-4">
                <a href="{{ 'link.to.all.opinions' }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-primary">Opinions: 
                            <span class="label label-success">1</span>
                        </span>                    
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{'link.to.all.authors'}}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-primary">Authors: 
                            <span class="label label-success">25</span>
                        </span>                    
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.category.index', $locale)}}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-primary">Categories:
                            <span class="label label-success">8</span>
                        </span>                    
                    </div>
                </a>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <a href="{{ 'link.to.all.partners' }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-primary">Partners: 
                            <span class="label label-success">1</span>
                        </span>                    
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ 'link.to.all.aboutus' }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-primary">About Us: 
                            <span class="label label-success">1</span>
                        </span>                    
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.parralax.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-primary">Parallax: 
                            <span class="label label-success">1</span>
                        </span>                    
                    </div>
                </a>
            </div>
        </div>
        <hr>

        {{-- <div class="row">
            <div class="col-md-6">
                <div class="list-group">
                    <a href="{{ route('admin.category.create', $locale) }}" class="list-group-item active text-center">
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
                    <a href="{{ route('admin.post.create', $locale) }}" class="list-group-item active text-center">
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
        </div> --}}
    </div>
@endsection
