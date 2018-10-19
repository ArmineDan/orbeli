<div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title">
    <span>Արխիվ</span></div>
                        
    <ul class="list-style-6 margin-20px-bottom text-small">
      
            @foreach ($all_last_posts['archievs'] as $item)  
            <li><a href="#">{{$item->date}}</a><span>12</span></li> 
                                    
            @endforeach 
            {{-- // 
            <li><a href="blog-grid.html">Հունիս 2017</a><span>05</span></li>
            <li><a href="blog-grid.html">Մայիս 2017</a><span>08</span></li>
            <li><a href="blog-grid.html">Ապրիլ 2017</a><span>10</span></li>
            <li><a href="blog-grid.html">Մարտ 2017</a><span>21</span></li>
            <li><a href="blog-grid.html">Փետրվար 2017</a><span>09</span></li>
            <li><a href="blog-grid.html">Հունվար 2017</a><span>07</span></li> --}}
                        </ul>   