@extends('layouts.pageCategories')
@section('posts')
<div class="infinite-scroll wow fadeIn" > 
       
    @foreach ($all_last_posts['post'] as $item)               
       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;">  
           <div class="blog-post blog-post-style1 xs-text-center">
               <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                   <a href="{{url( $all_last_posts['lang'].'/'.$all_last_posts['folder'].'/'.$item->date.'/'.urlencode($item->title))}}">
                       <img src="{{$item->oimg}}" alt="" data-no-retina="">
                   </a>
               </div>
               <div class="post-details">
                   <a href="{{url( $all_last_posts['lang'].'/'.$all_last_posts['folder'].'/'.$item->date.'/'.urlencode($item->title))}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100"  style="font-weight:bold">{{$item->title}}</a>
                   <span class="text-medium-gray text-extra-small pull-right padding-15px-left display-inline-block"> <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;{{$item->n_duration." ".trans('text.minute') }} </span>
                   <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                    <div class="author text_left_a">
                                    <img src="{{$item->aimg}}" alt="" class="border-radius-100" data-no-retina="">
                                  <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block">
                                      <a href="{{url( $all_last_posts['lang'].'/author/'.$item->author_id)}}" class="text-medium-gray padding-left" >{{substr($item->name, 0, 2) .'. '. $item->lastname}}</a>
                                     </span>
                                     <div class="text_right_a">&nbsp;&nbsp;{{$item->date}}</div>
                     </div>
               </div>
           </div>
        </div>
 @endforeach
 
{{$all_last_posts['post'] ->links()}}

</div>

@endsection