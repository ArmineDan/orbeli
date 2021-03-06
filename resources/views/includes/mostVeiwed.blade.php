<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>{{trans('text.most_veiwed')}}</span></div>
                        <ul class="latest-post position-relative">
                                @foreach ($all_last_posts['mostViewed'] as $item)                             
                                <li class="blog-post blog-post-style1">
                                  <figure> 
                                 <a href="{{url($all_last_posts['lang'].'/post/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}">
                                    <img class="border-radius-200" src="{{$item->img}}" alt="" data-no-retina=""></a>
                                        </figure>
                                        <div class="display-table-cell vertical-align-top text-extra-small" id="most_view_div_narek">
                                            <a href="{{url($all_last_posts['lang'].'/post/'.$item->id.'/'.$item->date.'/'.urlencode($item->title))}}" class="text-extra-dark-gray">
                                                <span class="text-extra-dark-gray display-inline-block margin-5px-bottom" style="font-weight:bold" >{!!str_limit($item->title, 30)!!}</span></a> 
                                            <br/>
                                                @for ($i = 0; $i < count($item->getAuthors); $i++)
                                                <a href="{{url($all_last_posts['lang'].'/author/'.$item->getAuthors[$i]->id)}}" class="text-extra-dark-gray">
                                                 <span class="text-medium-gray text-extra-small-10"> 
                                            {{substr($item->getAuthors[$i]->name, 0, 2) .'. '. $item->getAuthors[$i]->lastname.' | '}}
                                                </span>
                                                    </a>
                                                @endfor
                                                <span class=" clearfix text-medium-gray  text-extra-small-10  pull-right padding-15px-left display-content"><i class="fa  fa-clock-o"> </i> {{$item->p_duratioan.' '.trans('text.minute') }} </span> 
                                           
                                    </li>
                                @endforeach                            
                            
                        </ul> 