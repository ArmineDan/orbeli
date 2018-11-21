$(".autors_narek_mail_icon").click(function(){
    
    var self = $(this);
    $.post(
        "/php/author_mail.php",
        {
            id: $(this).find("em").html() 
        },
        function (result){
            self.next().html(result)
        }
    )
})