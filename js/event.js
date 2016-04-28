

$("#pic").click(function(){
			$("#mainMenu").show()
		})
		$("#navlogo").click(function(){
			$("#mainMenu").hide()
		})

		$("#collapse").click(function(){
  		  if($("#caretdown").hasClass("fa fa-caret-down")){
        	$("#caretdown").attr("class", "fa fa-caret-up");
   		 } else if($("#caretdown").hasClass("fa fa-caret-up")){
       		 $("#caretdown").attr("class", "fa fa-caret-down");
   		 }
	});

$(".numbersOnly").keypress(function (e){
   if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57 )){
       return false;
   }
});