@extends('layouts.show_archieves')
@section('posts')
<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title" style="display:{{count($all_last_posts['post'])==0?'none':'block'}}"><span> {{trans('text.posts')}}</span></div>
                             
 <div class="infinite-scroll wow fadeIn" style="display:{{count($all_last_posts['post'])==0?'none':'block'}}"> 
       
    @foreach ($all_last_posts['post'] as $item)               
       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;">
           <div class="blog-post blog-post-style1 xs-text-center">
               <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                   <a href="{{url( $all_last_posts['lang'].'/post/'.$item->date.'/'.$item->title)}}">
                       <img src="{{$item->img}}" alt="" data-no-retina="">
                   </a>
               </div>
               <div class="post-details">
                   <a  href="{{url( $all_last_posts['lang'].'/post/'.$item->date.'/'.$item->title)}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">{!!$item->title!!} </a>
                   <span class="text-medium-gray text-extra-small pull-right padding-15px-left display-inline-block"><i class="fa fa-clock-o"></i> {{$item->p_duratioan.' '.trans('text.minute') }}</span>
                  <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                   
                   
                   <div class="author text_left_a">
                    @for ($i = 0; $i < count($item->getAuthors); $i++)
                    <img src="{{$item->getAuthors[$i]->img}}" alt="" class="border-radius-100" data-no-retina="">
                     <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block">
                         <a  href="{{url( $all_last_posts['lang'].'/author/'.$item->getAuthors[$i]->id)}}" class="text-medium-gray padding-left" >{{substr($item->getAuthors[$i]->name, 0, 2) .'. '. $item->getAuthors[$i]->lastname}}</a>
                        </span>
                        
             @endfor
                  </div> 
               </div>
           </div>
        </div>
     
 @endforeach
 

{{$all_last_posts['post'] ->links()}}

</div>

@endsection

@section('videos')
<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title" style="display:{{count($all_last_posts['videos'])==0 ?'none':'block'}}"><span> {{trans('text.videos')}}</span></div>

 <div class="infinite-scroll wow fadeIn" style="display:{{count($all_last_posts['videos'])==0?'none':'block'}}" > 
         @foreach ($all_last_posts['videos'] as $item)               
       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;">
           <div class="blog-post blog-post-style1 xs-text-center">
               <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                   <a href="{{url( $all_last_posts['lang'].'/video/'.$item->date.'/'.$item->title)}}">
                       <img src="{{$item->oimg}}" alt="" data-no-retina="">
                   </a>
               </div>
               <div class="post-details">
                   <a  href="{{url( $all_last_posts['lang'].'/video/'.$item->date.'/'.$item->title)}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">{!!$item->title!!} </a>
                   <span class="text-medium-gray text-extra-small pull-right padding-15px-left display-inline-block"><i class="fa fa-eye"></i> {{$item->duration.' '.trans('text.minute') }}.</span>
                  <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                   
                   
                   <div class="author text_left_a">
                    <img src="{{$item->aimg}}" alt="" class="border-radius-100" data-no-retina="">
                    <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block">
                        <a  href="{{url( $all_last_posts['lang'].'/author/'.$item->author_id)}}" class="text-medium-gray padding-left" >{{substr($item->name, 0, 2) .'. '. $item->lastname}}</a>
                       </span>
                       <div class="text_right_a">&nbsp;&nbsp;{{$item->date}}</div>
                    </div>
               </div>
           </div>
        </div>
 @endforeach
 

{{$all_last_posts['videos'] ->links()}}

</div>

@endsection

@section('announce')

<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title" style="display:{{count($all_last_posts['announcements'])==0?'none':'block'}}"><span> {{trans('text.announcements')}}</span></div>
<div class="infinite-scroll wow fadeIn" style="display:{{count($all_last_posts['announcements'])==0?'none':'block'}}" > 
         @foreach ($all_last_posts['announcements'] as $item)               
       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;">
           <div class="blog-post blog-post-style1 xs-text-center">
               <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                   <a href="{{url( $all_last_posts['lang'].'/announcements/'.$item->date.'/'.$item->title)}}">
                       <img src="{{$item->oimg}}" alt="" data-no-retina="">
                   </a>
               </div>
               <div class="post-details">
                   <a  href="{{url( $all_last_posts['lang'].'/announcements/'.$item->date.'/'.$item->title)}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">{!!$item->title!!} </a>
                   <span class="text-medium-gray text-extra-small pull-right padding-15px-left display-inline-block"><i class="fa fa-eye"></i> {{$item->a_duration.' '.trans('text.minute') }}</span>
                  <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                   
                   
                   <div class="author text_left_a">
                                   <img src="{{$item->aimg}}" alt="" class="border-radius-100" data-no-retina="">
                                 <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block">
                                     <a  href="{{url( $all_last_posts['lang'].'/author/'.$item->author_id)}}" class="text-medium-gray padding-left" >{{substr($item->name, 0, 2) .'. '. $item->lastname}}</a>
                                    </span>
                                    <div class="text_right_a">&nbsp;&nbsp;{{$item->date}}</div>
                    </div>
               </div>
           </div>
        </div>
 @endforeach
 

{{$all_last_posts['announcements'] ->links()}}

</div>

@endsection

@section('news')

<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title" style="display:{{count($all_last_posts['news'])==0?'none':'block'}}"><span>{{trans('text.news')}}</span></div>

 <div class="infinite-scroll wow fadeIn" style="display:{{count($all_last_posts['news'])==0?'none':'block'}}"> 
         @foreach ($all_last_posts['news'] as $item)               
       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;">
           <div class="blog-post blog-post-style1 xs-text-center">
               <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                   <a href="{{url( $all_last_posts['lang'].'/news/'.$item->date.'/'.$item->title)}}">
                       <img src="{{$item->oimg}}" alt="" data-no-retina="">
                   </a>
               </div>
               <div class="post-details">
                   <a  href="{{url( $all_last_posts['lang'].'/news/'.$item->date.'/'.$item->title)}}" class="post-title text-medium text-extra-dark-gray width-100 display-block md-width-100">{!!$item->title!!} </a>
                   <span class="text-medium-gray text-extra-small pull-right padding-15px-left display-inline-block"><i class="fa fa-eye"></i> {{$item->n_duration.' '.trans('text.minute') }}</span>
                  <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                      
                   <div class="author text_left_a">
                                   <img src="{{$item->aimg}}" alt="" class="border-radius-100" data-no-retina="">
                                 <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block">
                                     <a  href="{{url( $all_last_posts['lang'].'/author/'.$item->author_id)}}" class="text-medium-gray padding-left" >{{substr($item->name, 0, 2) .'. '. $item->lastname}}</a>
                                    </span>
                                    <div class="text_right_a">&nbsp;&nbsp;{{$item->date}}</div>
                    </div>
               </div>
           </div>
        </div>
 @endforeach
 

{{$all_last_posts['news'] ->links()}}

</div>

@endsection
@section('opinions')

<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title" style="display:{{count($all_last_posts['opinions'])==0?'none':'block'}}"><span>{{trans('text.opinions')}}</span></div>

 <div class="infinite-scroll wow fadeIn" style="display:{{count($all_last_posts['opinions'])==0?'none':'block'}}"> 
         @foreach ($all_last_posts['opinions'] as $item)               
       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;">
           <div class="blog-post blog-post-style1 xs-text-center">
               <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                   <a href="{{url( $all_last_posts['lang'].'/opinions/'.$item->date.'/'.$item->title)}}">
                       <img src="{{$item->oimg}}" alt="" data-no-retina="">
                   </a>
               </div>
               <div class="post-details">
                   <a  href="{{url( $all_last_posts['lang'].'/opinions/'.$item->date.'/'.$item->title)}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">{!!$item->title!!} </a>
                   <span class="text-medium-gray text-extra-small pull-right padding-15px-left display-inline-block"><i class="fa fa-eye"></i> {{$item->o_duration.' '.trans('text.minute') }}.</span>
                  <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                      
                   <div class="author text_left_a">
                                   <img src="{{$item->aimg}}" alt="" class="border-radius-100" data-no-retina="">
                                 <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block">
                                     <a  href="{{url( $all_last_posts['lang'].'/author/'.$item->author_id)}}" class="text-medium-gray padding-left" >{{substr($item->name, 0, 2) .'. '. $item->lastname}}</a>
                                    </span>
                                    <div class="text_right_a">&nbsp;&nbsp;{{$item->date}}</div>
                    </div>
               </div>
           </div>
        </div>
 @endforeach
 

{{$all_last_posts['opinions'] ->links()}}

</div>

@endsection