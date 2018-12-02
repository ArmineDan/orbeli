@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="panel">
            <h4>Language
                <small>                    
                    <mark>{{$locale}}</mark>                    
                </small>
                |
                
                @if ($comments > 0)
                <a href="{{ route('admin.comment.index', $locale) }}" class="btn btn-default">
                    Unapproved comments
                    <span class="label label-danger" style="vertical-align: middle;">{{$comments}}</span>                    
                </a>                    
                @else
                Comments to check
                    <span class="label label-primary" style="vertical-align: middle;">{{$comments}}</span>
                @endif
            </h4>
        </div>
        
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
                        <span class="text-indent btn btn-default">Announcement:
                            <span class="label label-success">{{ $announcements }}</span>
                        </span>
                        <a href="{{ route('admin.announcements.create', $locale) }}" class="label label-info">
                            create new <i class="glyphicon glyphicon-plus"></i>                                
                        </a>                    
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

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('admin.notfound.edit', [$not_found[0], $locale]) }}">
                    <div class="jumbotron text-center">
                        <span class="text-indent btn btn-default">404 Page: 
                            <span class="label label-success">{{ $not_found->count() }}</span>
                        </span>                    
                    </div>
                </a>
            </div>            
        </div>
        <hr>

    </div>
@endsection
