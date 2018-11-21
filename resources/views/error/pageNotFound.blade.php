@include('../includes.links' )
    <body>       
        
        
       
       <section id="home" class="no-padding parallax mobile-height wow fadeIn" data-stellar-background-ratio="0.5" style="background-image: url(&quot;images/parallax-bg31.jpg&quot;); background-position: 0px 0px; visibility: visible; animation-name: fadeIn;">
            <div class="opacity-full bg-extra-dark-gray"></div>
            <div class="container position-relative full-screen" style="min-height: 789px;">
                <div class="slider-typography text-center">
                    <div class="slider-text-middle-main">
                        <div class="slider-text-middle">
                            <div class="bg-black-opacity-light width-50 center-col sm-width-80">
                                <div class="padding-fifteen-all xs-padding-20px-all">
                                    <span class="title-extra-large text-white font-weight-600 display-block margin-30px-bottom xs-margin-10px-bottom">404!</span>
                                    <h6 class="text-uppercase text-deep-pink font-weight-600 alt-font display-block margin-5px-bottom">Page Not Found</h6>
                                    <span class="text-medium-gray width-60 display-block center-col text-large sm-width-100">The page you were looking for could not be found.</span>
                                    <form action="search-result.html" method="post" class="position-relative">
                                        <div class="input-group-404 input-group margin-50px-tb xs-margin-20px-tb">
                                            <input name="text" id="text" data-email="required" type="text" placeholder="Enter your keywords..." class="extra-big-input border-none">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-large bg-white text-medium-gray"><i class="ti-search icon-small  no-margin position-raltive top-2"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <a href="index.html" class="btn btn-transparent-white btn-medium text-extra-small border-radius-4"><i class="ti-arrow-left margin-5px-right no-margin-left" aria-hidden="true"></i> Back To Homepage</a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('../includes.footer')
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        @include('../includes.scripts')  
        <script type="text/javascript" src="/js/dev.js"></script>   
        
       
    </body>
</html>
