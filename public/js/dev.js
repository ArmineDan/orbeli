    var y = 0;
    var x = 0;

    $("#ns_click_plus_com_btn").click(function(){
        y+=5;
        x++;      
        let count_comm = $(this).parent().attr('class')%5;
       console.log(  count_comm)
        if(count_comm == 0){            
          let count = $(this).parent().attr('class')/5;
          console.log( count)
            if(x <= count){
                $.post(
                    "/php/comment.php", 

                    {offset: y}, 

                    function(result){
                        $("#narek_db_comments").append(result);
                        count_comm-5;
                    }
                )
            }
            else{
                $("#more_n").hide(1000);
            }
        }
        else {
			console.log("aaaaaaaaaaaa")
                
          let count = $(this).parent().attr('class')/5;
          let flot=Math.floor(count)+1;
          console.log(flot ,"flot");
		  console.log(x,"xxx");
		  console.log(y,"yyy");
		  
            if(x <= flot){
                $.post(
                    "/php/comment.php", 

                    {offset: y}, 

                    function(result){
                        $("#narek_db_comments").append(result);
                        count_comm-5;
                    }
                )
            }
            else{
                $("#more_n").hide(1000);
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
       

