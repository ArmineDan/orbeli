$("#take_mail").click(function(){
            var id=$(this).attr('class')
            $.post( "/php/get_e_l.php", {id:id},function( data ) {
            $( "#em_status").html( data );
            $( "#em_status").parent().attr('href','mailto:'+data)
            });

        })
com_btn.addEventListener('click', function(){
        var  c = document.getElementById("com_form");
        c.className += " wow fadeInUp active";
        c.style.display='block'
        com_btn.style.display='none'
    
        })
        $("#send_comment").click(function(){
            //alert("hello");
        })
        