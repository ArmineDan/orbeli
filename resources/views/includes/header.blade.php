

<nav class="navbar navbar-default bootsnav navbar-top header-light bg-transparent nav-box-width white-link"  style="border-bottom: 1px solid white;background-color: #2C3A4A">
    <div class="container-fluid nav-header-container">      
        <div class="row">  
      				 <div >
                <a style="position: fixed; top:0" href="{{url( '/'.$all_last_posts['lang'])}}" title="Orbeli" class="logo">
                    <img src="/images/logo-white.png" data-rjs="/images/logo.png" class="logo-dark" alt="Orbeli">
                    <img src="/images/logo-white.png" data-rjs="/images/logo-white.png" alt="Orbeli" class="logo-light default"></a>
            </div>	 
            <div class="col-md-9 col-sm-8  col-xs-6  pull-right accordion-menu xs-no-padding-right margin-20px-left">
                <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                    <span class="sr-only">toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                <div class="navbar-collapse collapse " id="navbar-collapse-toggle-1"> 
                    <ul id="accordion" class="nav navbar-nav navbar-left margin-60px-left alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                       @foreach ($all_last_posts['menu'] as $item)                      
                       <li><a class="dropdown-toggle" data-toggle="dropdown" href={{url( $all_last_posts['lang'].'/category/'.$item->name)}}>{{$item->name}}</a>                                              
                       </li>                           
                       @endforeach   
                       <li id="mor" class="dropdown simple-dropdown moree">
                            <a href="javascript:void(0);"><i class="fa fa-bars" aria-hidden="true" style="font-size: 23px;"></i></a><i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                             <ul class="dropdown-menu" role="menu"  style="top: 33px; display: none; opacity: 1;min-width: 160px">
                                
                                <li> <a href="{{url($all_last_posts['lang'].'/announcements')}}"  title="{{trans('text.announcements')}}">{{trans('text.announcements')}}</a> </li> 
                                <li> <a href="{{url($all_last_posts['lang'].'/news')}}"  title="{{trans('text.news')}}">{{trans('text.news')}}</a> </li>
                                <li><a href="{{url($all_last_posts['lang'].'/partners')}}" title="{{trans('text.partners')}}">{{trans('text.partners')}}</a> </li>
                                <li><a href="{{url($all_last_posts['lang'].'/author')}}" title="{{trans('text.auth')}}">{{trans('text.auth')}}</a> </li>
                                <li><a  href="{{url($all_last_posts['lang'].'/about_us')}}" title="{{trans('text.about_us')}}">{{trans('text.about_us')}}</a> </li>
                                <li><a href="{{url($all_last_posts['lang'].'/contacts')}}" title="{{trans('text.contacts')}}">{{trans('text.contacts')}}</a> </li>                              
                             </ul>
                        </li>
                      </ul>
                </div>
            </div> 
                
{{--                     
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
                            </div>  --}}
                            
            <div id="arch" style="z-index:1000;margin-left: 60px;">                 
                <a class="lang" href="javascript:void(0);"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 23px;"></i></a>
                               
                <div class="calendar  col-md-3 col-sm-5 col-xs-12" style=" display:none;
                position: absolute; top: 63%; right:0">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {!! $all_last_posts['event']->calendar() !!}
                        </div>
                    </div>
                </div>                            
            </div> 

                {{--<div class="col-md-1 col-sm-2 col-xs-3 single-search xs-padding-right">
                        <button id="srch" class="bg-transparent position-absolute"  style="border:none" >
                        <i class="fa fa-search no-margin-left" id="ns_search_icon"></i></button>                   
                    </div>--}}

<div id="open_search_folder_ns">
    {{-- <i class="fa fa-times close_search_btn_ns"></i>--}}
    <center>
    <form action="{{url( '/'.$all_last_posts['lang']).'/search/'}}" method="GET">
        <input type="search" name="s" value="{{ Request::query('s') }}" class="search_inp_ns" placeholder="{{trans('text.search')}}...">
   
   <button type="submit" style="display: contents;"><i class="fa fa-search" id="search_btn_for_blur_narek" ></i></button>
	 </form>
    </center>
</div>
            <div class="col-md-1 col-sm-2 col-xs-3 xs-padding-right text-center">
                <button id="srch" class="bg-transparent">
                <i class="fa fa-search no-margin-left" id="" style="font-size:16px"></i></button>                   
            </div> 


            <div class="col-md-1 col-sm-2 col-xs-3  xs-padding-right" style="margin-left:auto">
                <div data-in="fadeIn" data-out="fadeOut" style="font-size:11px!important">
                
                <strong>
                <span style="display:<?php echo  $all_last_posts['lang'] =='hy'? 'none':'inline-block'?>">
                          <a class="lang" href="{{url('/hy')}}"  title="Հայերեն">Arm </a>                                   
                         </span>
						<span style="display:<?php echo $all_last_posts['lang'] =='en'?'inline-block':'none'?>;color:white">|</span>
                          <span style="display:<?php echo $all_last_posts['lang'] =='ru'?'none':'inline-block'?>">
                         <a  class="lang" href="{{url('/ru')}}"  title="Ռուսերեն">Rus </a>                              
                         </span>
						  <span style="display:<?php echo $all_last_posts['lang'] =='en'?'none':'inline-block'?>;color:white">|</span>
                         
                        <span style="display:<?php echo $all_last_posts['lang'] =='en'?'none':'inline-block'?>">
                            <a class="lang" href="{{url('/en')}}" title="Անգլերեն">Eng </a> </span> 
                         							
                        </strong>                                  
                        </div>
                 
             </div> 

        </div>
        
    </div>
</nav>



