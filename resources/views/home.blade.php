@extends('layouts.home_layout')

@section('main_post')
<div class="col-md-12 col-sm-12 col-xs-12 blog-post-content  xs-margin-30px-bottom xs-text-center">
  <a href="{{$all_last_posts['main_post'][0]->date}}\{{$all_last_posts['main_post'][0]->title}}" class="blog-image"><img src="{{$all_last_posts['main_post'][0]->img}}" alt="" data-no-retina=""></a>
  <div class="blog-text titel_new display-inline-block ">
      <div class="content padding-19px-all xs-padding-20px-all">
          <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase alt-font"><span>{{$all_last_posts['main_post'][0]->date }}</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span><a href="blog-grid.html" class="text-medium-gray ">{{$all_last_posts['main_post'][0]->name .' '. $all_last_posts['main_post'][0]->lastname}}</a></span></div>
          <a href="{{$all_last_posts['main_post'][0]->date}}\{{$all_last_posts['main_post'][0]->title}}" class="text-extra-dark-gray text-uppercase  alt-font text-large font-weight-600 margin-15px-bottom display-block">{{$all_last_posts['main_post'][0]->title}}</a>
      </div>
  </div>
</div>
@endsection

@section('vertical_post')
    @foreach ($all_last_posts['horizontal'] as $item)
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-xs-12 margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow " style="visibility: visible; animation-name: fadeInUp; height: 317px;">
        <span class="vert-controls">
          <a href=""><i class="fa fa-edit" ></i></a>
          <a href=""><i class="fa fa-plus" ></i></a>
        </span> 
        <div class="blog-post blog-post-style1">
          <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
            <a href="{{$item->date}}\{{$item->title}}">
                <img src="{{$item->img}}" alt="" data-no-retina="">
            </a>
          </div>
          <div class="post-details">
              <a href="{{$item->date}}\{{$item->title}}" class="post-title text-medium text-extra-dark-gray width-100 display-block md-width-100">{{$item->short_text}}</a>
          </div>
        </div>
      </div>
    @endforeach       
@endsection

@section('horizontal_post')
    @foreach ($all_last_posts['vert'] as $item)
      <div class="col-md-12 col-sm-12col-xs-12 col-xs-12  sm-margin-50px-bottom xs-margin-30px-bottom wow" style="visibility: visible;animation-name: fadeIn;  height: 302px;">
        <div class="blog-post blog-post-style1">
          <span class="vert-controls">
            <a href=""><i class="fa fa-edit" ></i></a>
            <a href=""><i class="fa fa-plus" ></i></a>
          </span> 
          <div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">
            <a href="{{$item->date}}\{{$item->title}}">
                <img src="{{$item->img}}" alt="" data-no-retina="">
            </a>
          </div>
          <div class="post-details">
              <a href="{{$item->date}}\{{$item->title}}" class="post-title text-medium text-extra-dark-gray width-100 display-block md-width-100">{{$item->short_text}} </a>
          </div>
        </div>
      </div>
    @endforeach       
@endsection

@section('parallax')
  <section class="mine00 wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image: url(&quot;images/parallax-bg39.jpg&quot;); background-position: 0px 0px; visibility: visible; animation-name: fadeIn;">
    <div class="opacity-medium bg-extra-dark-gray"></div>
      <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center">                   
                  <a href="#">
                    <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">ՕՐԲԵԼԻ</h1>
                    <span class="text-white opacity6 alt-font" style="font-size:25px"> վերլուծական-հետազոտական կենտրոն</span>
                  </a> 
                </div>
            </div>
        </div>
      </div>
  </section>
@endsection