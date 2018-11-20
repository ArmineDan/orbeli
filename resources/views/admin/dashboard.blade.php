@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('admin.post.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">Posts:
                            <span class="label label-success">{{$posts}}</span>
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
                <a href="{{ route('admin.video.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">Video-Posts:
                            <span class="label label-success">{{$videos}}</span>
                        </span>
                        <div>                            
                            <a href="{{ route('admin.video.create', $locale) }}" class="label label-info">
                                create new <i class="glyphicon glyphicon-plus"></i>                                
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.news.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">News:
                            <span class="label label-success">{{ $news }}</span>
                        </span>
                        <div>                            
                            <a href="{{ route('admin.news.create', $locale) }}" class="label label-info">
                                create new <i class="glyphicon glyphicon-plus"></i>                                
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.announcements.index', $locale) }}">
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
                <a href="{{ route('admin.opinion.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">Opinions: 
                            <span class="label label-success">{{$opinion}}</span>
                        </span>
                        <div>                            
                            <a href="{{ route('admin.opinion.create', $locale) }}" class="label label-info">
                                create new <i class="glyphicon glyphicon-plus"></i>                                
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('admin.authors.index', $locale)}}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">Authors: 
                            <span class="label label-success">{{ $authors }}</span>
                        </span>
                        <div>                            
                            <a href="{{ route('admin.authors.create', $locale) }}" class="label label-info">
                                create new <i class="glyphicon glyphicon-plus"></i>                                
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.category.index', $locale)}}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">Categories:
                            <span class="label label-success">{{$categories}}</span>
                        </span>
                        <div>
                            <a href="{{ route('admin.category.create', $locale) }}" class="label label-info">
                                create new <i class="glyphicon glyphicon-plus"></i>                                
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-3">

                <a href="{{ route('admin.partners.index', $locale) }}">

                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">Partners: 
                            <span class="label label-success">{{ $partners }}</span>
                        </span>
                        <div>
                            <a href="{{ route('admin.partners.create', $locale) }}" class="label label-info">
                                create new <i class="glyphicon glyphicon-plus"></i>                                
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.about_us.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">About Us: 
                            <span class="label label-success">{{ $aboutus }}</span>
                        </span>                    
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.parralax.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">Parallax: 
                            <span class="label label-success">{{ $parallax }}</span>
                        </span>                    
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.contact.index', $locale) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">Contact us: 
                            <span class="label label-success">{{ $contacts }}</span>
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
