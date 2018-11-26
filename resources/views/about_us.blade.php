 
@include('../includes.links' )
<body> 
  
        @include('../includes.facebook_script' )

    <!-- start header -->
    <header>
     @include('../includes.header' )
     </header>

    <!-- end header -->
   
            {{-- @foreach ($all_last_posts['about_us'] as $item)
            <section class="section1">               
                <div class="container">
                    <div class="row">  
                    
                      </div>
                     </div>
        
            </section>
            <section class="no-padding wow fadeIn bg-extra-dark-gray1" style="visibility: hidden; animation-name: fadeIn;">
                    <div class="container-fluid no-padding">
                        <div class="row equalize no-margin">
                            <div class="col-md-6 col-sm-12 col-xs-12 position-relative sm-height-500px xs-height-350px cover-background wow fadeInLeft" style="background-image: url(/images/homepage-9-parallax-img4.jpg);  animation-name: fadeInLeft; height: 696px;">
                                <div class="opacity-extra-medium bg-extra-dark-gray"></div>
                               <!-- <div class="bg-deep-pink width-50 text-center text-white padding-ten-all absolute-middle-center z-index-5 md-width-70 xs-width-85 xs-padding-twelve-tb xs-padding-five-lr">
                                    <h6 class="font-weight-300 no-margin-bottom">Վերլուծական-հետազոտական կենտրոն</h6>
                                </div>-->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 display-table wow fadeInRight last-paragraph-no-margin sm-text-center" style=" animation-name: fadeInRight; height: 696px;">
                                <div class="display-table-cell vertical-align-middle padding-fifteen-all md-padding-ten-all sm-padding-90px-all xs-text-center xs-no-padding-lr xs-padding-40px-tb">
                                    
                                    <h4 class="alt-font text-light-gray">{{$item->title}}</h4>
                                    <p class="text-extra-large width-85 md-width-100">
                                        {{$item->html_code}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section1">               
                        <div class="container">
                            <div class="row">  
                            
                              </div>
                             </div>
                
                    </section>
        
            @endforeach --}}
            <section class="wow fadeIn cover-background background-position-top top-space" style="background-image: url('/storage/parralax/1/homepage-3-slider-img-3.jpg'); margin-top: 72px; visibility: visible; animation-name: fadeIn;">
                <div class="opacity-medium bg-extra-dark-gray"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                            <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                                <!-- start sub title -->
                                <span class="display-block text-white opacity6 alt-font margin-5px-bottom">{{trans("text.footer_first")}}</span>
                                <!-- end sub title -->
                                <!-- start page title -->
                                <h1 class="alt-font text-white font-weight-600 no-margin-bottom">{{trans("text.about_us")}}</h1>
                                <!-- end page title -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- @foreach ($all_last_posts['post_count'] as $item)
                <p style="display: none"> {{$item->id}} </p>
            @endforeach --}}
            
         {{-- <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <div class="container">
                    <div class="row">
                        <!-- start counter item -->
                        <div class="col-md-4 col-sm-6 col-xs-12 sm-margin-five-bottom sm-padding-ten-left xs-padding-15px-left xs-margin-30px-bottom text-center wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
                            <h5 class="text-extra-dark-gray font-weight-600 no-margin timer  alt-font appear" data-speed="2000" data-to="{{$all_last_posts['post_count']}}">{{$all_last_posts['post_count']}}</h5>
                            <span class="display-block margin-three-bottom">{{trans("text.about_us_first_icon_text")}}</span>
                            <div class="separator-line-verticle-large bg-deep-pink display-inline-block"></div>
                        </div>
                        <!-- end counter item -->
                        <!-- start counter item -->
                        <div class="col-md-4 col-sm-6 col-xs-12 sm-margin-five-bottom sm-padding-ten-left xs-padding-15px-left xs-margin-30px-bottom text-center wow fadeInDown" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">
                            <h5 class="text-extra-dark-gray font-weight-600 no-margin timer  alt-font appear" data-speed="2000" data-to="{{$all_last_posts['author_count']}}">{{$all_last_posts['author_count']}}</h5>
                            <span class="display-block margin-three-bottom">{{trans("text.about_us_second_icon_text")}}</span>
                            <div class="separator-line-verticle-large bg-deep-pink display-inline-block"></div>
                        </div>
                        <!-- end counter item -->
                        <!-- start counter item -->
                        <div class="col-md-4 col-sm-6 col-xs-12 xs-margin-seven-bottom sm-padding-ten-left xs-padding-15px-left xs-margin-30px-bottom text-center  wow fadeInDown" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
                            <h5 class="text-extra-dark-gray font-weight-600 no-margin timer  alt-font appear" data-speed="2000" data-to="{{$all_last_posts['sum_views']}}">{{$all_last_posts['sum_views']}}</h5>
                            <span class="display-block margin-three-bottom">{{trans("text.about_us_third_icon_text")}}</span>
                            <div class="separator-line-verticle-large bg-deep-pink display-inline-block"></div>
                        </div>

                    </div>
                </div>            
            </section> --}}

            <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;background-color: #fff" id="about_us_section_narek">
                <div class="container">
                    <div class="row">
                        <!-- start counter item-->
                        <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-five-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="counter-feature-box-1 display-table width-100 padding-5px-all">
                                <div class="counter-box display-table-cell vertical-align-middle bg-white">
                                    <i class="fa fa-folder icon-medium text-medium-gray margin-15px-bottom"></i>
                                    <h6 class="display-block font-weight-600 text-extra-dark-gray alt-font no-margin-bottom timer appear" data-speed="2000" data-to="{{$all_last_posts['post_count']}}">{{$all_last_posts['post_count']}}</h6>
                                    <span>Posts</span>
                                </div>
                            </div>
                        </div>
                        <!-- end counter item-->
                        <!-- start counter item-->
                        <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-five-bottom xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="counter-feature-box-1 display-table width-100 padding-5px-all">
                                <div class="counter-box display-table-cell vertical-align-middle bg-white">
                                    <i class="fa fa-user icon-medium text-medium-gray margin-15px-bottom"></i>
                                    <h6 class="display-block font-weight-600 text-extra-dark-gray alt-font no-margin-bottom timer appear" data-speed="2000" data-to="{{$all_last_posts['author_count']}}">{{$all_last_posts['author_count']}}</h6>
                                    <span>Authors</span>
                                </div>
                            </div>
                        </div>
                        <!-- end counter item-->
                        <!-- start counter item-->
                        <div class="col-md-4 col-sm-6 col-xs-12 text-center xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="counter-feature-box-1 display-table width-100 padding-5px-all">
                                <div class="counter-box display-table-cell vertical-align-middle bg-white">
                                    <i class="fa fa-eye icon-medium text-medium-gray margin-15px-bottom"></i>
                                    <h6 class="display-block font-weight-600 text-extra-dark-gray alt-font no-margin-bottom timer appear" data-speed="2000" data-to="{{$all_last_posts['sum_views']}}">{{$all_last_posts['sum_views']}}</h6>
                                    <span>Views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </section>

            @foreach ($all_last_posts['about_us'] as $item)
            <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image: url(/images/about_us_image.jpg); background-position: 0px 78.9375px; visibility: visible; animation-name: fadeIn;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                            <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase">Mer Masin</h5>
                            <p>kardaceq mer masin</p>
                        </div>  
                    </div>
                    <div class="row equalize">                   
                        <!-- start features box -->
                        <div class="col-md-4 col-sm-4 col-xs-12 sm-margin-four-bottom last-paragraph-no-margin xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 436px;">
                            <div class="bg-white text-center">
                                <img src="/storage/parralax/1/homepage-3-slider-img-3.jpg" alt="" data-no-retina="">
                                <div class="padding-45px-all sm-padding-15px-all inner-match-height">
                                    <span class="text-extra-dark-gray font-weight-600 display-block alt-font margin-10px-bottom">Understand the situation</span>
                                    <p>Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box -->
                        <!-- start features box -->
                        <div class="col-md-4 col-sm-4 col-xs-12 sm-margin-four-bottom last-paragraph-no-margin xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp; height: 436px;">
                            <div class="bg-white text-center">
                                <a href="services-simple.html"><img src="/storage/parralax/1/homepage-3-slider-img-3.jpg" alt="" data-no-retina=""></a>
                                <div class="padding-45px-all sm-padding-15px-all inner-match-height">
                                    <span class="text-extra-dark-gray font-weight-600 display-block alt-font margin-10px-bottom">Bring the experience to life</span>
                                    <p>Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box -->
                        <!-- start features box -->
                        <div class="col-md-4 col-sm-4 col-xs-12 sm-margin-four-bottom last-paragraph-no-margin xs-no-margin-bottom wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp; height: 436px;">
                            <div class="bg-white text-center">
                                <a href="services-simple.html"><img src="/storage/parralax/1/homepage-3-slider-img-3.jpg" alt="" data-no-retina=""></a>
                                <div class="padding-45px-all sm-padding-15px-all inner-match-height">
                                    <span class="text-extra-dark-gray font-weight-600 display-block alt-font margin-10px-bottom">Strategise chart the course</span>
                                    <p>Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box -->
                    </div>
                </div>
            </section>
            @endforeach

            <section class="parallax wow fadeIn" data-stellar-background-ratio="0.3" style="background-image: url(/images/about_us_video_image.jpg); background-position: 0px 48.7406px; visibility: visible; animation-name: fadeIn;">
                <div class="opacity-extra-medium bg-black"></div>
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-8 text-center center-col last-paragraph-no-margin">
                            <a href="https://www.youtube.com/watch?v=nrJtHemSPW4" class="popup-youtube"><img src="/images/about_us_play_video.png" class="width-130px" alt="" data-no-retina=""></a>
                            <h3 class="alt-font text-white font-weight-600">Take quick overview of awesome features</h3>
                            <p class="text-small text-uppercase letter-spacing-2 alt-font text-light-gray display-inline-block">Web development services</p>
                        </div>
                    </div>
                </div>
            </section>
         
            @foreach ($all_last_posts['about_us'] as $item)
            <section class="wow fadeIn  animated animated" style="text-align:center;visibility: hidden; animation-name: fadeIn">
                <div class="container"> 
                    <div class="row">
                        <h4 class="alt-font text-gray">{{$item->title}}</h4>
                        <p>
                            {!!$item->html_code!!}
                        </p>
                    </div>
                </div>
            </section>

            @endforeach
    
   
 @include('../includes.footer')        
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
      @include('../includes.scripts')
</body>
</html>
