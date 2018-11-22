@include('../includes.links' )
    <body> 
       <section id="home" class="no-padding parallax mobile-height wow fadeIn" data-stellar-background-ratio="0.5" style=" visibility: hidden; animation-name: fadeIn;">
            <div class="opacity-full bg-extra-dark-gray"></div>
            <div class="container position-relative full-screen" style="min-height: 789px;">
                <div class="slider-typography text-center">
                    <div class="slider-text-middle-main">
                        <div class="slider-text-middle">
                            <div class="bg-black-opacity-light width-50 center-col sm-width-80">
                                 <div class="padding-fifteen-all xs-padding-20px-all">
                                <span class="title-extra-large text-white font-weight-600 display-block margin-30px-bottom xs-margin-10px-bottom">404!</span>
                                    <h6 class="text-uppercase text-deep-pink font-weight-600 alt-font display-block margin-5px-bottom">{{trans('text.error_page')}}</h6>
                                    <span class="text-medium-gray width-60 display-block center-col text-large sm-width-100">{{trans('text.error_page_text')}}</span>
                                    <br/>
                                    <a href="{{url( '/'.$all_last_posts['lang'])}}" class="btn btn-transparent-white btn-medium text-extra-small border-radius-4"><i class="ti-arrow-left margin-5px-right no-margin-left" aria-hidden="true"></i> {{trans('text.back')}}  OrbeliCenter</a>
                                
                               
                                 </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

       
     
        @include('../includes.scripts')  
        <script type="text/javascript" src="/js/dev.js"></script>   
        
       
    </body>
</html>
