$(".autors_narek_mail_icon").click(function(){
    $.post(
        "/php/author_mail.php",
        {
            id: $(this).children().html() 
        },
        function (result){
            $(this).children().find("em").html(result)
        }
    )
})