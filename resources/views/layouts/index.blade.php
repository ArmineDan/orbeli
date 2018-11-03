 
@include('../includes.links' )
    <body> 
      
            @include('../includes.facebook_script' )

        <!-- start header -->
        <header>
         @include('../includes.header' )
         </header>

        <!-- end header -->
       
        <section class="section1"> 
              
            <div class="container">
                <div class="row">
                  
                 <main class="col-md-8 col-sm-12 col-xs-12 left-sidebar1 pull-left sm-margin-60px-bottom xs-margin-40px-bottom no-padding-right sm-no-padding-left">
                    @yield('main_post')
                </main>

                    <!-- Vertical posts-->
                    <aside class="col-md-4 col-sm-12 col-xs-12 pull-left no-padding-right" > 				   
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center no-padding-right">   
                            @yield('main_right')  
                         </div>                     
                     </aside>
                     <!--end Vertical posts-->
                </div>
            </div>
        </section>

         @yield('parallax')

         <section class="blog">		
            <div class="container">
                <div class="row">
                    <main class="col-md-9 col-sm-12 col-xs-12 left-sidebar pull-left sm-margin-60px-bottom xs-margin-40px-bottom no-padding-right sm-no-padding-left">
                       <!-- start post item --> 
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">
                         <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><a href="#" ><span>Կարծիքներ <i class="fa fa-share"></i></span></a></div>
                                @yield('comments')                                              
                        </div>
                        <!-- end post item -->
                        <!-- start pagination -->
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center  wow fadeInUp" style="padding: 44px;">
                                           
                           
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">
                                <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Խորագրեր</span></div>
                                  
                                @yield('blog')
                                                        
                               </div>
                             
                        <!-- end pagination -->
                    </main>
    
                    <aside class="col-md-3 col-sm-12 col-xs-12 pull-left">
                           
                       <div class="margin-45px-bottom xs-margin-25px-bottom">
                            @include('includes.mostVeiwed',$all_last_posts['mostViewed'])
                        </div>
                        
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                                {{-- @include('includes.tags') --}}
                        </div>

                          <div class="text-center margin-45px-bottom xs-margin-25px-bottom">
                                <div class="fb-page" data-href="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/"  data-height="500px" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/">Isabelle Dupont In Yerevan</a></blockquote></div>	</span>
                         </div>      
                         <div class="text-center margin-45px-bottom xs-margin-25px-bottom">
                                <a class="twitter-timeline" data-width="100% " data-height="500px" href="https://twitter.com/myarmenia2?ref_src=twsrc%5Etfw">Tweets by myarmenia2</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>	
                          </div>
                     
                    </aside>
                  
                </div>
            </div>
        </section>
        <section class="section1"  style="background-color: #d3d3d34a; animation-name: fadeIn;"> 
              
                <div class="container">
                    <div class="row">
                         <div class="container">
                    <div class="row">
                            
                        
                    <div class="col-md-12 text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Տեսանյութեր <i class="fa fa-external-link" aria-hidden="true"></i></span></a></span></div>
                          
                      
                     <main class="col-md-9 col-sm-12 col-xs-12 left-sidebar1 pull-left sm-margin-60px-bottom xs-margin-40px-bottom no-padding-right sm-no-padding-left">
                           
                           @yield('main_video')
                           {{-- @yield('horizontal_post')   --}}
    
                         
                        </main>
                        <!-- Vertical posts-->  
                        <aside class="col-md-3 col-sm-12 col-xs-12 pull-left no-padding-right" > 				   
                         <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center no-padding-right">   
    
                                @yield('vertical_video')
    
                             </div>                     
                         </aside>
                         <!--end Vertical posts-->
                      </div>
                   </div>
                    </div>
                </div>
            </section>i
       
        <!--<section class="wow fadeIn" style="background-color: #d3d3d34a; animation-name: fadeIn;">
                <div class="container">
                    <div class="row">
                        
                            <div class="col-md-12 text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Տեսանյութեր</span></div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12 fit-videos text-center sm-margin-30px-bottom">
                            
                            <div class="fluid-width-video-wrapper" style="padding-top: 56.25%;"><iframe src="https://player.vimeo.com/video/99585787?color=bb9b44&amp;title=0&amp;byline=0&amp;portrait=0" id="fitvid0"></iframe></div>
                            
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 text-center fit-videos  padding-15px-bottom sm-margin-30px-bottom ">
                         
                            <div class="fluid-width-video-wrapper" style="padding-top: 56.25%;"><iframe src="https://www.youtube.com/embed/sU3FkzUKHXU?rel=0&amp;showinfo=0" allowfullscreen="" id="fitvid0"></iframe></div>
                           
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 text-center fit-videos padding-15px-bottom sm-margin-30px-bottom">
                            
                            <div class="fluid-width-video-wrapper" style="padding-top: 56.25%;"><iframe src="https://www.youtube.com/embed/sU3FkzUKHXU?rel=0&amp;showinfo=0" allowfullscreen="" id="fitvid0"></iframe></div>
                           
                        </div>
                    </div>
                </div>
            </section>-->

     @include('../includes.footer')        
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
          @include('../includes.scripts')
    </body>
</html>
