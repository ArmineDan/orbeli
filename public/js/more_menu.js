$(window).load(function(){
	var w = $(this).width();  
if(w <= 1130){
	 $("#mor").removeClass("moree");	
	 //console.log(w+"load")  
}
else{
	$("#mor").addClass("moree");	
	 //console.log(w+"elseload")
}}) 


$(window).resize(function(){
	var w = $(this).width();  
if(w <= 1130){
	 $("#mor").removeClass("moree");	
	  //console.log(w+"resize")
}
else{
	$("#mor").addClass("moree");
  //console.log(w+"elseresize")	
}})