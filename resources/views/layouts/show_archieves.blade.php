@include('../includes.links' )
    <body>        
            @include('../includes.facebook_script')           
        <header>
            @include('includes.header')
        </header>
        <section class="visibl">
        <div class="container">
           <div class="row">     
                      <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom padding-left sm-padding-right">
                      
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-10px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp; height: 350px, display: <?php count($all_last_posts['post'])== 0 ?'none':''?>">
                               @yield('posts')
                                
                            </div>
                          
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-10px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;  height:350px,  display: <?php count($all_last_posts['videos'])== 0 ?'none':''?>">
                               @yield('videos')
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-10px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;  height:350px,  display: <?php count($all_last_posts['announcements'])== 0 ?'none':''?>">
                                @yield('announce')
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-10px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;  height:350px,  display: <?php count($all_last_posts['news'])== 0 ?'none':''?>">
                                @yield('news')
                            </div> 

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-10px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn " style="visibility: hidden; animation-name: fadeInUp;  height:350px,  display: <?php count($all_last_posts['opinions'])== 0 ?'none':''?>">
                                @yield('opinions')
                            </div>     
                    </main>
                        <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                         <div class="margin-45px-bottom xs-margin-25px-bottom">
                             @include('includes.mostVeiwed')
                            </div>
                             <div class="margin-45px-bottom xs-margin-25px-bottom">
                                     @include('includes.tags')
                             </div>
                                 
                             <div class="text-center margin-45px-bottom xs-margin-25px-bottom">  
                                <div class="fb-page" data-href="https://www.facebook.com/Orbeli-Center-779924719032716/" data-tabs="timeline" data-width="263px" data-small-header="false" data-adapt-container-width="true"  data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Orbeli-Center-779924719032716/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Orbeli-Center-779924719032716/">Orbeli Center</a></blockquote></div>   
                         </div>

                         <div class="text-center margin-45px-bottom xs-margin-25px-bottom">
                                <a class="twitter-timeline" data-width="100% " data-height="500px" href="https://twitter.com/OrbeliCenter?ref_src=twsrc%5Etfw" data-chrome="nofooter">Tweets by myarmenia2</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>	
                          </div>
                     
                      
                        </aside>
                </div>
            </div>
        </div>
<!-- start scroll to top -->
<a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
<!-- end scroll to top  -->
<!-- javascript libraries -->

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/modernizr.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/js/skrollr.min.js"></script>
<script type="text/javascript" src="/js/smooth-scroll.js"></script>
<script type="text/javascript" src="/js/jquery.appear.js"></script>
<!-- menu navigation -->
<script type="text/javascript" src="/js/bootsnav.js"></script>
<script type="text/javascript" src="/js/jquery.nav.js"></script>
<!-- animation -->
<script type="text/javascript" src="/js/wow.min.js"></script>
<!-- page scroll -->
<script type="text/javascript" src="/js/page-scroll.js"></script>
<!-- swiper carousel -->
<script type="text/javascript" src="/js/swiper.min.js"></script>
<!-- counter -->
<script type="text/javascript" src="/js/jquery.count-to.js"></script>
<!-- parallax -->
<script type="text/javascript" src="/js/jquery.stellar.js"></script>
<!-- magnific popup -->
<script type="text/javascript" src="/js/jquery.magnific-popup.min.js"></script>
<!-- portfolio with shorting tab -->
<script type="text/javascript" src="/js/isotope.pkgd.min.js"></script>
<!-- images loaded -->
<script type="text/javascript" src="/js/imagesloaded.pkgd.min.js"></script>
<!-- pull menu -->
<script type="text/javascript" src="/js/classie.js"></script>
<script type="text/javascript" src="/js/hamburger-menu.js"></script>
<!-- counter  -->
<script type="text/javascript" src="/js/counter.js"></script>
<!-- fit video  -->
<script type="text/javascript" src="/js/jquery.fitvids.js"></script>
<!-- equalize -->
<script type="text/javascript" src="/js/equalize.min.js"></script>
<!-- skill bars  -->
<script type="text/javascript" src="/js/skill.bars.jquery.js"></script> 
<!-- justified gallery  -->
<script type="text/javascript" src="/js/justified-gallery.min.js"></script>
<!--pie chart-->
<script type="text/javascript" src="/js/jquery.easypiechart.min.js"></script>
<!-- instagram -->
<script type="text/javascript" src="/js/instafeed.min.js"></script>
<!-- retina -->
<script type="text/javascript" src="/js/retina.min.js"></script>
<!-- revolution -->
<script type="text/javascript" src="/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.parallax.min.js"></script> 

<script src="/js/jquery.jscroll.min.js"></script>      
<script type="text/javascript" src="/js/main.js"></script>
<script src='/js/lib/moment.min.js'></script>
<script src='/js/fullcalendar.min.js'></script>
<script src='/js/locale-all.js'></script>
<script src="/js/calen.js"></script>  
 <script src="/js/more_menu.js"></script>
{!!  $all_last_posts['event']->script() !!}

</body>
</html>
