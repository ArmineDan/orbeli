
    @include('../includes.links' )
    <body>           
        <header>
            @include('../includes.header')
        </header>
        <section class="visibl">
        <div class="container">
           <div class="row">
                       <main class="col-md-12 col-sm-10 col-xs-10 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom padding-left sm-padding-right">
                          <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>{{$all_last_posts['text']}}</span></div>
                             @yield('authors')
                        </main>
                       
                        
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
<script src="/js/autors_ns.js"></script>

<script src='/js/lib/moment.min.js'></script>
<script src='/js/fullcalendar.min.js'></script>
<script src='/js/locale-all.js'></script>
<script src="/js/calen.js"></script>  
{!!  $all_last_posts['event']->script() !!}

</body>
</html>
