@section('menu')   
<nav class="navbar navbar-default bootsnav navbar-top header-light bg-transparent nav-box-width white-link"  style="border-bottom: 1px solid white;background-color: rgba(41, 46, 49, 1.00)" >
    <div class="container-fluid nav-header-container">
       
        <div class="row">  
       <div class="col-md-2 col-xs-5">
                <a href="index.html" title="Orbeli" class="logo"><img src="images/logo.png" data-rjs="images/logo@2x.png" class="logo-dark" alt="Orbeli"><img src="images/logo-white.png" data-rjs="images/logo-white@2x.png" alt="Orbeli" class="logo-light default"></a>
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
                        <li><a class="dropdown-toggle" data-toggle="dropdown" href="pol.html">Քաղաքականություն</a>                                              
                                </li>
                                <li><a class="dropdown-toggle" data-toggle="dropdown" href="pol.html">Տնտեսություն</a>                                              
                                </li>
                                <li><a class="dropdown-toggle" data-toggle="dropdown" href="pol.html">Անվտանգություն</a>                                              
                                </li>
                                <li><a class="dropdown-toggle" data-toggle="dropdown" href="pol.html">Միջազգային</a>                                              
                                </li>
                               <li><a class="dropdown-toggle" data-toggle="dropdown" href="pol.html">Տարածաշրջանային</a>                                              
                                </li>               
                                </li> 
                          <li class="dropdown simple-dropdown" ><a href="javascript:void(0);"><i class="fa fa-bars" aria-hidden="true" style="font-size: 23px;"></i></a><i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                            <!-- start sub menu -->
                            <ul class="dropdown-menu" role="menu"  style="top: 33px; display: none; opacity: 1;">
                            <li><a href="javascript:void(0);"  title="Միջոցառումներ">Միջոցառումներ</a>                                   
                        </li>                                 
                         <li> <a href="javascript:void(0);"  title="Միջոցառումներ">Հայտարարություններ</a>                                   
                        </li>
                         <li><a href="javascript:void(0);" title="Մեր մասին">Մեր մասին</a> </li>
                         <li><a href="javascript:void(0);" title="Գործընկերներ">Գործընկերներ</a> </li>
                        <li><a href="javascript:void(0);" title="Կապ">Կապ</a> </li>
                        </ul>
                        </li>
                     </ul>
                </div>
            </div>
            
            <div class="col-md-7 col-xs-2 width-auto  xs-no-padding-right">             
               
                    <ul class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                        <li style="display:none">
                         <a href="javascript:void(0);"  title="Հայերեն">Arm | </a>                                   
                        </li>
                        
                        <li>
                        <a href="javascript:void(0);"  title="Ռուսերեն">Rus |</a>                              
                        </li>
                        
                       <li><a href="javascript:void(0);" title="Անգլերեն">Eng |</a> </li>                                   
                   </ul>
                
            </div> 
        </div>
    </div>
</nav>
@endsection