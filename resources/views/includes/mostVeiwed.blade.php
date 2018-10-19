<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Ամենադիտվածները</span></div>
                        <ul class="latest-post position-relative">
                                @foreach ($all_last_posts['mostViewed'] as $item)                             
                                <li>
                                  <figure>
                                 <a href="blog-post-layout-01.html"><img class="border-radius-200" src="{{$item->img}}" alt="" data-no-retina=""></a>
                                        </figure>
                                        <div class="display-table-cell vertical-align-top text-small">
                                            <a href="blog-post-layout-01.html" class="text-extra-dark-gray">
                                                <span class="display-inline-block margin-5px-bottom">{{$item->title}}</span></a> 
                                                <span class="clearfix text-medium-gray text-small">{{$item->name .' '. $item->lastname}}</span></div>
                                    </li>
                                @endforeach                            
                            
                        </ul>