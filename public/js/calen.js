
  $('.calendar').mouseleave(     
    function(){
         var self=$(this);
      self.css("display","none");
    }
  )
  $('#arch').mouseleave(     
    function(){
        $('.calendar').css("display","none").toggleClass("highlight");
    }
  )
$("#arch").mouseover(function(){ 

//alert("aaaaaaa");
    $('[id^="calendar"]').fullCalendar('today');
    $('.calendar').css("display","block").toggleClass("highlight");
  
})

    