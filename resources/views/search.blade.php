@extends('layouts.search_result')
@section('posts')
<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title" ><span>{{trans('text.search_result')}} &nbsp;&nbsp;&nbsp;" {{ $all_last_posts['s']}} "</span></div>

 @foreach ($all_last_posts['post'] as $post)                 
            
    <div class="equalize sm-equalize-auto blog-post-content margin-10px-bottom padding-10px-bottom display-inline-block border-bottom border-color-extra-light-gray sm-margin-30px-bottom sm-padding-30px-bottom xs-text-center sm-no-border">
            <div class="blog-image col-md-3 no-padding sm-margin-30px-bottom xs-margin-20px-bottom margin-20px-right sm-no-margin-right display-table" style="height: 238px;">
                <div class="display-table-cell vertical-align-middle">
                    <a href="{{url($post->lng.'/post/'.$post->date.'/'.urlencode($post->title))}}" >
                        <img src="{{$post->img}}" alt="" data-no-retina=""></a> 
                </div> 
            </div>
            <div class="blog-text col-md-8 display-table no-padding" style="height: 238px;">
                <div class="display-table-cell vertical-align-middle">
                    <div class="content margin-20px-bottom padding-left">
                         <a href="{{url($post->lng.'/post/'.$post->date.'/'.urlencode($post->title))}}"  class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small search_link">{{$post->title}}</a>
                         <p class="no-margin width-95"> 
 
                                @php
                                $show_symbols_size=600;
                                $longt=strip_tags($post->html_code);
                                $long_desc=preg_replace('/  +/', '', $longt);
                                $pos = stripos(mb_strtolower($long_desc), mb_strtolower($all_last_posts['s']));
                                $pos > 50 && $pos < strlen($long_desc)  ? $skizb=$pos-50 : $skizb = 1;
                            @endphp
                            @if(stripos($post->html_code,$all_last_posts['s']) !== false) 
                                @php
                                    if(strlen($long_desc)>$show_symbols_size){
                                        $show_text = substr($long_desc, $skizb, $show_symbols_size);
                                    }else{
                                        $show_text = $long_desc;
                                    }
                                   // print_r($devide_text
                                    echo "<div class='show_text'>............".mb_substr($show_text, 1, -1)."...</div>";
                                @endphp
                                
                                @else
                                @php
                                    $show_text = substr($long_desc, $skizb, $show_symbols_size);
                                    echo "<div class='show_text'>..............".mb_substr($show_text, 1, -1)."...</div>";
                                @endphp
                            @endif
                          

                             {{--If post content is > 200 in characters display 200 only or else display the whole content--}}
                            {{-- strlen( $long_desc ) > 30 ? substr($long_desc, $skizb, 800) . ' ...'. strlen( $long_desc ) : $long_desc --}}
                       
  
                            </p>
                    </div>
                    
                </div>
            </div>
          
        </div>     
  @endforeach
  @if( $all_last_posts['post']->total() > 6 )
  <nav>
      <ul class="pager">
          @if( $all_last_posts['post']->firstItem() > 1 )
              <li><a href="{{$all_last_posts['post']->previousPageUrl().'&s='.$all_last_posts['s']  }}">Previous</a></li>
          @endif
          
          @if( $all_last_posts['post']->lastItem() < $all_last_posts['post']->total() )
              <li><a href="{{$all_last_posts['post']->nextPageUrl().'&s='.$all_last_posts['s'] }}">Next</a></li>
          @endif
      </ul>
  </nav>
@endif

@endsection
