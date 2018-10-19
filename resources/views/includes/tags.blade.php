<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Թեգեր</span></div>
                        <div class="tag-cloud">
                            @foreach ($all_last_posts['popular_tags'] as $item)   
                            <a href="#">{{$item->name}}</a>                            
                            @endforeach 

                        </div>