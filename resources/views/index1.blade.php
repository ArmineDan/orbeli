
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
              js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.5";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>


        <!-- start header -->
        <header>
         @include('includes.header', $all_last_posts['menu'] )
         </header>
        <!-- end header -->       
       <section class="section1">               
           <div class="container">
               <div class="row">
                <div class="container">
               <div class="row">
                 
                <main class="col-md-9 col-sm-12 col-xs-12 left-sidebar1 pull-left sm-margin-60px-bottom xs-margin-40px-bottom no-padding-right sm-no-padding-left">
                    <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content  xs-margin-30px-bottom xs-text-center">
                        <a href="blog-standard-post.html" class="blog-image"><img src="images/blog-img9.jpg" alt="" data-no-retina=""></a>
                        <div class="blog-text titel_new display-inline-block ">
                            <div class="content padding-19px-all xs-padding-20px-all">
                                <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase alt-font"><span> Oգոստոսի 30, 2017</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span><a href="blog-grid.html" class="text-medium-gray ">Ա.ՀՈՎՀԱՆՆԻՍՅԱՆ</a></span></div>
                                <a href="blog-standard-post.html" class="text-extra-dark-gray text-uppercase  alt-font text-large font-weight-600 margin-15px-bottom display-block">Հայոց Համազգային շարժման հայտարարությունը</a>
                            </div>
                        </div>
                    </div>
                            <!-- horizontal posts-->
                       <div class="col-md-11 col-sm-12 col-xs-12 blog-post-content xs-text-center no-padding-right">                          
                       @foreach ($all_last_posts['horizontal'] as $item)
                       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow " style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1">
                                   <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                       <a href="blog-post-layout-01.html">
                                           <img src="{{$item->img}}" alt="" data-no-retina="">
                                       </a>
                                   </div>
                                   <div class="post-details">
                                       <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-100 display-block md-width-100">{{$item->short_text}}</a>
                                   
                                   </div>
                               </div>
                           </div>
                       @endforeach                       
                       </div> 
                       <!-- horizontal posts-->
                   </main>
                   <!-- Vertical posts-->
                   <aside class="col-md-3 col-sm-12 col-xs-12 pull-left no-padding-right" > 				   
                    <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center no-padding-right">           
                           @foreach ($all_last_posts['vert'] as $item)
                           <div class="col-md-12 col-sm-12col-xs-12 col-xs-12  sm-margin-50px-bottom xs-margin-30px-bottom wow" style="visibility: visible;animation-name: fadeIn;  height: 302px;">
                                <div class="blog-post blog-post-style1">
                                    <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                        <a href="blog-post-layout-01.html">
                                            <img src="{{$item->img}}" alt="" data-no-retina="">
                                        </a>
                                    </div>
                                    <div class="post-details">
                                        <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-100 display-block md-width-100">{{$item->short_text}} </a>
                                    
                                    </div>
                                </div>
                            </div>
                           @endforeach  
                        </div>                     
                    </aside>
                    <!--end Vertical posts-->  
                 </div>
              </div>
               </div>
           </div>
       </section>
       <!-- parallax image-->
      <section class="mine00 wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image: url(&quot;images/parallax-bg39.jpg&quot;); background-position: 0px 0px; visibility: visible; animation-name: fadeIn;">
           <div class="opacity-medium bg-extra-dark-gray"></div>
           <div class="container">
               <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                       <div class="display-table-cell vertical-align-middle text-center">
                          
                           <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">ՕՐԲԵԼԻ</h1>
                           <a href="#">
                            <span class="text-white opacity6 alt-font" style="font-size:25px"> վերլուծական-հետազոտական կենտրոն</span></a> 
                       </div>
                   </div>
               </div>
           </div>
       </section>

       <!--end  parallax image-->
       <!-- karciqner bajin -->
       <section class="blog">		
        <div class="container">
            <div class="row">
                <main class="col-md-9 col-sm-12 col-xs-12 left-sidebar pull-right sm-margin-60px-bottom xs-margin-40px-bottom no-padding-right sm-no-padding-left">
                   <!-- start post item --> 
                    <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">
                     <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Կարծիքներ</span></div>
                       
                
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1 xs-text-center">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                    <a href="blog-post-layout-01.html">
                                        <img src="images/blog-img21.jpg" alt="" data-no-retina="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն </a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                    <div class="author">
                                 <img src="images/avtar-02.jpg" alt="" class="border-radius-100" data-no-retina="">
                                        <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                    <a href="blog-post-layout-01.html">
                                        <img src="images/blog-img111.jpg" alt="" data-no-retina="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն  </a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                    <div class="author">
                                         <img src="images/avtar-02.jpg" alt="" class="border-radius-100" data-no-retina="">
                            
                                      <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                    <a href="blog-post-layout-01.html">
                                        <img src="images/blog-img22.jpg" alt="" data-no-retina="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն </a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                    <div class="author">
                                         <img src="images/avtar-01.jpg" alt="" class="border-radius-100" data-no-retina="">
                            
                                      <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                    <a href="blog-post-layout-01.html">
                                        <img src="images/blog-img23.jpg" alt="" data-no-retina="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն  </a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                    <div class="author">
                                             <img src="images/avtar-02.jpg" alt="" class="border-radius-100" data-no-retina="">
                            
                                      <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a>&nbsp;&nbsp;|&nbsp;&nbsp;13 Մայիս 2017</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                    <a href="blog-post-layout-01.html">
                                        <img src="images/blog-img23.jpg" alt="" data-no-retina="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն  </a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                    <div class="author">
                                             <img src="images/avtar-02.jpg" alt="" class="border-radius-100" data-no-retina="">
                            
                                      <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a>&nbsp;&nbsp;|&nbsp;&nbsp;13 Մայիս 2017</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                    <a href="blog-post-layout-01.html">
                                        <img src="images/blog-img23.jpg" alt="" data-no-retina="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն  </a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                    <div class="author">
                                             <img src="images/avtar-02.jpg" alt="" class="border-radius-100" data-no-retina="">
                            
                                      <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a>&nbsp;&nbsp;|&nbsp;&nbsp;13 Մայիս 2017</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                    <a href="blog-post-layout-01.html">
                                        <img src="images/blog-img23.jpg" alt="" data-no-retina="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն  </a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                    <div class="author">
                                             <img src="images/avtar-02.jpg" alt="" class="border-radius-100" data-no-retina="">
                            
                                      <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a>&nbsp;&nbsp;|&nbsp;&nbsp;13 Մայիս 2017</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                    <a href="blog-post-layout-01.html">
                                        <img src="images/blog-img23.jpg" alt="" data-no-retina="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն  </a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                    <div class="author">
                                             <img src="images/avtar-02.jpg" alt="" class="border-radius-100" data-no-retina="">
                            
                                      <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a>&nbsp;&nbsp;|&nbsp;&nbsp;13 Մայիս 2017</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                            <div class="blog-post blog-post-style1">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                                    <a href="blog-post-layout-01.html">
                                        <img src="images/blog-img23.jpg" alt="" data-no-retina="">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն  </a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                                    <div class="author">
                                             <img src="images/avtar-02.jpg" alt="" class="border-radius-100" data-no-retina="">
                            
                                      <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">Պ.Պողոսյան</a>&nbsp;&nbsp;|&nbsp;&nbsp;13 Մայիս 2017</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post item -->
                    <!-- start pagination -->
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center  wow fadeInUp" style="visibility: visible;">
                       
                                <button type="submit" class="bg-transparent  btn position-absolute right-0 top-1">
                                Ավելացնել <i class="fa fa-plus-circle"> </i></button>
                     
                       
                    </div>
                    <!-- end pagination -->
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
                
                <div class="margin-45px-bottom xs-margin-25px-bottom">
                        @include('includes.mostVeiwed',$all_last_posts['mostViewed'])
                    </div>
                   <div class="text-center margin-45px-bottom xs-margin-25px-bottom">
                     <div class="fb-page" data-href="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/">Isabelle Dupont In Yerevan</a></blockquote></div>	</span>
                      </div>
                     <div class="bg-deep-pink padding-30px-all text-white text-center margin-45px-bottom xs-margin-25px-bottom">
                        <i class="fa fa-quote-left icon-small margin-15px-bottom display-block"></i>
                        <span class="text-extra-large font-weight-300 margin-20px-bottom display-block"> Twitter-ից ինչ-որ փոստ</span>
                        <!--<a class="btn btn-very-small btn-transparent-white border-width-1 text-uppercase" href="#">Explore Portfolio</a>-->
                    </div>
                     <div class="bg-deep-pink padding-30px-all text-white text-center margin-45px-bottom xs-margin-25px-bottom">
                        <i class="fa fa-quote-left icon-small margin-15px-bottom display-block"></i>
                        <span class="text-extra-large font-weight-300 margin-20px-bottom display-block"> Linkedin-ից ինչ-որ փոստ</span>
                        <!--<a class="btn btn-very-small btn-transparent-white border-width-1 text-uppercase" href="#">Explore Portfolio</a>-->
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
    <!-- End karciqner bajin -->      
      
       <section id="blog" class="wow fadeIn bg-light-gray half-section last-paragraph-no-margin blog-post-style5">
            <div class="container">
               <div class="row">
               <div class="col-md-12 text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Թեմաներ</span></div>
         
                   <div class="col-md-12 no-padding xs-padding-15px-lr">
                       <ul class="blog-grid blog-3col gutter-large">
                           <li class="grid-sizer"></li>
                           <!-- start post item --> 
                           <li class="grid-item wow fadeInUp last-paragraph-no-margin">
                               <div class="blog-post">
                                   <div class="blog-post-images overflow-hidden">
                                       <a href="blog-post-layout-01.html">
                                           <img src="images/blog-img62.jpg" alt="">
                                       </a>
                                       <div class="blog-categories bg-white text-uppercase text-extra-small alt-font"><a href="pol.html">Քաղաքականություն</a></div>
                                   </div>
                                   <div class="post-details padding-40px-all bg-white sm-padding-20px-all">
                                       <div class="blog-hover-color"></div>
                                       <a href="pol.html" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Քաղաքականություն</a>
                                       
                                       <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                                       <p>Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն քաղաքականության մասին՝մարդուն դիտարկելով հոմո պիլիտիկուսի շրջանակում:
                                 Մարդաբանները առանձնացնում են քաղաքական համակարգի չորս պարզ տեսակներ</p>
                                   </div>
                               </div>
                           </li>
                           <!-- end post item --> 
                           <!-- start post item --> 
                           <li class="grid-item wow fadeInUp last-paragraph-no-margin">
                               <div class="blog-post">
                                   <div class="blog-post-images overflow-hidden">
                                       <a href="blog-post-layout-01.html">
                                           <img src="images/blog-img63.jpg" alt="">
                                       </a>
                                       <div class="blog-categories bg-white text-uppercase text-extra-small alt-font"><a href="#">Տնտեսություն</a></div>
                                   </div>
                                   <div class="post-details padding-40px-all bg-white sm-padding-20px-all">
                                       <div class="blog-hover-color"></div>
                                       <a href="blog-post-layout-01.html" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Տնտեսություն</a>
                                      
                                       <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                                       <p>Հետազոտողները նկատի ունեն տնտեսությունը, երբ առանձնացնում են արտադրության միկրո-, մակրոտնտեսական մակարդակներ և ինտերէկոնոմիկան։ Միկրոէկոնոմիկան հանդես է գալիս որպես առանձնացված արտադրություն կամ ձեռնարկություն։
                                       </p>
                                   </div>
                               </div>
                           </li>
                           <!-- end post item --> 
                           <!-- start post item --> 
                           <li class="grid-item wow fadeInUp last-paragraph-no-margin">
                               <div class="blog-post">
                                   <div class="blog-post-images overflow-hidden">
                                       <a href="blog-post-layout-01.html">
                                           <img src="images/blog-img64.jpg" alt="">
                                       </a>
                                       <div class="blog-categories bg-white text-uppercase text-extra-small alt-font"><a href="#">Անվտանգություն</a></div>
                                   </div>
                                   <div class="post-details padding-40px-all bg-white sm-padding-20px-all">
                                       <div class="blog-hover-color"></div>
                                       <a href="blog-post-layout-01.html" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Անվտանգություն</a>
                                      
                                       <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                                       <p>20-րդ դարի կեսերին տեղեկատվության դերի ու ծավալի աճին,
       ինչպես նաև տեղեկատվական տեխնոլոգիաների զարգացմանը զուգահեռ՝
       ավելացել են նաև տեղեկատվական անվտանգության սպառնալիքները,
       </p>
                                   </div>
                               </div>
                           </li>
                           <!-- end post item --> 
                           <!-- start post item --> 
                          <li class="grid-item wow fadeInUp last-paragraph-no-margin">
                               <div class="blog-post">
                                   <div class="blog-post-images overflow-hidden">
                                       <a href="blog-post-layout-01.html">
                                           <img src="images/blog-img67.jpg" alt="">
                                       </a>
                                       <div class="blog-categories bg-white text-uppercase text-extra-small alt-font"><a href="#">Տարածաշրջանային</a></div>
                                   </div>
                                   <div class="post-details padding-40px-all bg-white sm-padding-20px-all">
                                       <div class="blog-hover-color"></div>
                                       <a href="blog-post-layout-01.html" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Տարածաշրջանային</a>
                                       
                                       <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                                       <p>Երևանի Ն. Աճեմյանի անվան տարածաշրջանային N2 պետական քոլեջը` ի թիվս 12 փորձարարական քոլեջների   շրջանակում իրականացվող «2007 թվականի գործողությունների ծրագրի ներքո
                                       ոլորտային քաղաքականության աջակցության ծրագիր` ուղղված աղքատության կրճատմանը` </p>
                                   </div>
                               </div>
                           </li>
                           <!-- end post item --> 
                           <!-- start post item --> 
                          
                           <!-- end post item --> 
                           <!-- start post item --> 
                           <li class="grid-item wow fadeInUp last-paragraph-no-margin">
                               <div class="blog-post">
                                   <div class="blog-post-images overflow-hidden">
                                       <a href="blog-post-layout-01.html">
                                           <img src="images/blog-img70.jpg" alt="">
                                       </a>
                                       <div class="blog-categories bg-white text-uppercase text-extra-small alt-font"><a href="#">Միջազգային</a></div>
                                   </div>
                                   <div class="post-details padding-40px-all bg-white sm-padding-20px-all">
                                       <div class="blog-hover-color"></div>
                                       <a href="blog-post-layout-01.html" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Միջազգային</a>
                                      
                                       <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                                       <p>Երևանի Ն. Աճեմյանի անվան տարածաշրջանային N2 պետական քոլեջը` ի թիվս 12 փորձարարական քոլեջների   շրջանակում իրականացվող «2007 թվականի գործողությունների ծրագրի ներքո
                                       ոլորտային քաղաքականության աջակցության ծրագիր` ուղղված աղքատության կրճատմանը`</p>
                                   </div>
                               </div>
                           </li>
                           <!-- end post item --> 
                         
                         
                        
                           <!-- start post item --> 
                           <li class="grid-item wow fadeInUp last-paragraph-no-margin">
                               <div class="blog-post">
                                   <div class="blog-post-images overflow-hidden">
                                       <a href="blog-post-layout-01.html">
                                           <img src="images/blog-img72.jpg" alt="">
                                       </a>
                                       <div class="blog-categories bg-white text-uppercase text-extra-small alt-font"><a href="#">Կարծիքներ</a></div>
                                   </div>
                                   <div class="post-details padding-40px-all bg-white sm-padding-20px-all">
                                       <div class="blog-hover-color"></div>
                                       <a href="blog-post-layout-01.html" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">Կարծիքներ</a>
                                      
                                       <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                                       <p>Երևանի Ն. Աճեմյանի անվան տարածաշրջանային N2 պետական քոլեջը` ի թիվս 12 փորձարարական քոլեջների </p>
                                   </div>
                               </div>
                           </li>
                           <!-- end post item --> 
                       </ul>
                   </div>
               </div>
              
           </div>
       </section>
       
       <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">                   
						<div class="col-md-12 text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Տեսանյութեր</span></div>
                 
                     
                 
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 fit-videos text-center sm-margin-30px-bottom">
                        <!-- start vimeo video -->
                        <div class="fluid-width-video-wrapper" style="padding-top: 56.25%;"><iframe src="https://player.vimeo.com/video/99585787?color=bb9b44&amp;title=0&amp;byline=0&amp;portrait=0" id="fitvid0"></iframe></div>
                        <!-- end vimeo video -->
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 text-center fit-videos  padding-15px-bottom sm-margin-30px-bottom ">
                        <!-- start youtube video -->
                        <div class="fluid-width-video-wrapper" style="padding-top: 56.25%;"><iframe src="https://www.youtube.com/embed/sU3FkzUKHXU?rel=0&amp;showinfo=0" allowfullscreen="" id="fitvid0"></iframe></div>
                        <!-- end youtube video -->
                    </div>
					<div class="col-md-4 col-sm-12 col-xs-12 text-center fit-videos padding-15px-bottom sm-margin-30px-bottom">
                        <!-- start youtube video -->
                        <div class="fluid-width-video-wrapper" style="padding-top: 56.25%;"><iframe src="https://www.youtube.com/embed/sU3FkzUKHXU?rel=0&amp;showinfo=0" allowfullscreen="" id="fitvid0"></iframe></div>
                        <!-- end youtube video -->
                    </div>
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
