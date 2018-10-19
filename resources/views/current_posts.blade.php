
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
        <!-- start header -->
        <header>
            @include('includes.header', $all_last_posts['menu'] )
            </header>
          
<section class="visiblee">
    <div class="container">

       <div class="row">
            <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">
                    <div class=" col-md-12 col-sm-12 col-xs-12text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span style="font-size: 19px;">{{$all_last_posts['id']}} </span></div>		
            
                @foreach ($all_last_posts['post'] as $item)
               
                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                       <div class="blog-post blog-post-style1 xs-text-center">
                           <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                               <a href="{{$item->date}}/{{$item->title}}">
                                   <img src="/{{$item->img}}" alt="" data-no-retina="">
                               </a>
                           </div>
                           <div class="post-details">
                               <a href="{{$item->date}}/{{$item->title}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">{{$item->short_text}}"</a>
                               <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                               <div class="author">
                                   
                                   <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">{{$item->name}}"</a>&nbsp;&nbsp;|&nbsp;&nbsp;{{$item->date}}"</span>
                               </div>
                           </div>
                       </div>
                    </div>
             @endforeach
           
        </div>
           </main>
           <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
               <div class="display-inline-block width-100 margin-45px-bottom xs-margin-25px-bottom">
                   <form>
                       <div class="position-relative">
                           <input type="email" class="bg-transparent text-small no-margin border-color-extra-light-gray medium-input pull-left" placeholder="Enter your keywords...">
                           <button type="submit" class="bg-transparent  btn position-absolute right-0 top-1"><i class="fa fa-search no-margin-left"></i></button>
                       </div>   
                   </form>
               </div>
             
               <div class="margin-50px-bottom">
                   <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Հետևեցեք Մեզ</span></div>
                   <div class="social-icon-style-1 text-center">
                       <ul class="extra-small-icon">
                           <li><a class="facebook" href="http://facebook.com" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                           <li><a class="twitter" href="http://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
                         <li><a class="youtube" href="https://www.youtube.com" target="_blank"><i class="fa fa-youtube"></i></a></li>
                           <li><a class="linkedin" href="http://linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                       </ul>
                   </div>
               </div>
               <div class="margin-45px-bottom xs-margin-25px-bottom">
                    @include('includes.archives')
               </div>
      
               <div class="margin-45px-bottom xs-margin-25px-bottom">
                    @include('includes.tags')
                </div>
        
              
           </aside>
       </div>
   </div>
</section>
@include('includes.footer')
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
