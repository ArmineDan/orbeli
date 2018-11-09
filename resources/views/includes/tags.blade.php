<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title">
    <span>{{trans('text.tags')}}</span></div>
                        <div class="tag-cloud">
                            @foreach ($all_last_posts['popular_tags'] as $item)   
                            <a  href="{{url( $all_last_posts['lang'].'/tags/posts/'.$item->name)}}">{{$item->name}}</a>                            
                            @endforeach 

                        </div>