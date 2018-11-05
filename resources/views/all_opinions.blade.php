@extends('layouts.pageCategories')
@section('posts')
<div class="infinite-scroll wow fadeIn" > 
       
    @foreach ($all_last_posts['post'] as $item)               
       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: visible; animation-name: fadeInUp; height: 317px;">
           <div class="blog-post blog-post-style1 xs-text-center">
               <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                   <a href="{{url('post/'.$item->date.'/'.$item->title)}}">
                       <img src="/{{$item->oimg}}" alt="" data-no-retina="">
                   </a>
               </div>
               <div class="post-details">
                   <a href="{{url( $all_last_posts['lang'].'/opinion/'.$item->date.'/'.$item->title)}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">{{$item->short_text}}</a>
                   <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                   <div class="author">
                        <img src="/{{$item->aimg}}" alt="" class="border-radius-100" data-no-retina="">
                             
                       <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block"> <a href="home-#" class="text-medium-gray">{{$item->name.' '.$item->lastname}}</a>&nbsp;&nbsp;|&nbsp;&nbsp;{{$item->date}}</span>
                   </div>
               </div>
           </div>
        </div>
 @endforeach
 

{{$all_last_posts['post'] ->links()}}

</div>

@endsection