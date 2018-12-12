 
@include('../includes.links' )
    <body> 
      
            @include('../includes.facebook_script' )

        <!-- start header -->
        <header class="sticky">
            @include('../includes.header')
        </header>

        <!-- end header -->
       
        <section class="section1">               
            <div class="container">
                <div class="row">  
                 <main class="col-md-7 col-sm-12 col-xs-12 left-sidebar1 pull-left xs-margin-5px-bottom no-padding-right sm-no-padding-left " id="narek_main_div_posts">
                   
                       @yield('main_post')
                                      
                    </main>
                    <!-- Vertical posts-->
                    <aside class="col-md-5 top-minus70-new mini col-sm-12 col-xs-12 pull-left no-padding-left" > 				   
                         
                            @yield('main_right')  
                                           
                     </aside>
                     <!--end Vertical posts-->
                  </div>
                 </div>

        </section>

         @yield('parallax')

         <section class="blog">		
            <div class="container">
                <div class="row">
                    <main class="col-md-9 col-sm-12 col-xs-12 left-sidebar pull-left sm-margin-60px-bottom xs-margin-40px-bottom padding-right sm-padding-left">
                       <!-- start post item --> 
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">
                        <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title xs-text-left"><a href="{{url($all_last_posts['lang'].'/opinions')}}" ><span>{{trans('text.opinions')}} <i class="fa fa-arrow-right"></i></span></a></div>
                                @yield('comments')                                              
                        </div>
                        <!-- end post item -->                      
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">
                        <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title xs-text-left"><span> {{trans('text.xoragrer')}}</span></div>
                            @yield('xoragrer')  
                        </div>  
                    </main>    
                    <aside class="col-md-3 col-sm-12 col-xs-12 pull-left">  

                       <div class="margin-45px-bottom xs-margin-25px-bottom">
                            @include('includes.mostVeiwed',$all_last_posts['mostViewed'])
                        </div>
                        
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                               @include('includes.tags') 
                        </div>
                        
                         <div class="text-center margin-45px-bottom xs-margin-25px-bottom">  
                                <div class="fb-page" data-href="https://www.facebook.com/Orbeli-Center-779924719032716/" data-tabs="timeline" data-width="263px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Orbeli-Center-779924719032716/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Orbeli-Center-779924719032716/">Orbeli Center</a></blockquote></div>   
                         </div>
                         <div class="text-center margin-45px-bottom xs-margin-25px-bottom">
                                <a class="twitter-timeline" data-width="100% " data-height="500px" href="https://twitter.com/OrbeliCenter?ref_src=twsrc%5Etfw" data-chrome="nofooter">Tweets by myarmenia2</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>	
                          </div>
                     
                    </aside>
                  
                </div>
            </div>
        </section>
    <section class="section1"  style="background-color: #d3d3d34a; animation-name: fadeIn;"> 
          <div class="container">
            <div class="row">
                 <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"  style="display:{{count($all_last_posts['main_video'])>0?'block':'none'}}"><a href="{{url($all_last_posts['lang'].'/videos')}}" ><span>{{trans('text.videos')}} <i class="fa fa-arrow-right"></i></span></a></div>   
                     <main class="col-md-8 col-sm-12 col-xs-12 left-sidebar1 pull-left no-padding-right sm-no-padding-left" id="main_video_narek_finish">
                            @yield('main_video')
                             </main>
                        <!-- Vertical videos-->  
                        <aside class="col-md-3 col-sm-12 col-xs-12 pull-left no-padding-right top-minus70-new"  style="display:{{count($all_last_posts['main_video'])>0?'block':'none'}}"> 				   
                         <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center no-padding-right">   
                            @yield('vertical_video')    
                             </div>                     
                         </aside>
                         <!--end Vertical videos-->                  
                    </div>
                </div>
            </section>
       
       
     @include('../includes.footer')        
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>            
          @include('../includes.scripts')
 
           {{-- <script src="/js/jquery.jscroll.min.js"></script>      
          <script type="text/javascript" src="/js/main.js"></script> --}}
		 <script src="/js/more_menu.js"></script>

{!!  $all_last_posts['event']->script() !!}
    </body>
</html>
