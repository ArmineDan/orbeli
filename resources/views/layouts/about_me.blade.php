@include('../includes.links' )
    <body>       
        <header>
            @include('includes.header', $all_last_posts['menu'] )
            </header>
       
        <section class="visible_auth">
		    <div class="container" style="padding: 60px 0;">
                <div class="row">
				  <aside class="col-md-1 col-sm-12 col-xs-12 pull-right">
			         <diV>
                        </div>
                    </aside>
					
			      <main class="col-md-8 col-sm-12 col-xs-12 left-sidebarr pull-right sm-margin-60px-bottom xs-margin-40px-bottom no-padding-right sm-no-padding-left">
                        @isset($all_last_posts['authors'][0])
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600 aside-title"><span>{{trans('text.bio')}}</span></div>
                      <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">
                            <p>{{$all_last_posts['authors'][0]->biography}}</p>
						</div>
                    </main>

			      <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                      <div class="margin-45px-bottom xs-margin-25px-bottom">
                           
                            <div style="text-align:center">
                                    <img src="/{{$all_last_posts['authors'][0]->img}}" alt="" class="border-radius-100 " data-no-retina="">
                                    <br/>
                                    <span  class="text-extra-dark-gray font-weight-500 margin-5px-bottom display-block text-medium"  style="margin-top: 12px;" >{{$all_last_posts['authors'][0]->name.' '.$all_last_posts['authors'][0]->lastname}}</span>
                                <span>{{$all_last_posts['authors'][0]->sub_name}}</span>
                                </div>
                            @endisset
                            
						</div>
                    </aside>
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
       
    </body>
</html>
