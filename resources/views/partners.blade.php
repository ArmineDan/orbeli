@extends('layouts.pageAuthors')
@section('authors')
<div class="infinite-scroll wow fadeIn" > 
       
    @foreach ($all_last_posts['authors'] as $item)               
    <div class="col-md-3 col-sm-4 col-xs-6 team-block text-left team-style-1 sm-margin-seven-bottom margin-40px-bottom xs-margin-30px-bottom wow fadeInRight" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: fadeInRight;">
            <figure>
                
                <div class="team-image xs-width-100">
                 <img src="/{{$item->logo}}" alt="" data-no-retina="">
                    <div class="overlay-content text-center">
                        <div class="display-table height-100 width-100">
                            <div class="vertical-align-bottom display-table-cell icon-social-small padding-twelve-all">
                            <a href="{{$item->url}}" class="text-white" target="_blank"> <span class="text-white text-small display-inline-block no-margin">{{$item->text}}</span></a>
                                <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                <a href="{{$item->url}}" class="text-white" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>
                                 </div>
                        </div>
                    </div>
                    <div class="team-overlay bg-extra-dark-gray opacity8"></div>
                </div>
                <figcaption>
                    <div class="team-member-position margin-20px-top text-center">
                            <a href="{{$item->url}}" class="text-white" target="_blank">  <div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">{{$item->p_name}}</div></a>
                      </div>   
                </figcaption>
            </figure>
        </div>
 @endforeach
 

{{$all_last_posts['authors'] ->links()}}

</div>

@endsection

