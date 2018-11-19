<div id="see_all_images_ns"> <center><img src=""></center> </div>
@include('../includes.links')
    <body>
            @include('../includes.facebook_script' )
        <header>
            @include('includes.header')
            </header>
          
            <section class="visible1">
                <div class="container">
                   <div class="row">
                    <div class="container">
                   <div class="row">
                        <aside class="col-md-2 col-sm-12 col-xs-12 pull-left">  
                                <div class="margin-45px-bottom xs-margin-25px-bottom">                         
                                <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600 aside-title"><span>{{trans('text.author')}}</span></div>
                                   <div style="text-align:center; ">
                                   <a href="{{url($all_last_posts['lang'].'/author/'.$all_last_posts['post'][0]->author_id)}}">
                                    <img src="{{$all_last_posts['post'][0]->aimg}}" alt="" class="border-radius-100 " data-no-retina=""></a>
                                    <div style="margin-top:24px;">
                                      <a  style="font-size: 17px;" href="{{url($all_last_posts['lang'].'/author/'.$all_last_posts['post'][0]->author_id)}}" target="_blanck">{{$all_last_posts['post'][0]->name .' '.$all_last_posts['post'][0]->lastname}} </a>
                                      <div class="display-table height-100 width-100" style="color:black">
                                         <div class="display-table-cell icon-social-small ">
                                            <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                             <a href="{{$all_last_posts['post'][0]->faceebook}}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                             <a href="{{$all_last_posts['post'][0]->twitter}}"  target="_blank"><i class="fa fa-twitter"></i></a>
                                           <a href="{{$all_last_posts['post'][0]->linkedin}}"  target="_blank"><i class="fa fa-linkedin"></i></a>
                                         <a  id="take_mail" class="{{$all_last_posts['post'][0]->author_id}}" href="javascript:void(0);"><i class="fa fa-envelope"></i></a>
                                           <a href="#">
                                           <div id="em_status"></div>
                                           </a>
                                         </div>
                                     </div> </div>
                                 </div>                           
                                </div>                         
                            </aside>
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
                           <h4 class="alt-font font-weight-600 text-extra-dark-gray" style="text-indent:22px; padding:0 12px">{{$all_last_posts['post'][0]->title}} </h4>
                            <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
						   
						   <div id="html_div" class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">
                                <?php echo html_entity_decode($all_last_posts['post'][0]->html_code, ENT_QUOTES | ENT_XML1, 'UTF-8'); ?>
                                <div class="separator-line-horrizontal-full bg-medium-gray margin-seven-tb md-margin-four-tb"></div>
                                <div class="author">                              
                            <span class="text-medium-gray  text-extra-small pull-right padding-15px-left display-inline-block"><i class="fa fa-eye"></i> {{$all_last_posts['post'][0]->p_duratioan.' '.trans('text.minute') }} &nbsp;&nbsp;|&nbsp;&nbsp;{{$all_last_posts['post'][0]->date}}</span>
                            </div>
                            </div>
                           
                            @isset($all_last_posts['docs'])
                            <p style="color:crimson"> {{count($all_last_posts['docs'])>0?trans('text.hodvac'):''}}</p>
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding">                           
                                    @forelse ($all_last_posts['docs'] as $item)                              
                                            <div class="tag-cloud" > 
    
                                            <a href="{{$item->link}}" download title="{{$item->type}}">
                                                <img width="12" src="/images/icons/{{$item->type}}.png" alt=""  data-no-retina=""> 
                                                {{$item->name}}
                                            </a>
                                                 
                                            </div>
                                    @empty
                                    @endforelse 
                             </div>                                
                            @endisset 
                            
                           <div class="col-md-12 col-sm-12 col-xs-12 margin-15px-bottom" >
                       
                           </div>  
                            <div class="col-md-6 col-sm-12 col-xs-12 sm-text-center">
                               @isset($all_last_posts['tags'])
                                 <div class="tag-cloud margin-20px-bottom">
                                   @for ($i = 0; $i < count($all_last_posts['tags']); $i++)
                                  <a href="{{url( $all_last_posts['lang'].'/tags/'.$all_last_posts['tags'][$i])}}" >{{$all_last_posts['tags'][$i]}}</a>   
                                   @endfor                                                       
                               </div>  
                               @endisset                               
                             </div> 

                             @isset($all_last_posts['comments'] )
                           <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                <ul class="blog-comment" id="narek_comment_ul">
                                        @foreach ($all_last_posts['comments'] as $key => $value )
                                    @if ($key <5)
                                    <li> 
                                            <div class="display-table width-100">                                               
                                                    <div class="padding-40px-left display-table-cell vertical-align-top last-paragraph-no-margin xs-no-padding-left xs-display-block">
                                                        <span class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small">{{$value->c_name}}</span>
                                                            
                                                        <div class="text-small text-medium-gray text-uppercase margin-10px-bottom"><?php echo  date('Y-m-d', strtotime($value->created_at)) ?></div>
                                                        <p style="font-size:12px">{{$value->body}}</p>                      
                                                    </div>
                                                </div>                                            
                                            </li>
                                    @endif                                 
                                                                
                                    @endforeach                               
                                 </ul>
                                 <br/>
                                
                                 <div id="narek_db_comments"></div>                                
                                 <center id="more_n" class="{{count($all_last_posts['comments'])-5}}" 
                                 style="display:{{count($all_last_posts['comments'])-5<0 ? 'none':''}}" ><i class="fa fa-plus" style="font-size: 25px;padding-top: 30px;cursor: pointer" id="ns_click_plus_com_btn"></i></center>
                                  </div>
                           @endisset                     
                           
                     
                       <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <button class="btn btn-dark-gray btn-small margin-15px-top" id="com_btn" >{{trans('text.comment')}}</button>
                              <div class="row wow fadeInUp "  id="com_form"  style="display:none">  
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">                  
                                   <div class="col-md-12 col-sm-12 col-xs-12 margin-eight-top" >
                                       <div class="divider-full bg-medium-light-gray"></div>
                                   </div>
           
                                   <div class="col-md-12 col-sm-12 col-xs-12 margin-lr-auto text-center margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb">
                                       <div class="position-relative overflow-hidden width-100">
                                           <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">{{trans('text.leave_comment')}}</span>
                                       </div>
                                   </div>
                                 
                                   <div class="col-md-6 col-sm-12 col-xs-12">
                                       <input type="text" placeholder="{{trans('text.name')}} *" class="medium-input" id="name_comment_inp_ns">
                                   </div>
                                   <div class="col-md-6 col-sm-12 col-xs-12">
                                       <input type="email" placeholder="{{trans('text.email')}} *" class="medium-input" id="mail_comment_inp_ns">
                                   </div>
                                   <div class="col-md-12 col-sm-12 col-xs-12">
                                      <textarea placeholder="{{trans('text.textarea')}}..." rows="8" class="medium-textarea" id="opinion_comment_inp_ns" maxlength="500"></textarea>
                                     </div>

                                   <input type="hidden" id="hidden_id_comments_narek" value="{{$all_last_posts['id']}}">
                                   <input type="hidden" id="pt_type" value="{{$all_last_posts['folder']}}">
                                   <input type="hidden" id="pt_lang" value="{{$all_last_posts['lang']}}">
                                  <div id="comment_answer_ns"></div>
                                  
                                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">                              
                                    <div class="g-recaptcha" data-sitekey="6LeVzHoUAAAAALgdFaBocO43AD2zgTBB2w8akWOQ"></div>
                                       </div>
                               
                                   <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <button id="send_comment" class="btn btn-dark-gray btn-small margin-15px-top" type="submit">{{trans('text.send')}}</button>
                                   </div>
                              

                                  <div class="col-md-12 col-sm-12 col-xs-12 margin-eight-top" >
                                       <div class="divider-full bg-medium-light-gray"></div>
                                   </div>


                               </div>
                             </div>
                        </div>
                    </main>
                   
             
                        @isset($all_last_posts['same_posts'])
                <div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="display:{{count($all_last_posts['same_posts'])>0?'block':'none'}}">
                                <div class="col-md-12 col-sm-12 col-xs-12 margin-lr-auto text-center margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb">
                                    <div class="position-relative overflow-hidden width-100">
                                        <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">{{trans('text.same_posts')}}</span>

                                    </div>
                                </div> 
                                @for ($i = 0; $i < count($all_last_posts['same_posts']); $i++)
                                @isset($all_last_posts['same_posts'][$i])
                                <div class="col-md-3 col-sm-6 col-xs-12 last-paragraph-no-margin sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn" style="visibility: hidden; animation-name: none;">
                                     <div class="blog-post blog-post-style1 xs-text-center">
                                         <div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">
                                             <a href="{{url( $all_last_posts['lang'].'/'.$all_last_posts['folder'].'/'.$all_last_posts['same_posts'][$i][0]->date.'/'.$all_last_posts['same_posts'][$i][0]->title)}}">
                                                 <img src="{{$all_last_posts['same_posts'][$i][0]->img}}" alt="" data-no-retina="">
                                             </a>
                                         </div>
                                         <div class="post-details">
                                             <span class="post-author text-extra-small text-medium-gray text-uppercase display-block margin-10px-bottom xs-margin-5px-bottom">{{$all_last_posts['same_posts'][$i][0]->date}} |  <a href="#" class="text-medium-gray">{{substr($all_last_posts['same_posts'][$i][0]->name, 0, 2) .'. '. $all_last_posts['same_posts'][$i][0]->lastname}}</a></span>
                                         <a href="{{url( $all_last_posts['lang'].'/'.$all_last_posts['folder'].'/'.$all_last_posts['same_posts'][$i][0]->date.'/'.$all_last_posts['same_posts'][$i][0]->title)}}"  class="post-title text-medium text-extra-dark-gray width-90 display-block sm-width-100">{{$all_last_posts['same_posts'][$i][0]->title}}</a>
                                             <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb sm-margin-15px-tb"></div>
                                             <p class="width-90 xs-width-100">{{$all_last_posts['same_posts'][$i][0]->short_text}}</p>
                                         </div>
                                     </div>
                                 </div> 
                                 @endisset                               
                                @endfor 
                         </div>          
                        @endisset
                                      
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
<script type="text/javascript" src="/js/dev.js"></script>
<script>
    $("#html_div img").click(function(){
        $("#see_all_images_ns").css("display","block");
        $("#see_all_images_ns img").attr("src",$(this).attr("src"))
    })

    $("#see_all_images_ns").click(function(){
        $("#see_all_images_ns").css("display","none");
    })
   
    $("#send_comment").click(function(){
              
		if($("#name_comment_inp_ns").val() == ''){
            $("#name_comment_inp_ns").css("border","1px inset red");
        }else if($("#mail_comment_inp_ns").val() == ''){
            $("#mail_comment_inp_ns").css("border","1px inset red");
        }else if($("#opinion_comment_inp_ns").val() == ''){
		$("#opinion_comment_inp_ns").css("border","1px inset red");}
		else if($('#g-recaptcha-response').val()==''){			 
             $("#comment_answer_ns").html("{{trans('text.robot')}}");	
        }else{
            $.post( 
                "/php/set_comment.php",
                {
                    name: $("#name_comment_inp_ns").val(),
                    mail: $("#mail_comment_inp_ns").val(),
                    opinion: $("#opinion_comment_inp_ns").val(),
                    id: $("#hidden_id_comments_narek").val(),
                    type: $("#pt_type").val(),
                    lang: $("#pt_lang").val(),
					capthca:$('#g-recaptcha-response').val()
                },
                function(result){
					if(result=='OK'){
						 $("#comment_answer_ns").html("{{trans('text.send_comment_ok')}}");		
							setTimeout(()=>{
								
							$("#com_form").slideUp( "slow", function() {
								$("#com_btn").show();
								console.log("aaaa");
							  });															
							},1000) 
					}   
					else{
						
						 $("#comment_answer_ns").html("{{trans('text.send_comment_error')}}");				
					
					}
                   
                }
            )
            $("#name_comment_inp_ns").val(""),
            $("#mail_comment_inp_ns").val(""),
            $("#opinion_comment_inp_ns").val("")

            $("#name_comment_inp_ns").css("border","1px solid #d1d1d1"),
            $("#mail_comment_inp_ns").css("border","1px solid #d1d1d1"),
            $("#opinion_comment_inp_ns").css("border","1px solid #d1d1d1")
        }
			  
         
		
       
    })    
</script>

{!!  $all_last_posts['event']->script() !!}
</body>
</html>
