@include('../includes.links' )
<header>
    @include('../includes.header')
</header>

<body>
   
    @foreach ($all_last_posts['cont'] as $item)
    <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin" id="contacts_us_ns">
                    <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase" id="contacts_h5_narek">{{trans('text.contact_title')}}</h5>
                </div>  
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" style="visibility: visible; animation-name: fadeInUp;" id="d1_ns_ns_ns">
                        <div class="display-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-map-pin icon-medium text-white"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">{{trans('text.first_icon_text')}}</div>
                        <p class="center-col">{{$item->address_icon_text}}</p>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="display-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-mobile icon-medium text-white"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">{{trans('text.second_icon_text')}}</div>
                        <p class="center-col">{{$item->phone_icon_text}}</p>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <div class="display-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-envelope icon-medium text-white"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">{{trans('text.third_icon_text')}}</div>
                        <p class="center-col">{{$item->mail_icon_text}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <section id="contact" class="wow fadeIn no-padding bg-extra-dark-gray" style="visibility: visible; animation-name: fadeIn;color:white">
        <div class="container-fluid">
            <div class="row equalize sm-equalize-auto">
                    <div class="col-md-6 wow fadeIn animated" style="visibility: visible; animation-name: fadeIn; height: 644px;">
                            <div class="padding-eleven-all text-center xs-no-padding-lr">
                                <h5 class="margin-55px-bottom text-white alt-font font-weight-700 text-uppercase xs-margin-ten-bottom">{{$item->big_text_title}}</h5>
                                <p style="font-size: 24px;text-align: justify;line-height: 33px">{{$item->big_text}}</p>
                            </div>
                        </div>
                <div class="col-md-6 cover-background sm-height-450px xs-height-350px wow fadeIn">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12197.973341954035!2d44.479801916281566!3d40.15356842368177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abc1632505265%3A0x6c68d4580db4a8e2!2sNews+Am!5e0!3m2!1sen!2s!4v1542789696493" width="100%" height="640" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    @endforeach


    @include('../includes.footer')        
    @include('../includes.scripts')
 <script src="/js/more_menu.js"></script>
      
{!!  $all_last_posts['event']->script() !!}
</body>