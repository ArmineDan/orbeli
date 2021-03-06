@extends('layouts.index')
@section('main_post')  
<div class="col-md-12 col-sm-12 col-xs-12 blog-post-content  xs-margin-5px-bottom xs-text-center">
    <a href="{{url($all_last_posts['lang'].'/post/'.$all_last_posts['main_post'][0]->id.'/'.$all_last_posts['main_post'][0]->date.'/'.$all_last_posts['main_post'][0]->title)}}" class="blog-image"><img  class=" main_post_blur_narek" src="{{$all_last_posts['main_post'][0]->img}}" alt="" data-no-retina=""></a>
    <div class="blog-text titel_new display-inline-block" id="index_main_div_nark">
        <div class="content padding-19px-all xs-padding-20px-all">
            <div class="black text-extra-small margin-5px-bottom text-uppercase alt-font">
			
            @for ($i = 0; $i < count($all_last_posts['author']); $i++)
            <a href="{{url($all_last_posts['lang'].'/author/'.$all_last_posts['author'][$i]->id)}}" class="black">{{ substr( $all_last_posts['author'][$i]->name , 0, 2) .' '. $all_last_posts['author'][$i]->lastname. ' | '}}</a>
            @endfor
        </span>
            <span class="black  text-extra-small pull-right padding-15px-left display-inline-block" id="narek_clock_post_ns"><i class="fa  fa-clock-o"> </i><span class="text-lowcase"> {{$all_last_posts['main_post'][0]->p_duratioan.' '.trans('text.minute') }}</span> &nbsp;&nbsp;|&nbsp;&nbsp;{{$all_last_posts['main_post'][0]->date}}</span> 
                 
        </div>
            <a href="{{url($all_last_posts['lang'].'/post/'.$all_last_posts['main_post'][0]->id.'/'.$all_last_posts['main_post'][0]->date.'/'.$all_last_posts['main_post'][0]->title)}}" class="black text-extra-dark-gray text-uppercase  alt-font text-large font-weight-600 margin-15px-bottom display-block">{!!str_limit($all_last_posts['main_post'][0]->title , 35)!!}</a>
        </div>
    </div> 
</div>

@endsection 
@section('main_right')
@foreach ($all_last_posts['main_right'] as $item)

      <div class="col-md-12 col-sm-12 col-xs-12  blog-post blog-post-style1  width-100  margin-5px-bottom height-106px" >   
           <div class="col-md-5 col-sm-12 col-xs-12 blog-post-images overflow-hidden margin-5px-bottom xs-margin-15px-bottom">
                        <a  href="{{url($all_last_posts['lang'].'/post/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}">
                             <img src="{{$item->img}}" alt="" data-no-retina="">                          
                        </a>
                    </div>
          <div class=" col-md-7 col-sm-12 col-xs-12 ">
		 
		   <a href="{{url($all_last_posts['lang'].'/post/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}" class="text-extra-dark-gray">
                    <span  class="post-title text-small text-extra-dark-gray width-100 display-block md-wid-100 "  style="font-weight:bold;">{!!str_limit($item->title , 40)!!} 
                            </span> </a>
							
		
                   <div class="width-100 display-block md-wid-100" >
				  @for ($i = 0; $i < count($item->getAuthors); $i++)
					   
                    <a href="{{url($all_last_posts['lang'].'/author/'.$item->getAuthors[$i]->id)}}" class="text-extra-dark-gray">
					<span class="text-medium-gray text-extra-small">
                    {{substr($item->getAuthors[$i]->name, 0, 2) .'. '. $item->getAuthors[$i]->lastname.' | '}}
                               </span>  
								 </a>
					 
                   @endfor 
               <div class="text-medium-gray  text-extra-small-10"><i class="fa  fa-clock-o"> </i> {{$item->p_duratioan.' '.trans('text.minute') }} &nbsp;&nbsp;| {{$item->date}}</div> 
                 
				   </div>
				   </div> 
				   </div>
 
			@endforeach  
@endsection

@section('main_right_sm')

<ul class="latest-post position-relative" id="latest_post_main_right_ul_narek">
        @foreach ($all_last_posts['main_right'] as $item)                             
        <li class="aa" id="fadsfasdfasd"  style="text-align:left"> 
          <figure id="figure_narek" class="gg over">
         <a href="{{url($all_last_posts['lang'].'/post/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}"> 
            <img src="{{$item->img}}" alt="" data-no-retina=""></a>
                </figure>
                <div class="display-table-cell vertical-align-top text-small">
                    <a href="{{url($all_last_posts['lang'].'/post/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}" class="text-extra-dark-gray">
                    <span class="display-inline-block margin-5px-bottom"  style="font-weight:bold; height:54px;">{!!str_limit($item->title , 40)!!} </span></a> 
                   <br/>
                    @for ($i = 0; $i < count($item->getAuthors); $i++)
                    <a href="{{url($all_last_posts['lang'].'/author/'.$item->getAuthors[$i]->id)}}" class="text-extra-dark-gray">
                    <span class="text-medium-gray text-extra-small"> 
                   {{substr($item->getAuthors[$i]->name, 0, 2) .'. '. $item->getAuthors[$i]->lastname.' | '}}
                </span>
                    </a>
                   @endfor
               
                    <span class=" clearfix text-medium-gray  text-extra-small-10  pull-right padding-15px-left display-content"><i class="fa  fa-clock-o"> </i> <span class="text-lowcase">{{$item->p_duratioan.' '.trans('text.minute') }} </span>&nbsp;&nbsp;|&nbsp;&nbsp;{{$item->date}}</span> 
                          
                        </div>
                            </li>
        @endforeach                            
</ul>
        
@endsection



@section('main_video')
@isset($all_last_posts['main_video'][0])

    <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content  xs-margin-30px-bottom xs-text-center" id="px_narek_main_video">
    <a href="{{url($all_last_posts['lang'].'/video/'.$all_last_posts['main_video'][0]->id.'/'.$all_last_posts['main_video'][0]->date.'/'.urlencode($all_last_posts['main_video'][0]->title))}}" class="blog-image">
        <img class="main_post_blur_narek" src="{{$all_last_posts['main_video'][0]->img}}" alt="" data-no-retina="">
        <div class="main_video_button_ns">
            <i class="fa fa-play-circle"></i>
        </div>   
    </a> 
        <div class="blog-text tite2_new display-inline-block ">
        <div class="content padding-19px-all xs-padding-20px-all">
            <div class="black text-extra-small margin-5px-bottom text-uppercase alt-font">
                <span>
                <span><a href="{{url($all_last_posts['lang'].'/author/'.$all_last_posts['main_video'][0]->author_id)}}"  class="black" >{{$all_last_posts['main_video'][0]->name .' '. $all_last_posts['main_video'][0]->lastname}}</a></span>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"> </i> 
                <span class="text-lowcase">{{$all_last_posts['main_video'][0]->duration." ".trans('text.minute')}}</span></span></div>
            <a href="{{url($all_last_posts['lang'].'/video/'.$all_last_posts['main_video'][0]->id.'/'.$all_last_posts['main_video'][0]->date.'/'.urlencode($all_last_posts['main_video'][0]->title))}}" class="text-extra-dark-gray text-uppercase  alt-font text-large font-weight-600 margin-15px-bottom display-block">{!!str_limit($all_last_posts['main_video'][0]->title, 40)!!}</a>
        </div>
    </div>
</div>
@endisset 

@endsection

@section('vertical_video')
            @foreach ($all_last_posts['vert'] as $item)
            <div class="col-md-12 col-sm-12col-xs-12 col-xs-12  margin-10px-bottom sm-margin-5px-bottom xs-margin-30px-bottom wow no-padding video_a"  style="visibility: visible;animation-name: fadeIn;">
                <div class="blog-post blog-post-style1">    
                    <div class="blog-post-images overflow-hidden margin-5px-bottom xs-margin-15px-bottom">
                        <a class="video-link-davo" href="{{url($all_last_posts['lang'].'/video/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}">
                             <img  class="nk" src="{{$item->img}}" alt="" data-no-retina="">
                            <div class="play-davo">
                                <i class="fa fa-play-circle"></i>
                            </div>   
                        </a>
                    </div>
          <div class="author">
                <a class="video-link-davo" href="{{url($all_last_posts['lang'].'/video/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}">
                                               <span  class="post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 height-60px"  style="font-weight:bold;" >{!!str_limit($item->title , 40)!!} 
                           
                                               </a>                 </span> 
                            
                      <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block" >
                        <a href="{{url($all_last_posts['lang'].'/author/'.$item->author_id)}}" class="text-medium-gray">{{$item->name .' '. $item->lastname}}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"> </i> <span class="text-lowcase">{{$item->duration." ".trans('text.minute')}}</span></span>
                </div> 
                </div>
            </div><br>
            @endforeach  
        
@endsection

@section('parallax')
@isset($all_last_posts['parralax'][0])
 <a href="{{$all_last_posts['parralax'][0]->link}}">
<section class="mine00 wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image: url({{$all_last_posts['parralax'][0]->img}}); background-position: 0px 0px; visibility: visible; animation-name: fadeIn;">
       
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center">    
                    <a href="{{$all_last_posts['parralax'][0]->link}}">
                    <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">{{$all_last_posts['parralax'][0]->title}}</h1>
                    <span class="text-white opacity6 alt-font" style="font-size:25px">{!!$all_last_posts['parralax'][0]->text!!}</span></a> 
                </div>
            </div>
        </div>
    </div>

</section> 
</a>     
@endisset

  
    
@endsection

@section('comments')
 
@foreach ($all_last_posts['opinions'] as $item)
            <div class="xoragir_d col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp height-317px" style="visibility: hidden; animation-name: fadeInUp;">
                    <div class="blog-post blog-post-style1">

                        <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                            <a href="{{url($all_last_posts['lang'].'/opinion/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}">
 
                                <img src="{{$item->oimg}}" alt="" data-no-retina="">
                            </a>
                        </div>
                        <div class="post-details">
                            <a href="{{url($all_last_posts['lang'].'/opinion/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100  height-82px">{!!str_limit($item->title, 40)!!}</a>
                            <span class="text-medium-gray text-extra-small pull-right padding-15px-left display-inline-block"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$item->o_duration." ".trans('text.minute') }}</span>
                          <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                          <div class="author text_left_a">
                                   <img src="{{$item->aimg}}" alt="" class="border-radius-100" data-no-retina="">
                                 <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block">
                                     <a href="{{url($all_last_posts['lang'].'/author/'.$item->author_id)}}" class="text-medium-gray padding-left" >{{substr($item->name, 0, 2) .'. '. $item->lastname}}</a>
                                    </span>
                                    <div class="text_right_a">&nbsp;&nbsp;{{$item->date}}</div>
                              </div>
                        </div>
                    </div>
                </div>
@endforeach 


 
@endsection  

@section('xoragrer')
<ul class="blog-grid blog-3col gutter-large" style="position: relative; height: 1353.58px;">
            <li class="grid-sizer"></li>
       @for ($i = 0; $i < count($all_last_posts['xoragrer']); $i++)
                <li class="grid-item wow fadeInUp last-paragraph-no-margin" style="visibility: hidden; animation-name: fadeInUp; position: absolute; left: 0%; top: 0px;">
                        <div class="blog-post blog-post-style1">
 
                            <div class="blog-post-images overflow-hidden main_post_blur_narek">
                                <a href="{{url($all_last_posts['lang'].'/post/'.$all_last_posts['xoragrer'][$i][0]->id.'/'.$all_last_posts['xoragrer'][$i][0]->date.'/'.urlencode($all_last_posts['xoragrer'][$i][0]->title))}}">
                                    <img src="{{ $i===1 ? $all_last_posts['xoragrer'][$i][0]->thumb_img:$all_last_posts['xoragrer'][$i][0]->img}}" alt="" data-no-retina="">
                                </a>
                            </div>
                            <div class="post-details padding-15px40px-all bg-white sm-padding-20px-all">
                                <div class="blog-hover-color"></div>
                                <span class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">{{trans('text.xoragrer_items'.$i)}}</span>
                                
                                <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                                <a href="{{url($all_last_posts['lang'].'/post/'.$all_last_posts['xoragrer'][$i][0]->id.'/'.$all_last_posts['xoragrer'][$i][0]->date.'/'.urlencode($all_last_posts['xoragrer'][$i][0]->title))}}">
                               <span class="alt-font-title post-title text-medium text-extra-dark-gray">{{str_limit($all_last_posts['xoragrer'][$i][0]->title,40)}} </span>
                                </a>
                               <a  href="{{url($all_last_posts['lang'].'/post/'.$all_last_posts['xoragrer'][$i][0]->id.'/'.$all_last_posts['xoragrer'][$i][0]->date.'/'.urlencode($all_last_posts['xoragrer'][$i][0]->title))}}">
                                    <br/>
                                    <p>{!! $i===1 ? str_limit($all_last_posts['xoragrer'][$i][0]->long_text, 300):str_limit($all_last_posts['xoragrer'][$i][0]->short_text, 100)!!}</p></a>
                                    <span class="text-medium-gray text-extra-small pull-right padding-15px-left display-inline-block"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$all_last_posts['xoragrer'][$i][0]->p_duratioan." ".trans('text.minute') }}</span>
                                </div>
                        </div>
                </li>            
                @endfor   
</ul> 
@endsection
