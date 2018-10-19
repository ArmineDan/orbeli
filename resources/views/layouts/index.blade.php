
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Orbeli Analitical Research</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="">
        <!-- description -->
        <meta name="description" content="">
        <!-- keywords -->
        <meta name="keywords" content="">
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        <!-- animation -->
        <link rel="stylesheet" href="/css/animate.css" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <!-- et line icon --> 
        <link rel="stylesheet" href="/css/et-line-icons.css" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <!-- themify icon -->
        <link rel="stylesheet" href="/css/themify-icons.css">
        <!-- swiper carousel -->
        <link rel="stylesheet" href="/css/swiper.min.css">
        <!-- justified gallery  -->
        <link rel="stylesheet" href="/css/justified-gallery.min.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="/css/magnific-popup.css" />
        <!-- revolution slider -->
        <link rel="stylesheet" type="text/css" href="/revolution/css/settings.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="/revolution/css/navigation.css">
        <!-- bootsnav -->
        <link rel="stylesheet" href="/css/bootsnav.css">
        <!-- style -->
        <link rel="stylesheet" href="/css/style.css" />
        <!-- responsive css -->
        <link rel="stylesheet" href="/css/responsive.css" />
        <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v3.1&appId=161407021204454&autoLogAppEvents=1';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <!-- start header -->
        <header>
         @include('../includes.header', $all_last_posts['menu'] )
         </header>
        <!-- end header -->
        <section class="section1">               
            <div class="container">
                <div class="row">
                 <div class="container">
                <div class="row">
                  
                 <main class="col-md-9 col-sm-12 col-xs-12 left-sidebar1 pull-left sm-margin-60px-bottom xs-margin-40px-bottom no-padding-right sm-no-padding-left">
                   
                       @yield('main_post')

                      <!-- horizontal posts-->
                        <div class="col-md-11 col-sm-12 col-xs-12 blog-post-content xs-text-center no-padding-right">                          
                           
                            @yield('vertical_post')  

                        </div> 
                        <!-- horizontal posts-->
                    </main>
                    <!-- Vertical posts-->
                    <aside class="col-md-3 col-sm-12 col-xs-12 pull-left no-padding-right" > 				   
                     <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center no-padding-right">   

                            @yield('horizontal_post')

                         </div>                     
                     </aside>
                     <!--end Vertical posts-->  
                  </div>
               </div>
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
                         <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Կարծիքներ</span></div>
                                @yield('comments')                                              
                        </div>
                        <!-- end post item -->
                        <!-- start pagination -->
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center  wow fadeInUp" style="padding: 44px;visibility: visible;">
                           
                                    <button type="submit" class="bg-transparent  btn position-absolute right-0 top-1">
                                    Ավելացնել <i class="fa fa-plus-circle"> </i></button>
                         
                           
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">
                                <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Թեմաներ</span></div>
                                  
                                @yield('blog')
                                                        
                               </div>
                             
                        <!-- end pagination -->
                    </main>
    
                    <aside class="col-md-3 col-sm-12 col-xs-12 pull-left">
                     
                    
                       <div class="margin-45px-bottom xs-margin-25px-bottom">
                            @include('includes.mostVeiwed',$all_last_posts['mostViewed'])
                        </div>
                        
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                                @include('includes.tags')
                        </div>

                          <div class="text-center margin-45px-bottom xs-margin-25px-bottom">
                                <div class="fb-page" data-href="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/">Isabelle Dupont In Yerevan</a></blockquote></div>	</span>
                         </div>      
                         <div class="text-center margin-45px-bottom xs-margin-25px-bottom">
                                <a class="twitter-timeline" data-width="100% " data-height="400px" href="https://twitter.com/myarmenia2?ref_src=twsrc%5Etfw">Tweets by myarmenia2</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>	
                          </div>
                     
                    </aside>
                  
                </div>
            </div>
        </section>
           
       
	
       
     @include('../includes.footer')
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
        <script type="text/javascript" src="/js/main.js"></script>
    </body>
</html>
