    var y = 5;
    var x = 0;

    $("#ns_click_plus_com_btn").click(function(){
		var post_id=$(this).parent().attr('name')
           
        let count_comm = $(this).parent().attr('class')%5;
        if(count_comm == 0){            
          let count = $(this).parent().attr('class')/5;
            if(x <= count){
				  $.post(
                    "/php/comment.php", 
                    {offset: y, id:post_id}, 
                    function(result){
                        $("#narek_db_comments").append(result);
                        y+=5;
					   x++;
					   if(x == count){
						 $("#more_n").hide(1000);
						}
                    }
                )
			}
           
		   
        }
        else {
		  let count = $(this).parent().attr('class')/5;
          let flot=Math.floor(count)+1;           
            if(x <= flot){
                $.post(
                    "/php/comment.php", 
                    {offset: y, id:post_id}, 
                    function(result){
                        $("#narek_db_comments").append(result);
					   y+=5;
					   x++;
					   if(x == flot){
						 $("#more_n").hide(1000);
						}
                    }
                )
            }           
        }
    })


$(".take_mail").click(function(){	
            var id=$(this).attr('id')
            $.post( "/php/get_e_l.php", {id:id},function( data ) {
            $( "#em_status"+id).html( data );
            $( "#em_status"+id).parent().attr('href','mailto:'+data)
            });

        })
com_btn.addEventListener('click', function(){
        var  c = document.getElementById("com_form");
        c.className += " wow fadeInUp active";
        c.style.display='block'
        com_btn.style.display='none'
    
        })
       

