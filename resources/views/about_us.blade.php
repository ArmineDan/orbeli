 
@include('../includes.links' )
<body> 
  
        @include('../includes.facebook_script' )

    <header>
     @include('../includes.header' )
     </header>

        @foreach ($all_last_posts['about_us'] as $item)
            <section class="wow fadeIn cover-background background-position-top top-space" style="background-image: url({{$item->first_section_img}}); margin-top: 72px; visibility: visible; animation-name: fadeIn;">
                <div class="opacity-medium bg-extra-dark-gray"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                            <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                                <span class="display-block text-white opacity6 alt-font margin-5px-bottom">{{trans("text.footer_first")}}</span>
                                <h1 class="alt-font text-white font-weight-600 no-margin-bottom">{{trans("text.about_us")}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;background-color: #fff" id="about_us_section_narek">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-five-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="counter-feature-box-1 display-table width-100 padding-5px-all">
                                <div class="counter-box display-table-cell vertical-align-middle bg-white">
                                    <i class="fa fa-folder icon-medium text-medium-gray margin-15px-bottom"></i>
                                    <h6 class="display-block font-weight-600 text-extra-dark-gray alt-font no-margin-bottom timer appear" data-speed="2000" data-to="{{$all_last_posts['post_count']}}">{{$all_last_posts['post_count']}}</h6>
                                    <span> {{trans('text.about_us_first_icon_text')}} </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-five-bottom xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="counter-feature-box-1 display-table width-100 padding-5px-all">
                                <div class="counter-box display-table-cell vertical-align-middle bg-white">
                                    <i class="fa fa-user icon-medium text-medium-gray margin-15px-bottom"></i>
                                    <h6 class="display-block font-weight-600 text-extra-dark-gray alt-font no-margin-bottom timer appear" data-speed="2000" data-to="{{$all_last_posts['author_count']}}">{{$all_last_posts['author_count']}}</h6>
                                    <span> {{trans('text.about_us_second_icon_text')}} </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-6 col-xs-12 text-center xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="counter-feature-box-1 display-table width-100 padding-5px-all">
                                <div class="counter-box display-table-cell vertical-align-middle bg-white">
                                    <i class="fa fa-eye icon-medium text-medium-gray margin-15px-bottom"></i>
                                    <h6 class="display-block font-weight-600 text-extra-dark-gray alt-font no-margin-bottom timer appear" data-speed="2000" data-to="{{$all_last_posts['sum_views']}}">{{$all_last_posts['sum_views']}}</h6>
                                    <span> {{trans('text.about_us_third_icon_text')}} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </section>

            <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image: url('/storage/about_uses/parallax-bg18.jpg'); background-position: 0px 143.938px; visibility: visible; animation-name: fadeIn;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                            <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase">{{$item->parallax_title}}</h5>
                            <p>{{$item->parallax_text}}</p>
                        </div>  
                    </div>
                    <div class="row equalize">                   
                        
                        <div class="col-md-4 col-sm-4 col-xs-12 sm-margin-four-bottom last-paragraph-no-margin xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 436px;">
                            <div class="bg-white text-center">
                                <a href="services-simple.html"><img src="{{$item->parallax_first_box_img}}" alt="" data-no-retina=""></a>
                                <div class="padding-45px-all sm-padding-15px-all inner-match-height">
                                    <span class="text-extra-dark-gray font-weight-600 display-block alt-font margin-10px-bottom">{{$item->parallax_first_box_title}}</span>
                                    <p> {{$item->parallax_first_box_text}} </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-12 sm-margin-four-bottom last-paragraph-no-margin xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp; height: 436px;">
                            <div class="bg-white text-center">
                                <a href="services-simple.html"><img src="{{$item->parallax_first_box_img}}" alt="" data-no-retina=""></a>
                                <div class="padding-45px-all sm-padding-15px-all inner-match-height">
                                    <span class="text-extra-dark-gray font-weight-600 display-block alt-font margin-10px-bottom">{{$item->parallax_second_box_title}}</span>
                                    <p> {{$item->parallax_second_box_text}} </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-12 sm-margin-four-bottom last-paragraph-no-margin xs-no-margin-bottom wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp; height: 436px;">
                            <div class="bg-white text-center">
                                <a href="services-simple.html"><img src="{{$item->parallax_first_box_img}}" alt="" data-no-retina=""></a>
                                <div class="padding-45px-all sm-padding-15px-all inner-match-height">
                                    <span class="text-extra-dark-gray font-weight-600 display-block alt-font margin-10px-bottom">{{$item->parallax_third_box_title}}</span>
                                    <p> {{$item->parallax_third_box_text}} </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
    
            <section class="parallax wow fadeIn" data-stellar-background-ratio="0.3" style="background-image: url({{$item->video_img}}); background-position: 0px 127.641px; visibility: visible; animation-name: fadeIn;">
                <div class="opacity-extra-medium bg-black"></div>
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-8 text-center center-col last-paragraph-no-margin">
                            <a href="{{$item->video_url}}" class="popup-youtube"><img src="/storage/about_uses/icon-play.png" class="width-130px" alt="" data-no-retina=""></a>
                            <h3 class="alt-font text-white font-weight-600">{{$item->video_text}}</h3>
                        </div>
                    </div>
                </div>
            </section>

            <section class="wow fadeIn container">
                <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase text-center"> {{$item->end_title}} </h5>
                <p class="width-90 margin-lr-auto xs-width-100">
                    {!!$item->end_text!!}
                </p>
            </section>
            @endforeach
  
 @include('../includes.footer')        
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
      @include('../includes.scripts')
	   <script src="/js/more_menu.js"></script>

{!!  $all_last_posts['event']->script() !!}
        
</body>
</html>
