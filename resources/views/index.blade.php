@extends('layouts.index')

@section('main_post')


<div class="col-md-12 col-sm-12 col-xs-12 blog-post-content  xs-margin-30px-bottom xs-text-center">
    <a href="{{$all_last_posts['main_post'][0]->date}}\{{$all_last_posts['main_post'][0]->title}}" class="blog-image"><img src="{{$all_last_posts['main_post'][0]->img}}" alt="" data-no-retina=""></a>
    <div class="blog-text titel_new display-inline-block ">
        <div class="content padding-19px-all xs-padding-20px-all">
            <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase alt-font"><span>{{$all_last_posts['main_post'][0]->date }}</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span><a href="blog-grid.html" class="text-medium-gray ">{{$all_last_posts['main_post'][0]->name .' '. $all_last_posts['main_post'][0]->lastname}}</a></span></div>
            <a href="{{$all_last_posts['main_post'][0]->date}}\{{$all_last_posts['main_post'][0]->title}}" class="text-extra-dark-gray text-uppercase  alt-font text-large font-weight-600 margin-15px-bottom display-block">{{$all_last_posts['main_post'][0]->title}}</a>
        </div>
    </div>
</div>
        
@endsection
@section('main_right')


<ul class="latest-post position-relative">
        @foreach ($all_last_posts['main_right'] as $item)                             
        <li class="aa">
          <figure>
         <a href="{{url($all_last_posts['lang'].'/post/'.$item->date.'/'.$item->title)}}">
            <img  src="/{{$item->img}}" alt="" data-no-retina=""></a>
                </figure>
                <div class="display-table-cell vertical-align-top text-small">
                    <a href="{{url($all_last_posts['lang'].'/post/'.$item->date.'/'.$item->title)}}" class="text-extra-dark-gray">
                        <span class="display-inline-block margin-5px-bottom">{{$item->title}}</span></a> 
                        <span class="clearfix text-medium-gray text-small">{{substr($item->name, 0, 2) .'. '. $item->lastname}}</span></div>
            </li>
        @endforeach                            
    
</ul>
        
@endsection


@section('main_video')
<div class="col-md-12 col-sm-12 col-xs-12 blog-post-content  xs-margin-30px-bottom xs-text-center">
    <a href="{{$all_last_posts['main_video'][0]->date}}\{{$all_last_posts['main_video'][0]->title}}" class="blog-image"><img src="{{$all_last_posts['main_video'][0]->img}}" alt="" data-no-retina=""></a>
    <div class="blog-text tite2_new display-inline-block ">
        <div class="content padding-19px-all xs-padding-20px-all">
            <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase alt-font">
                <span>
                        <span><a href="blog-grid.html" class="text-medium-gray ">{{$all_last_posts['main_video'][0]->name .' '. $all_last_posts['main_video'][0]->lastname}}</a></span>
                        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i> 
                {{$all_last_posts['main_video'][0]->duration }}</span></div>
            <a href="{{$all_last_posts['main_video'][0]->date}}\{{$all_last_posts['main_video'][0]->title}}" class="text-extra-dark-gray text-uppercase  alt-font text-large font-weight-600 margin-15px-bottom display-block">{{$all_last_posts['main_video'][0]->title}}</a>
        </div>
    </div>
</div>
@endsection

@section('vertical_video')
            @foreach ($all_last_posts['vert'] as $item)
            <div class="col-md-12 col-sm-12col-xs-12 col-xs-12  sm-margin-50px-bottom xs-margin-30px-bottom wow no-padding" style="visibility: visible;animation-name: fadeIn;  height:302px;">
                <div class="blog-post blog-post-style1">
                    <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                        <a class="video-link-davo" href="{{url('post/'.$item->date.'/'.$item->title)}}">
                            <img src="{{$item->img}}" class="davo-blur" alt="" data-no-retina="">
                            <div class="play-davo">
                                <i class="fa fa-play-circle"></i>
                            </div>   
                        </a>
                    </div>
                    <div class="author">
                            <span  class="post-title text-medium text-extra-dark-gray width-100 display-block md-width-100">{{$item->title}}
                            </span> 
                            
                      <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block">
                        <a href="{{url('post/'.$item->date.'/'.$item->title)}}" class="text-medium-gray">{{$item->name .' '. $item->lastname}}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i> {{$item->duration}}</span>
                </div>
                   
                </div>
            </div>
            @endforeach  
        
@endsection



@section('parallax')

<section class="mine00 wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image: url(&quot;images/parallax-bg39.jpg&quot;); background-position: 0px 0px; visibility: visible; animation-name: fadeIn;">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center">
                   
                    
                    <a href="#">
                            <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">ՕՐԲԵԼԻ</h1>
                     <span class="text-white opacity6 alt-font" style="font-size:25px"> վերլուծական-հետազոտական կենտրոն</span></a> 
                </div>
            </div>
        </div>
    </div>
</section>      
  
    
@endsection


@section('comments')

<div class="infinite-scroll wow fadeIn"> 
 
@foreach ($all_last_posts['opinions'] as $item)
            <div class="xoragir_d col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                    <div class="blog-post blog-post-style1">
                        <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                            <a href="{{url('post/'.$item->date.'/'.$item->title)}}">
                                <img src="/{{$item->oimg}}" alt="" data-no-retina="">
                            </a>
                        </div>
                        <div class="post-details">
                            <a href="{{url('post/'.$item->date.'/'.$item->title)}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն  </a>
                            <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                            <div class="author">
                                    <span class="text-medium-gray  text-extra-small pull-right padding-15px-left display-inline-block"><i class="fa fa-eye"></i>10 ր.</span>
                                  <img src="/{{$item->aimg}}" alt="" class="border-radius-100" data-no-retina="">
                                   <span class="text-medium-gray text-uppercase text-extra-small  display-inline-block"><a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a>&nbsp;&nbsp;|&nbsp;&nbsp;13-06-2017</span>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach 

</div>

@endsection

@section('xoragrer')
<ul class="blog-grid blog-3col gutter-large" style="position: relative; height: 1353.58px;">
    <li class="grid-sizer"></li>
    <!-- start post item --> 
    <li class="grid-item wow fadeInUp last-paragraph-no-margin" style="visibility: visible; animation-name: fadeInUp; position: absolute; left: 0%; top: 0px;">
        <div class="blog-post">
            <div class="blog-post-images overflow-hidden">
                <a href="#">
                    <img src="images/blog-img62.jpg" alt="" data-no-retina="">
                </a>
             </div>
            <div class="post-details padding-15px40px-all bg-white sm-padding-20px-all">
                <div class="blog-hover-color"></div>
                <a href="#" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Քաղաքականություն</a>
                
                <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                <p>Ըստ Ջորջ Բալանդիերի,  հոմո պիլիտիկուսի շրջանակում:
          Մարդաբանները  չորս պարզ տեսակներ</p>
            </div>
        </div>
    </li>
    <!-- end post item --> 
    <!-- start post item --> 
    <li class="grid-item wow fadeInUp last-paragraph-no-margin" style="visibility: visible; animation-name: fadeInUp; position: absolute; left: 33.2479%; top: 0px;">
        <div class="blog-post">
            <div class="blog-post-images overflow-hidden">
                <a href="#">
                    <img src="images/blog-img63.jpg" alt="" data-no-retina="">
                </a>
            </div>
            <div class="post-details padding-15px40px-all  bg-white sm-padding-20px-all">
                <div class="blog-hover-color"></div>
                <a href="#" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Տնտեսություն</a>
               
                <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                <p> 20-րդ դարի կեսերին տեղեկատվության դերի ու ծավալի աճին,
                        ինչպես նաև տեղեկատվական տեխնոլոգիաների զարգացմանը զուգահեռ՝
                         ավելացել են նաև տեղեկատվական անվտանգության սպառնալիքները, 20-րդ դարի կեսերին տեղեկատվության դերի ու ծավալի աճին,
                        
                           ավելացել են նաև տեղեկատվական անվտանգության սպառնալիքները,   </p>
            </div>
        </div>
    </li>
    <!-- end post item --> 
    <!-- start post item --> 
    <li class="grid-item wow fadeInUp last-paragraph-no-margin" style="visibility: visible; animation-name: fadeInUp; position: absolute; left: 66.5812%; top: 0px;">
        <div class="blog-post">
            <div class="blog-post-images overflow-hidden">
                <a href="#">
                    <img src="images/blog-img64.jpg" alt="" data-no-retina="">
                </a>
            </div>
            <div class="post-details padding-15px40px-all  bg-white sm-padding-20px-all">
                <div class="blog-hover-color"></div>
                <a href="#" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Անվտանգություն</a>
               
                <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                <p>Ըստ Ջորջ Բալանդիերի,  հոմո պիլիտիկուսի շրջանակում:
                        Մարդաբանները  չորս պարզ տեսակներ</p>
            </div>
        </div>
    </li>
    <!-- end post item --> 
    <!-- start post item --> 
   <li class="grid-item wow fadeInUp last-paragraph-no-margin" style="visibility: visible; animation-name: fadeInUp; position: absolute; left: 66.5812%; top: 599px;">
        <div class="blog-post">
            <div class="blog-post-images overflow-hidden">
                <a href="#">
                    <img src="images/blog-img67.jpg" alt="" data-no-retina="">
                </a>
           </div>
            <div class="post-details padding-15px40px-all  bg-white sm-padding-20px-all">
                <div class="blog-hover-color"></div>
                <a href="#" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Տարածաշրջանային</a>
                
                <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                <p>Ըստ Ջորջ Բալանդիերի,  հոմո պիլիտիկուսի շրջանակում:
                        Մարդաբանները  չորս պարզ տեսակներ</p>    </div>
        </div>
    </li>
    <!-- end post item --> 
    <!-- start post item --> 
   
    <!-- end post item --> 
    <!-- start post item --> 
    <li class="grid-item wow fadeInUp last-paragraph-no-margin" style="visibility: visible; animation-name: fadeInUp; position: absolute; left: 0%; top: 623px;">
        <div class="blog-post">
            <div class="blog-post-images overflow-hidden">
                <a href="#">
                    <img src="images/blog-img70.jpg" alt="" data-no-retina="">
                </a>
            </div>
            <div class="post-details padding-15px40px-all  bg-white sm-padding-20px-all">
                <div class="blog-hover-color"></div>
                <a href="#" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Միջազգային</a>
               
                <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                <p>Ըստ Ջորջ Բալանդիերի,  հոմո պիլիտիկուսի շրջանակում:
                        Մարդաբանները  չորս պարզ տեսակներ</p>  </div>
        </div>
    </li>
    <!-- end post item --> 
   
 
</ul>
    
@endsection
