@extends('layouts.all_tags')
@section('all_tags')
<div class="infinite-scroll wow fadeIn">     
    <div class="tag-cloud">
        @for ($i = 0; $i < count($all_last_posts['popular_tags']); $i++)
        <a  href="{{url( $all_last_posts['lang'].'/tags/'.$all_last_posts['popular_tags'][$i]->name)}}">{{$all_last_posts['popular_tags'][$i]->name}}</a> 
        @endfor
    </div>
{{-- {{$all_last_posts['popular_tags'] ->links()}} --}}

</div>

@endsection