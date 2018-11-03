<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Ամենադիտվածները</span></div>
                        <ul class="latest-post position-relative">
                                @foreach ($all_last_posts['mostViewed'] as $item)                             
                                <li>
                                  <figure>
                                 <a href="{{url('post/'.$item->date.'/'.$item->title)}}"><img class="border-radius-200" src="/{{$item->img}}" alt="" data-no-retina=""></a>
                                        </figure>
                                        <div class="display-table-cell vertical-align-top text-small">
                                            <a href="{{url('post/'.$item->date.'/'.$item->title)}}" class="text-extra-dark-gray">
                                                <span class="display-inline-block margin-5px-bottom">{{$item->title}}</span></a> 
                                                <span class="clearfix text-medium-gray text-small">{{substr($item->name, 0, 2).'.'. $item->lastname}}</span></div>
                                    </li>
                                @endforeach                            
                            
                        </ul>