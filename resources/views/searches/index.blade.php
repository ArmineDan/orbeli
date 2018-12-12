Session::put('', $s);
Search on {{ $s }}
	<div class="blog-header">
		<h1 class="blog-title">Searching for "{{ $s }}"</h1>
		<p>We've found {{ $posts->count() }} results for your search term in all blog entries</p>
	</div>
	
	<div class="row" id="content">
        <div class="col-sm-8 blog-main">
       		
			@if( $posts->count() )
                @foreach( $posts as $post )
                    
                    <div class="blog-post">
                        <h2 class="blog-post-title">
                            @php
                                 $post->lang_id === 3 ? $lang = 'hy' : '';
                                 $post->lang_id === 2 ? $lang = 'ru' : '';
                                 $post->lang_id === 1 ? $lang = 'en' : '';
                            @endphp
                                <a href="http://localhost:8000/{{$lang}}/{{$post->date}}/{{$post->title}}" class="search_link">{{$post->title}}</a>
                        </h2>
                    <p class="blog-post-meta"></a></p>
                    
                        <div class="blog-content">
                            @php
                                $show_symbols_size=800;
                                $longt=strip_tags($post->html_code);
                                $long_desc=preg_replace('/  +/', '', $longt);
                                $pos = stripos(mb_strtolower($long_desc), mb_strtolower($s));
                                $pos > 50 && $pos < strlen($long_desc)  ? $skizb=$pos-50 : $skizb = 1;
                            @endphp
                            @if(stripos($post->html_code,$s) !== false) 
                                @php
                                    if(strlen($long_desc)>$show_symbols_size){
                                        $show_text = substr($long_desc, $skizb, $show_symbols_size);
                                    }else{
                                        $show_text = $long_desc;
                                    }
                                   // print_r($devide_text
                                    echo "<div class='show_text'>...".mb_substr($show_text, 1, -1)."...</div>";
                                @endphp
                                
                                @else
                                @php
                                    $show_text = substr($long_desc, $skizb, $show_symbols_size);
                                    echo "<div class='show_text'>...".mb_substr($show_text, 1, -1)."...</div>";
                                @endphp
                            @endif
                             {{--If post content is > 200 in characters display 200 only or else display the whole content--}}
                            {{-- strlen( $long_desc ) > 30 ? substr($long_desc, $skizb, 800) . ' ...'. strlen( $long_desc ) : $long_desc --}}
                        </div>
                        
                    </div>

                @endforeach
                
            @else

                <p>No post martch on your term <strong>{{ $s }}</strong></p>

            @endif

            {{-- Display pagination only if more than the required pagination --}}
            @if( $posts->total() > 6 )
                <nav>
                    <ul class="pager">
                        @if( $posts->firstItem() > 1 )
                            <li><a href="{{ $posts->previousPageUrl() }}">Previous</a></li>
                        @endif
                        
                        @if( $posts->lastItem() < $posts->total() )
                            <li><a href="{{ $posts->nextPageUrl() }}">Next</a></li>
                        @endif
                    </ul>
                </nav>
            @endif
            <script src="/js/jquery.js"></script>
            <script>
                    var searchInput = '{{$s}}'
                       
                       function displayMatches() {
                        var regex = new RegExp(searchInput, 'gi')
                        $(".search_link, .show_text").each(function(){
                            var a1=$(this).text();
                       var response = a1.replace(regex, function(str) {
                              return "<span style='background-color: yellow;'>" + str + "</span>"
                         })
                         $(this).html(response)
                                })
                                }
                                setTimeout(displayMatches, 300); 
                  </script>
        </div>
    </div>