@extends('layouts.firstPage')

@section('content')
<section class="visiblee">
    <div class="container">

       <div class="row">
            <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">
                    <div class=" col-md-12 col-sm-12 col-xs-12text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span style="font-size: 19px;">Քաղաքականություն</span></div>		
            
                @foreach ($all_posts as $item)
               
                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 317px;">
                       <div class="blog-post blog-post-style1 xs-text-center">
                           <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
                               <a href="blog-post-layout-01.html">
                                   <img src="/{{$item->img}}" alt="" data-no-retina="">
                               </a>
                           </div>
                           <div class="post-details">
                               <a href="{{$item->date}}" class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100">{{$item->short_text}}"</a>
                               <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb xs-margin-15px-tb"></div>
                               <div class="author">
                                   
                                   <span class="text-medium-gray text-uppercase text-extra-small padding-15px-left display-inline-block">Հեղ.՝ <a href="home-#" class="text-medium-gray">{{$item->name}}"</a>&nbsp;&nbsp;|&nbsp;&nbsp;{{$item->date}}"</span>
                               </div>
                           </div>
                       </div>
                    </div>
             @endforeach
           
        </div>
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
             
               <div class="margin-50px-bottom">
                   <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Հետևեցեք Մեզ</span></div>
                   <div class="social-icon-style-1 text-center">
                       <ul class="extra-small-icon">
                           <li><a class="facebook" href="http://facebook.com" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                           <li><a class="twitter" href="http://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
                         <li><a class="youtube" href="https://www.youtube.com" target="_blank"><i class="fa fa-youtube"></i></a></li>
                           <li><a class="linkedin" href="http://linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                       </ul>
                   </div>
               </div>
               <div class="margin-45px-bottom xs-margin-25px-bottom">
                   <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>ԿԱՏԵԳՈՐՆԵՐ</span></div>
                   <ul class="list-style-6 margin-50px-bottom text-small">
                       <li><a href="#">Քաղաքականություն</a><span>12</span></li>
                       <li><a href="#">Տնտեսություն</a><span>05</span></li>
                       <li><a href="#">Անվտանգություն</a><span>08</span></li>
                       <li><a href="#">Տարածաշրջանային</a><span>10</span></li>
                       <li><a href="#">Միջազգային</a><span>21</span></li>
                       <li><a href="#">Կարծիքներ</a><span>09</span></li>
                     
                   </ul>   
               </div>
      
               <div class="margin-45px-bottom xs-margin-25px-bottom">
                   <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Թեմաներ</span></div>
                   <div class="tag-cloud">
                       <a href="#">քաղաքականություն</a>
                       <a href="#">միջազգային</a>
                       <a href="#">տնտեսություն</a>
                       <a href="#">լուրեր</a>                                
                       <a href="#">ոճ</a>
                       <a href="#">Քաղաք</a>

                   </div>
                </div>
        
               <div class="margin-45px-bottom xs-margin-25px-bottom">
                   <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>ԲԱԺԱՆՈՐԴԱԳՐՎԵԼ</span></div>
                   <div class="display-inline-block width-100">
                       <form>
                           <div class="position-relative">
                               <input type="email" class="bg-transparent text-small no-margin border-color-extra-light-gray medium-input pull-left" placeholder="Ձեր էլ.փոստը ...">
                               <button type="submit" class="bg-transparent text-large btn position-absolute right-0 top-3"><i class="fa fa-envelope no-margin-left"></i></button>
                           </div>   
                       </form>
                   </div>
               </div>
             
           </aside>
       </div>
   </div>
</section>
    
@endsection
