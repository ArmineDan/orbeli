<div id="see_all_images_ns">

    <center>
        <img src="">
    </center> 

</div>
@include('../includes.links')
    <body>
            @include('../includes.facebook_script' )
        <header>
            @include('includes.header', $all_last_posts['menu'] )
            </header>
          
            <section class="visible1">
                <div class="container">
                   <div class="row">
                    <div class="container">
                   <div class="row">
                     <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                            @include('includes.mostVeiwed')
                        </div>
                        
                        <div class="margin-45px-bottom xs-margin-25px-bottom">
                                @include('includes.tags') 
                        </div>

                          <div class="text-center margin-45px-bottom xs-margin-25px-bottom">
                                <div class="fb-page" data-href="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Isabelle-Dupont-In-Yerevan-453404071373709/">Isabelle Dupont In Yerevan</a></blockquote></div>	</span>
                         </div>      
                         <div class="text-center margin-45px-bottom xs-margin-25px-bottom">
                                <a class="twitter-timeline" data-width="100% " data-height="400px" href="https://twitter.com/myarmenia2?ref_src=twsrc%5Etfw">Tweets by myarmenia2</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>	
                          </div>
                         
                       </aside>
                          
                     <main class="col-md-7 col-sm-12 col-xs-12 left-sidebar1 pull-right sm-margin-60px-bottom xs-margin-40px-bottom no-padding-right sm-no-padding-left">
                           <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin" id="html_div">
                                <?php echo html_entity_decode($all_last_posts['post'][0]->html_code, ENT_QUOTES | ENT_XML1, 'UTF-8'); ?>
                           </div>
                        <p style="color:crimson"> {{count($all_last_posts['docs'])>0?trans('text.hodvac'):''}}</p>
                        <div class="col-md-12 col-sm-12 col-xs-12 no-padding">                           
                                @forelse ($all_last_posts['docs'] as $item)                              
                                        <div class="tag-cloud margin-20px-bottom" style="float:left"> 
                                        <a href="{{$item->link}}" download title="{{$item->type}}"><img width="25" src="/images/icons/{{$item->type}}.png" alt=""  data-no-retina="">
                                        <i class="fa fa-download" aria-hidden="true" style="font-size:19px;color:crimson"></i>  {{trans('text.download')}}  </a>
                                        </div>
                                @empty
                                @endforelse 
                         </div>
                              
                           <div class="col-md-12 col-sm-12 col-xs-12">
                               <div class="divider-full bg-medium-light-gray"></div>
                           </div>  
                           <div class="col-md-6 col-sm-12 col-xs-12 sm-text-center">
                               <div class="tag-cloud margin-20px-bottom">
                                   @for ($i = 0; $i < count($all_last_posts['tags']); $i++)
                                    <a href="#" >{{$all_last_posts['tags'][$i]}}</a>   
                                   @endfor
                                                       
                               </div>
                           </div>
                          
                           <div class="col-md-12 col-sm-12 col-xs-12 no-padding">

                                <ul class="blog-comment" id="narek_comment_ul">
                                    
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($all_last_posts['comments'][$i]->approved == 1)
                                                <li> 
                                                    <div class="display-table width-100">                                               
                                                        <div class="padding-40px-left display-table-cell vertical-align-top last-paragraph-no-margin xs-no-padding-left xs-display-block">
                                                            <span class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small">{{$all_last_posts['comments'][$i]->c_name}}</span>
                                                            <div class="text-small text-medium-gray text-uppercase margin-10px-bottom"><?php echo  date('Y-m-d', strtotime($all_last_posts['comments'][$i]->created_at)) ?></div>
                                                            <p style="font-size:12px">{{$all_last_posts['comments'][$i]->body}}</p>                      
                                                        </div>
                                                    </div>                                            
                                                </li>
                                            @endif
                                        @endfor
                                    
                                    
                                </ul>

                                <div id="narek_db_comments"></div>
                                
                            <center id="more_n" class="{{count($all_last_posts['comments'])-5}}" 
                            style="display:{{count($all_last_posts['comments'])-5<0 ? 'none':''}}" ><i class="fa fa-plus" style="font-size: 25px;padding-top: 30px;cursor: pointer" id="ns_click_plus_comment_btn"></i></center>
                             </div>


                             <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                             <button class="btn btn-dark-gray btn-small margin-15px-top" id="com_btn" >{{trans('text.comment')}}</button>
                                </div>
             
                                   <div class="row"  id="com_form"  style="display:none">  
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12 margin-eight-top" >
                                        <div class="divider-full bg-medium-light-gray"></div>
                                    </div>
            
                                    <div class="col-md-12 col-sm-12 col-xs-12 margin-lr-auto text-center margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb">
                                        <div class="position-relative overflow-hidden width-100">
                                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Թողնել կարծիք</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <input type="text" placeholder="Անուն *" class="medium-input" id="name_comment_inp_ns">
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <input type="email" placeholder="Էլ.-հասցե *" class="medium-input" id="mail_comment_inp_ns">
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea placeholder="Ձեր կարծիքը..." rows="8" class="medium-textarea" id="opinion_comment_inp_ns"></textarea>
                                    </div>
                                    <input type="hidden" id="hidden_id_comments_narek" value="{{$all_last_posts['id']}}">
                                    <input type="hidden" id="comment_answer_ns">
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <button class="btn btn-dark-gray btn-small margin-15px-top" type="submit" id="go_db_btn_comment">Ուղարկել</button>
                                    </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12 margin-eight-top" >
                                        <div class="divider-full bg-medium-light-gray"></div>
                                    </div>
                                </div>
                         </div>
                          
                       </main>
                       
                     <aside class="col-md-2 col-sm-12 col-xs-12 pull-right">  
                           <div class="margin-45px-bottom xs-margin-25px-bottom">                         
                           <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600 aside-title"><span>{{trans('text.author')}}</span></div>
                              <div style="text-align:center; ">
                              <a href="{{url('author/1')}}">
                               <img src="/images/avtar-04.jpg" alt="" class="border-radius-100 " data-no-retina=""></a>
                               <div style="margin-top:24px;">
                                 <a  style="font-size: 17px;" href="{{url('author/1')}}" target="_blanck">Մուշեղ Գալստյան</a>
                                 <div class="display-table height-100 width-100" style="color:black">
                                    <div class="vertical-align-bottom display-table-cell icon-social-small ">
                                       <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                        <a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                        <a href="http://www.twitter.com"  target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="http://www.linkedin.com"  target="_blank"><i class="fa fa-linkedin"></i></a>
                                        <a href="mailto:info@orbeli.am"  target="_blank"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div> </div>
                            </div>
                           
                           </div>

                       </aside>
                       
                       <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                               <div class="col-md-12 col-sm-12 col-xs-12 margin-lr-auto text-center margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb">
                                   <div class="position-relative overflow-hidden width-100">
                                       <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Ամենադիտվածները</span>
                                   </div>
                               </div>
                               <!-- start post item -->
                               <div class="col-md-3 col-sm-6 col-xs-12 last-paragraph-no-margin sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn" style="visibility: hidden; animation-name: none;">
                                   <div class="blog-post blog-post-style1 xs-text-center">
                                       <div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">
                                           <a href="blog-post-layout-01.html">
                                               <img src="/images/blog-img15.jpg" alt="" data-no-retina="">
                                           </a>
                                       </div>
                                       <div class="post-details">
                                           <span class="post-author text-extra-small text-medium-gray text-uppercase display-block margin-10px-bottom xs-margin-5px-bottom">17 Մայիս 2017 |  <a href="#" class="text-medium-gray">Մ. Մուրադյան</a></span>
                                           <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block sm-width-100">«Միռ» միջպետական հեռուստառադիոընկերության Հայաստանի մասնաճյուղի ներկայանալի կամ մուտքի կեսժամանոց հաղորդումը</a>
                                           <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb sm-margin-15px-tb"></div>
                                           <p class="width-90 xs-width-100">Սակայն, ցավոք, Այն լրագրողների կամ քաղաքագետների կողմից չի հորինվել...</p>
                                       </div>
                                   </div>
                               </div>
                               <!-- end post item -->
                               <!-- start post item -->
                               <div class="col-md-3 col-sm-6 col-xs-12 last-paragraph-no-margin sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                                   <div class="blog-post blog-post-style1 xs-text-center">
                                       <div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">
                                           <a href="blog-post-layout-01.html">
                                               <img src="/images/blog-img16.jpg" alt="" data-no-retina="">
                                           </a>
                                       </div>
                                       <div class="post-details">
                                           <span class="post-author text-extra-small text-medium-gray text-uppercase display-block margin-10px-bottom  xs-margin-5px-bottom">03 Հուլիս 2017 | <a href="#" class="text-medium-gray">Մ. Մուրադյան</a></span>
                                           <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block sm-width-100">«Միռ» միջպետական հեռուստառադիոընկերության Հայաստանի մասնաճյուղի ներկայանալի կամ մուտքի կեսժամանոց հաղորդումը</a>
                                           <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb sm-margin-15px-tb"></div> 
                                           <p class="width-90 xs-width-100">Սակայն, ցավոք, Այն լրագրողների կամ քաղաքագետների կողմից չի հորինվել...</p>
                                       </div>
                                   </div>
                               </div>
                               <!-- end post item -->
                               <!-- start post item -->
                               <div class="col-md-3 col-sm-6 col-xs-12 last-paragraph-no-margin xs-margin-30px-bottom wow fadeIn" data-wow-delay="0.4s" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                                   <div class="blog-post blog-post-style1 xs-text-center">
                                       <div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">
                                           <a href="blog-post-layout-01.html">
                                               <img src="/images/blog-img17.jpg" alt="" data-no-retina="">
                                           </a>
                                       </div>
                                       <div class="post-details">
                                           <span class="post-author text-extra-small text-medium-gray text-uppercase display-block margin-10px-bottom  xs-margin-5px-bottom">22 Հունիս 2017 | <a href="#" class="text-medium-gray">Մ. Մուրադյան</a></span>
                                           <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block sm-width-100">«Միռ» միջպետական հեռուստառադիոընկերության Հայաստանի մասնաճյուղի ներկայանալի կամ մուտքի կեսժամանոց հաղորդումը.</a>
                                           <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb sm-margin-15px-tb"></div>
                                           <p class="width-90 xs-width-100">Սակայն, ցավոք, Այն լրագրողների կամ քաղաքագետների կողմից չի հորինվել...</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-3 col-sm-6 col-xs-12 last-paragraph-no-margin xs-margin-30px-bottom wow fadeIn" data-wow-delay="0.4s" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                                    <div class="blog-post blog-post-style1 xs-text-center">
                                        <div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">
                                            <a href="blog-post-layout-01.html">
                                                <img src="/images/blog-img17.jpg" alt="" data-no-retina="">
                                            </a>
                                        </div>
                                        <div class="post-details">
                                            <span class="post-author text-extra-small text-medium-gray text-uppercase display-block margin-10px-bottom  xs-margin-5px-bottom">22 Հունիս 2017 | <a href="#" class="text-medium-gray">Մ. Մուրադյան</a></span>
                                            <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray width-90 display-block sm-width-100">«Միռ» միջպետական հեռուստառադիոընկերության Հայաստանի մասնաճյուղի ներկայանալի կամ մուտքի կեսժամանոց հաղորդումը.</a>
                                            <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb sm-margin-15px-tb"></div>
                                            <p class="width-90 xs-width-100">Սակայն, ցավոք, Այն լրագրողների կամ քաղաքագետների կողմից չի հորինվել...</p>
                                        </div>
                                    </div>
                                </div>
                               <!-- end post item -->
                           </div>
                        
                            </div>
               </div>
                   </div>
               </div>
           </section>
           <!-- end blog content section -->  
    
           <section class="no-padding_top">
                <div class="container"></div>
            </section>
  
@include('includes.footer')
<!-- start scroll to top -->
<a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
@include('../includes.scripts')

<script>

    $("#html_div img").click(function(){
        $("#see_all_images_ns").css("display","block");
        $("#see_all_images_ns img").attr("src",$(this).attr("src"))
    })

    $("#see_all_images_ns").click(function(){
        $("#see_all_images_ns").css("display","none");
    })

    $("#go_db_btn_comment").click(function(){
        $.post(
            "/php/set_comment.php",
            {
                name: $("#name_comment_inp_ns").val(),
                mail: $("#mail_comment_inp_ns").val(),
                opinion: $("#opinion_comment_inp_ns").val(),
                id: $("#hidden_id_comments_narek").val()
            },
            function(result){
                $("#comment_answer_ns").val(result);
            }
        )
        $("#name_comment_inp_ns").val(""),
        $("#mail_comment_inp_ns").val(""),
        $("#opinion_comment_inp_ns").val("")
    })
    
</script>

</body>
</html>
