@extends('layouts.about_me');

@section('all_post_of_author')
<div class="col-md-12 col-sm-12 col-xs-12 margin-lr-auto text-center margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb">
        <div class="position-relative overflow-hidden width-100" style="display:{{count($all_last_posts['a_posts'])>0?'':'none'}}">
            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">
                    <a href="{{url($all_last_posts['lang'].'/author/posts/'.$all_last_posts['authors'][0]->id)}}" >  {{trans('text.author_posts')}} <i class="fa fa-arrow-right"></i></span>
        </div>
    </div>

@foreach ($all_last_posts['a_posts'] as $item)
<div class="col-md-4 col-sm-6 col-xs-12 last-paragraph-no-margin sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn" style=" animation-name: none;">
        <div class="blog-post blog-post-style1 xs-text-center">
            <div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">
                <a href="{{url( $all_last_posts['lang'].'/post/'.$item->date.'/'.$item->title)}}" >
                    <img src="{{$item->img}}" alt="" data-no-retina="">
                </a>
            </div>
            <div class="post-details">
                <span class="post-author text-extra-small text-medium-gray text-uppercase display-block margin-10px-bottom xs-margin-5px-bottom">{{$item->date}}  </span>
                <a href="{{url( $all_last_posts['lang'].'/post/'.$item->date.'/'.$item->title)}}"  class="post-title text-medium text-extra-dark-gray width-90 display-block sm-width-100">{{$item->title}}</a>
                <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb sm-margin-15px-tb"></div>
                <p class="width-90 xs-width-100">{!!$item->short_text!!}</p>
            </div>
        </div>
    </div>
@endforeach
    
@endsection