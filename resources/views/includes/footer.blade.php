<footer class="footer-classic-dark bg-extra-dark-gray1 xs-padding-30px-bottom">
    <div class="bg-dark-footer padding-50px-tb xs-padding-30px-tb">
        <div class="container">
            <div class="row equalize xs-equalize-auto" style="color: white;">
                <!-- start slogan -->
                <div class="col-md-4 col-sm-5 col-xs-12 text-center alt-font display-table xs-text-center xs-margin-15px-bottom">
                    <div class="display-table-cell vertical-align-middle">
                        {{trans('text.footer_first')}}
                    </div>
                </div>
                <!-- end slogan -->
                <!-- start logo -->
                <div class="col-md-4 col-sm-2 col-xs-12 text-center display-table xs-margin-10px-bottom">
                    <div class="display-table-cell vertical-align-middle">
                        <a  href="{{url( '/'.$all_last_posts['lang'])}}" title="Orbeli" ><img class="footer-logo" src="/images/logo-footer.png" data-rjs="images/logo-footere@2x.png" alt="Orbeli"></a>
                    </div>
                </div>
                <!-- end logo -->
                <!-- start social media -->
                <div class="col-md-4 col-sm-5 col-xs-12 col-xs-12 text-center display-table xs-text-center">
                    <div class="display-table-cell vertical-align-middle">
                        <span class="alt-font margin-20px-right">{{trans('text.footer_third')}}</span>
                        <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                            <ul class="small-icon no-margin-bottom">
                                <li><a class="facebook text-white" href="https://www.facebook.com/Orbeli-Center-779924719032716/" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                                <li><a class="twitter text-white" href="https://twitter.com/OrbeliCenter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
                <!-- end social media -->
            </div>
            <!--div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">&COPY; 2018  {{trans('text.footer_second')}}  <a href="http://webex.am" target="_blank" title="Վեբէքս Թեքնոլոջիս ՍՊԸ">{{trans('text.footer_webex')}}</a></div>
            </div!-->
        </div>
    </div>
   <div class="narek_all_rights_reserved text-center">
        <span id="footer_ns_hamar_1">&COPY;  <?php echo date("Y") ?> {{trans('text.footer_reserved')}} </span><br id="ns_br_1">
		<span id="footer_ns_hamar_2">{{trans('text.footer_second')}}  <a href="http://webex.am" target="_blank" title="Վեբէքս Թեքնոլոջիս ՍՊԸ">{{trans('text.footer_webex')}}</a></span>
   </div>
</footer>