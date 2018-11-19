@extends('layouts.pageAuthors')
@section('authors')
<div class="infinite-scroll wow fadeIn" > 
       
    @foreach ($all_last_posts['authors'] as $item)               
    <div class="col-md-3 col-sm-4 col-xs-6 team-block text-left team-style-1 sm-margin-seven-bottom margin-40px-bottom xs-margin-30px-bottom wow fadeInRight" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: fadeInRight;">
            <figure>
                
                <div class="team-image xs-width-100">
                 <img src="{{$item->img}}" alt="" data-no-retina="">
                    <div class="overlay-content text-center">
                        <div class="display-table height-100 width-100">
                            <div class="vertical-align-bottom display-table-cell icon-social-small padding-twelve-all">
                            <a href="{{url($all_last_posts['lang'].'/author/'.$item->id)}}"> <span class="text-white text-small display-inline-block no-margin">{{$item->sub_name}}</span></a>
                                <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                <a href="http://www.facebook.com" class="text-white" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                <a href="http://www.twitter.com" class="text-white" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="http://www.linkedin.com" class="text-white" target="_blank"><i class="fa fa-linkedin"></i></a>
                              <!--a href="mailto:info@orbeli.am" class="text-white" target="_blank" title="info@orbeli.am"><i class="fa fa-envelope"></i></a!-->
                              <i class="fa fa-envelope autors_narek_mail_icon">
                                <em style="display: none">{{$item->id}}</em>                                
                                <p></p>
                              </i>
                            </div>
                        </div>
                    </div>
                    <div class="team-overlay bg-extra-dark-gray opacity8"></div>
                </div>
                <figcaption>
                    <div class="team-member-position margin-20px-top text-center">
                            <a href="{{url($all_last_posts['lang'].'/author/'.$item->id)}}">  <div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">{{substr($item->name, 0, 2).'. '. $item->lastname}}</div></a>
                      </div>   
                </figcaption>
            </figure>
        </div>
 @endforeach
 

{{$all_last_posts['authors'] ->links()}}

</div>

@endsection

