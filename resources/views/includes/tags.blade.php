<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title">
    <a href="{{url($all_last_posts['lang'].'/all/tags/')}}"><span>{{trans('text.tags')}} <i class="fa fa-arrow-right"></i></span></a></div>
                        <div class="tag-cloud">
                            @foreach ($all_last_posts['popular_tags'] as $item)   
                            <a  href="{{url( $all_last_posts['lang'].'/tags/'.$item->name)}}">{{$item->name}}</a>                            
                            @endforeach 

                        </div>