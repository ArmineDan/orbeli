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
<script type="text/javascript" src="/js/main_no_scroll.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.js"></script>

 @if ( $all_last_posts['lang'] == 'ru')
 <script src="https://fullcalendar.io/js/fullcalendar-3.8.0/locale-all.js"></script> 
 <script> 
 console.log("ruuuuuuuuuuuuu")

    $('#calendar').fullCalendar({
  lang: 'ru'
});

</script> 

@endif
<script src="/js/calen.js"></script> 
{!!  $all_last_posts['event']->script() !!}