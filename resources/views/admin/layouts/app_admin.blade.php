<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <style>
        .cat-edit {
            font-size: 20px;
            display: inline-block;
            margin-right: 5px;        
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Orbeli') }}
                    </a>
                </div>
                

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Navigate
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">                                
                                <li><a href="{{ url('/', $locale) }}">Index</a></li>
                                <li><a href="{{ route('admin.index', $locale) }}">Dashboard</a></li>
                                <li><a href="{{ route('admin.category.index', $locale) }}">Categories</a></li>
                                <li><a href="{{ route('admin.post.index', $locale)}}">Posts</a></li>
                                <li><a href="{{ route('admin.video.index', $locale)}}">Video</a></li>
                            </ul>
                        </li>                 
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Languages <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin.index', $locale='en') }}">en -1</a></li>
                                <li><a href="{{ route('admin.index', $locale='ru') }}">ru -2</a></li>
                                <li><a href="{{ route('admin.index', $locale='hy') }}">hy -3</a></li>
                            </ul>
                        </li>
                      
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript">
        var options = {
          filebrowserImageBrowseUrl: '/manage/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/manage/laravel-filemanager/upload?type=Images&_token=',
          filebrowserBrowseUrl: '/manage/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/manage/laravel-filemanager/upload?type=Files&_token='
        };
      </script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        function getStatusChangeValue(event) {
            // alert(event.target.checked);
            let id  = event.target.getAttribute('name');
            let inp = document.getElementById(`${id}`);
            if(event.target.checked) {
                inp.setAttribute('value', 1);
                console.log(inp);
                // alert(event.target.getAttribute('value'));
            }else{

                inp.setAttribute('value', 0);
                console.log(inp);
                // alert(event.target.getAttribute('value'));
            }
        }

        var long_text_wrap = document.getElementById('long_text_wrap');
        var thumb_img_wrap = document.getElementById('thumb_img_wrap');
        
        
        function checkCategory(event) {
        var catIndexes = [2,7,12];
        var value = Number(event.target.value);
        var is_economy = catIndexes.indexOf(value);
        console.log(is_economy);

            if(is_economy > 0) {
                long_text_wrap.style.display = 'block';
                thumb_img_wrap.style.display = 'block';
                console.log(long_text_wrap)
                console.log(thumb_img_wrap)
            }else {
                long_text_wrap.style.display = 'none';
                thumb_img_wrap.style.display = 'none';
                console.log(long_text_wrap)
                console.log(thumb_img_wrap)
            }
        
        }

        // var text = 'hello world';
        // var stats = window.reading_time(text);
        // console.log(stats);

        function CountDurationLong() {
            var longDesc = CKEDITOR.instances['post_long_text'].getData();            
            var stats = window.reading_time(longDesc);
            var duration = document.getElementById('duration');
            duration.value = Math.ceil(stats.minutes);
            document.getElementById('time_text').textContent = stats.text;
            document.getElementById('time_words').textContent = ' /words: ' + stats.words;
        }
      </script>
</body>
</html>
