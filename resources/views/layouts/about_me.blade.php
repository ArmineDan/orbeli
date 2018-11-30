@include('../includes.links' )
    <body>       
        <header>
            @include('includes.header', $all_last_posts['menu'] )
            </header>
       
        <section class="visible_auth">
		    <div class="container" style="padding: 60px 0;">
                <div class="row">
                        <aside class="col-md-2 col-sm-4 col-xs-12 pull-left">  
                                <div class="margin-45px-bottom xs-margin-25px-bottom">                         
                                <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600 aside-title"><span>{{trans('text.author')}}</span></div>
                                   <div style="text-align:center; ">
                                   <a href="{{url($all_last_posts['lang'].'/author/'.$all_last_posts['authors'][0]->id)}}">
                                    <img src="{{$all_last_posts['authors'][0]->img}}" alt="" class="border-radius-100 " data-no-retina=""></a>
                                    <div style="margin-top:24px;">
                                      <a  style="font-size: 17px;" href="{{url($all_last_posts['lang'].'/author/'.$all_last_posts['authors'][0]->id)}}" target="_blanck">{{$all_last_posts['authors'][0]->name .' '.$all_last_posts['authors'][0]->lastname}} </a>
                                      <br/>
                                     <span> {{$all_last_posts['authors'][0]->sub_name}}</span>
                                      <div class="display-table height-100 width-100" style="color:black">
                                         <div class="display-table-cell icon-social-small ">
                                            <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                             <a href="{{$all_last_posts['authors'][0]->faceebook}}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                             <a href="{{$all_last_posts['authors'][0]->twitter}}"  target="_blank"><i class="fa fa-twitter"></i></a>
                                           <a href="{{$all_last_posts['authors'][0]->linkedin}}"  target="_blank"><i class="fa fa-linkedin"></i></a>
                                         <a  id="{{$all_last_posts['authors'][0]->id}}" class="take_mail" href="javascript:void(0);"><i class="fa fa-envelope"></i></a>
                                           <a href="#">
                                           <div id="em_status{{$all_last_posts['authors'][0]->id}}"></div>
                                           </a>
                                         </div>
                                     </div> </div>
                                 </div>                           
                                </div>                         
                            </aside>
				  
                    
                    
			      <main class="col-md-9 col-sm-8 col-xs-12 left-sidebarr pull-right sm-margin-60px-bottom xs-margin-40px-bottom padding-right sm-padding-left">
                        @isset($all_last_posts['authors'][0])
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600 aside-title"><span>{{trans('text.bio')}}</span></div>
                      <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">
                            <p>{!!$all_last_posts['authors'][0]->biography!!}</p>
						</div>
                    </main>
                  
                    @endisset
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                          
                           @yield('all_post_of_author')  
                         
                                              
                         
                        </div>         
					
              
            </div>
        </div>
        </section>

        @include('../includes.footer')
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        @include('../includes.scripts')  
        <script type="text/javascript" src="/js/dev.js"></script>   
<script src="/js/more_menu.js"></script>
{!!  $all_last_posts['event']->script() !!}
        
       
    </body>
</html>
