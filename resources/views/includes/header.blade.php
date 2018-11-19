<div id="open_search_folder_ns">
    <i class="fa fa-times close_search_btn_ns"></i>
    <form action="{{url( '/'.$all_last_posts['lang']).'/search/'}}" method="GET">
        <input type="search" name="s" value="{{ Request::query('s') }}" class="search_inp_ns" placeholder="{{trans('text.search')}}...">
    {{-- <button type="submit">Search</button> --}}
    </form>
    </div>

<nav class="navbar navbar-default bootsnav navbar-top header-light bg-transparent nav-box-width white-link"  style="border-bottom: 1px solid white;background-color: #2C3A4A">
    <div class="container-fluid nav-header-container">      
        <div class="row">  
       <div class="col-md-1 col-xs-5">
                <a style="position: absolute;" href="{{url( '/'.$all_last_posts['lang'])}}" title="Orbeli" class="logo"><img src="/images/logo-white.png" data-rjs="/images/logo@2x.png" class="logo-dark" alt="Orbeli"><img src="/images/logo-white.png" data-rjs="/images/logo-white@2x.png" alt="Orbeli" class="logo-light default"></a>
            </div>					
            <div class="col-md-10 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                    <span class="sr-only">toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-collapse collapse " id="navbar-collapse-toggle-1">
                    <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                       @foreach ($all_last_posts['menu'] as $item)                      
                       <li><a class="dropdown-toggle" data-toggle="dropdown" href={{url( $all_last_posts['lang'].'/category/'.$item->name)}}>{{$item->name}}</a>                                              
                       </li>                           
                       @endforeach   
                       
                      </ul>
                </div>
                
            </div> 
                
                    
                    <div class="col-md-10 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                            <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-2">
                                <span class="sr-only">toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-collapse collapse " id="navbar-collapse-toggle-2">
                                <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                   
                                    <li class="dropdown simple-dropdown">
                                        <a href="javascript:void(0);"><i class="fa fa-bars" aria-hidden="true" style="font-size: 23px;"></i></a><i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                         <ul class="dropdown-menu" role="menu"  style="top: 33px; display: none; opacity: 1;min-width: 160px">
                                            
                                            <li> <a href="{{url($all_last_posts['lang'].'/announcements')}}"  title="{{trans('text.announcements')}}">{{trans('text.announcements')}}</a> </li> 
                                            <li> <a href="{{url($all_last_posts['lang'].'/news')}}"  title="{{trans('text.news')}}">{{trans('text.news')}}</a> </li>
                                            <li><a href="{{url($all_last_posts['lang'].'/partners')}}" title="{{trans('text.partners')}}">{{trans('text.partners')}}</a> </li>
                                            <li><a href="{{url($all_last_posts['lang'].'/author')}}" title="{{trans('text.auth')}}">{{trans('text.auth')}}</a> </li>
                                            <li><a href="#" title="{{trans('text.about_us')}}">{{trans('text.about_us')}}</a> </li>
                                            <li><a href="{{url($all_last_posts['lang'].'/contacts')}}" title="{{trans('text.contacts')}}">{{trans('text.contacts')}}</a> </li>                              
                                         </ul>
                                    </li>  
                                  </ul>
                            </div>
                            
                        </div> 
                        <div class="navbar-collapse collapse" >                     
                       
                                <ul id="accordion1" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                   
                                    <li class="calendar dropdown simple-dropdown" >
                                        <a href="javascript:void(0);"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 23px;"></i></a>
                                         <ul class="dropdown-menu" role="menu"  style="top: 33px; display: none; opacity: 1;">
                                            <li> 
                                                    
                                                            <div class="panel panel-default">
                                                                
                                                <div class="panel-body">
                                                                    {!! $all_last_posts['event']->calendar() !!}
                                                                </div>
                                                            </div>
                                                        
                                                   
                                                    </li>     
                                                                
                                         </ul>
                                    </li>  
                                  </ul>
                            </div>   
                            
                <div class="col-md-1 col-sm-2 col-xs-2 width-auto  single-search xs-no-padding-right">
                    <button id="srch" class="bg-transparent position-absolute"  style="border:none" >
                    <i class="fa fa-search no-margin-left" id="ns_search_icon"></i></button>                   
                </div> 

                    

            <div class=" col-md-1 col-xs-2 width-auto  xs-no-padding-right" style="margin-left:auto">
                <ul class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut" style="font-size:11px!important">
                <li style="display:<?php echo  $all_last_posts['lang'] =='hy'? 'none':'inline-block'?>">
                          <a href="{{url('/hy')}}"  title="Հայերեն">Arm | </a>                                   
                         </li>
                         
                         <li style="display:<?php echo $all_last_posts['lang'] =='ru'?'none':'inline-block'?>">
                         <a href="{{url('/ru')}}"  title="Ռուսերեն">Rus |</a>                              
                         </li>
                         
                        <li style="display:<?php echo $all_last_posts['lang'] =='en'?'none':'inline-block'?>">
                            <a href="{{url('/en')}}" title="Անգլերեն">Eng |</a> </li>                                   
                    </ul>
                 
             </div> 

        </div>
        
    </div>
</nav>



