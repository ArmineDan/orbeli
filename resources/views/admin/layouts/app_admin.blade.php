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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >    
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/picker.css')}}" />
    {{-- <link rel="stylesheet" href="https://unpkg.com/select-picker@0.3.2/dist/picker.css"> --}}
    
    <style>
        .cat-edit {
            font-size: 20px;
            display: inline-block;
            margin-right: 5px;        
        }
        #app label {
            font-size: 14px;
        }
        .picker {
            font-size: 18px;
        }
        .picker .pc-select {
            min-width: 300px;
        }
        #new_tag {
            border-radius: 2px;
            border: 1px solid grey;
            font-size: 16px;
            line-height: 157%;
            text-indent: 3px;
        }
        #add_tag_btn {
            color: #fff;
            background-color: #31b0d5;
            vertical-align: middle;
            padding: 7px 10px;
            margin-bottom: 5px;
            display: inline-block;
            cursor: pointer;
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
                                <li><a href="{{ route('admin.video.index', $locale)}}">Videos</a></li>
                                <li><a href="{{ route('admin.opinion.index', $locale)}}">Opinions</a></li>
                                <li><a href="{{ route('admin.news.index', $locale)}}">News</a></li>
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
    {{-- <!-- Scripts --> --}}   
    {{-- <script type="text/javascript">
        var options = {
            filebrowserImageBrowseUrl: '/manage/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/manage/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/manage/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/manage/laravel-filemanager/upload?type=Files&_token='
        };
    </script> --}}
    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}" type="text/javascript"></script>    
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/select-picker@0.3.2/dist/picker.min.js"></script> --}}
    <script src="{{ asset('js/jquery3.3.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/picker.min.js') }}" type="text/javascript"></script>
    
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

        window.onload = function() {
            var category = document.getElementsByName('post_typ')[0];
            if(category) {
                checkCategory();
            }
            
        }
        
        function checkCategory() {
            var catIndexes = [2,7,12];
            var category = document.getElementsByName('post_typ')[0];
            var value = Number(category.value);
            var is_economy = catIndexes.indexOf(value);
            console.log(is_economy);

            if(is_economy >= 0) {
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
        function CountDuration() {
            var fullDesc = CKEDITOR.instances['post_full_text'].getData();            
            // console.log(fullDesc);
            let stats = window.reading_time(fullDesc);
            // console.log(stats);
            let duration = document.getElementById('duration');
            duration.value = Math.ceil( stats.minutes );
            document.getElementById('time_text').textContent = stats.text;
            document.getElementById('time_words').textContent = ' /words: ' + stats.words;
        }

        function CountDurationLong() {
            var longDesc = CKEDITOR.instances['post_long_text'].getData();            
            var stats = window.reading_time(longDesc);

            var duration = document.getElementById('duration');
            duration.value = Math.ceil(stats.minutes);
            document.getElementById('time_text').textContent = stats.text;
            document.getElementById('time_words').textContent = ' /words: ' + stats.words;
        }

        // https://picker.adam-uhlir.me/#coloring
        $('#ex-search').picker({search : true, limit : 5});

        if(document.getElementsByClassName('pc-element').length > 5) {
            document.getElementsByClassName('pc-trigger')[0].style.display = 'none';   
        }

        // pushed button
        function addNewTag(event) {
            let pc_element = document.getElementsByClassName('pc-element');
            
            if(pc_element.length > 5) {
                console.log(pc_element.length, '------ addNewTag: out of limit ------');
                alert('The limit of tags are only 5 !');
                return false;
            }

            let new_tag = document.getElementById('new_tag').value;

            if(new_tag.length <= 2) {
                alert('The tag must have at least 3 simbols!');
                return false;
            }
            console.log(new_tag);
            let ex_search = document.getElementById('ex-search');
            
            let tmpOption = document.createElement('option');            
            tmpOption.value = new_tag;
            tmpOption.textContent = new_tag;
            // console.log(tmpOption);
            ex_search.insertAdjacentElement('beforeend',tmpOption);

            let pc_list_ul = document.querySelector('.pc-list ul');
            // let ul_last_child = pc_list_ul.lastElementChild;
            // let data_order = Number(ul_last_child.getAttribute('data-order')) + 1;

            let new_data_order = ex_search.options.length-1;
            // console.log(new_data_order, '-----lolo');

            let tmpLi = document.createElement('li');
            tmpLi.setAttribute('data-order', new_data_order);
            tmpLi.setAttribute('data-id',new_tag);
            tmpLi.textContent = new_tag;
            pc_list_ul.insertAdjacentElement('beforeend',tmpLi);
            $('#ex-search').picker('set', new_tag);
        }

        // API events
        $('#ex-search').on('sp-change', function() {
            console.log('hey')
            let pc_trigger = document.getElementsByClassName('pc-trigger')[0];
            console.log(pc_trigger.style.display);
            // let ex_search = document.getElementById('ex-search');
            let options = document.getElementById("ex-search").options;
            // console.log(options)
            let selectedOpt = 0;
            for (let index = 0; index < options.length; index++) {
                if(options.item(index).hasAttribute('selected')) {
                    selectedOpt +=1;
                }                
            }
            console.log(selectedOpt);
            if(selectedOpt < 5) {
                document.getElementById('add_tag_btn').setAttribute('onclick', 'addNewTag(event)')
                console.log('hey-hey')
            }else {
                document.getElementById('add_tag_btn').setAttribute('onclick', 'alertLimitmessage()') 
            }
        })
        
        function alertLimitmessage() {
            alert('you already have 5 tags');
        }
        console.log('<<<<<<<<<---------------------hey how are you');        
      </script>
      
</body>
</html>
