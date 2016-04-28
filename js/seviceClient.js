var date;
var recieveDate;
var time;
var serviceLocation;
var serviceType;
var subjectCode;
var subjectName="";
var service1;
var service2;
var service3;
var service4;
var service5;
var copyQty;
var	freeLance;
var whoPay;
var workDescription;
var object;
var newInsert;
$( document ).ready(function() {
    // console.log( "ready!" );
    $("#complete").hide();
	checkWork();
	statusDisplay();
			var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);	
	
		  var checkin = $('#date').datepicker({
		  onRender: function(date) {
		    return date.valueOf() < now.valueOf() ? 'disabled' : '';
		 	 }
		  }).on('changeDate', function(ev) {
		  	 	 if (ev.date.valueOf() > checkout.date.valueOf()) {
			    var newDate = new Date(ev.date)
			    newDate.setDate(newDate.getDate()+1 );
			    checkout.setValue(newDate);
			  }
			   checkin.hide();
			     // $('#recieveDate')[0].focus();
			}).data('datepicker');
			var checkout = $('#recieveDate').datepicker({
				  onRender: function(date) {
				    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
				  }
				}).on('changeDate', function(ev) {
				  checkout.hide();
				}).data('datepicker');

});


function statusDisplay(){
	var xmlHttp = new XMLHttpRequest();
	 	xmlHttp.open("GET","php/statusService.php",false);
	 	xmlHttp.send(null);
	 	var text =xmlHttp.responseText;
	 	var ch = text.split(".");
	 	var sub={};
	 	var id={};
	 	var status={};
	 	// $.each(ch,function(index,item){
	 	// 		if(item==""||item==null){
	 				// console.log("null")
	 	// 		}else{
	 	// 			console.log(item)
	 	// 		}
	 			
	 	// });

	 	for(i=0;i<ch.length-1;i++){	
			sub[i]=ch[i].split(",");
			id[i]=sub[i][0];
			status[i]=sub[i][1];
			// /console.log(id[i]+" "+status[i])
			// console.log($("#status"+id[i]).text());
			if($("#status"+id[i]).text()=='created'){
				$("#status"+id[i]).addClass("label-defualt");
			}else if($("#status"+id[i]).text()=='waiting'){
				$("#status"+id[i]).addClass("label-info");			
			}else if($("#status"+id[i]).text()=='working'){
				$("#status"+id[i]).addClass("label-success");			
			}else if($("#status"+id[i]).text()=='approve'){
				$("#status"+id[i]).addClass("label-warning");			
			}else if($("#status"+id[i]).text()=='complete'){
				$("#status"+id[i]).addClass("label-danger");			
			}

		}
}


function checkWork(){


	// var xmlHttp = new XMLHttpRequest();
	//  	xmlHttp.open("GET","php/newWork.php",false);
	//  	xmlHttp.send(null);
	//  	var qty =parseInt(xmlHttp.responseText);
	//  	if(qty<0){
	//  			$("#alertNewWork").hide() 		
	//  	}else{
	//  			$("#alertNewWork").show() 		 		
	//  	}

	//  	$(".newwork").text(qty);
}

$("#addType").change(function(){
				$("#serviceDetail").empty()
				if($("#addType").val()=="education"){
					$("#serviceDetail").append("<div class='col-sm-offset-2 col-sm-4'>"+
						"<label>รหัสวิชา  </label><input class='form-control' type='text' maxlength='6' class='numbersOnly' id='codeSub' /> </div>"+
						"<div class='col-sm-6'><label>ชื่อวิชา </label><input class='form-control' type='text' maxlength='25' id='nameSub' /></div>"+
						"<div class='form-group ' style='margin-top:1%'><p class='col-sm-offset-2 col-sm-10'><input type='checkbox' id='e1'/> &nbsp;<label>ประกอบบทเรียน</label> </p>"+
						"<p class='col-sm-offset-2 col-sm-10'><input type='checkbox' id='e2'/>&nbsp;<label>บันทึกการสอนในห้องเรียน* 300ที่ขึ้นไป</label></p>"+
						"<p class='col-sm-offset-2 col-sm-10'><input type='checkbox' id='e3'/>&nbsp;<label>สื่อเสียง</label></p>"+
						"<p class='col-sm-offset-2 col-sm-10'><input type='checkbox' id='e4'/>&nbsp;<label>ภาพนิ่ง</label></p>"+
						"<p class='col-sm-offset-2 col-sm-4'><input type='checkbox' id='e5'/>&nbsp;<label>สำเนาสื่อ จำนวน</label><input type='text' id='qty' class='form-control' disabled='true'/></div></p>"+
						"<div class='form-group'><p class='col-sm-offset-2 col-sm-10'><label><input type='checkbox' id='freeLance'/>&nbsp;งานส่วนตัว/งานภายนอก</label><input type='text' id='whoPay' class='form-control' disabled='true'/></p></div>"+
						"<p class='col-sm-offset-2 col-sm-10'><label>ลักษณะงานพอสังเขป <span style=' color: red;''>*</span> </label><input type='text' class='form-control' id='workDetail' /></p>"
						)	
				}
					if($("#addType").val()=="publicRelation"){
					$("#serviceDetail").append("<div class='col-sm-offset-2 col-sm-4'>"+
						"<p class='col-sm-10'><input type='checkbox' id='a1'/>&nbsp;<label>สื่อวิดีทัศน์</label></p>"+
						"<p class='col-sm-offset-1 col-sm-11'><input type='radio' name='subA1' value='1' disabled='true'/>ความยาวน้อยกว่า 1 นาที</p>"+
						"<p class='col-sm-offset-1 col-sm-11'><input type='radio' name='subA1' value='2' disabled='true'/>ความยาว 1-5 นาที</p>"+
					    "<p class='col-sm-offset-1 col-sm-11'><input type='radio' name='subA1' value='3' disabled='true'/>ความยาว 5-15 นาที</p>"+
						"<p class='col-sm-10'><input type='checkbox' id='a2'/>&nbsp;<label>สื่อเสียง</label></p>"+
						"<p class='col-sm-10'><input type='checkbox' id='a3'/>&nbsp;<label>ข่าว</label></p>"+
						"<p class='col-sm-10'><input type='checkbox' id='a4'/>&nbsp;<label>ภาพนิ่ง</label></p>"+
						"<p class='col-sm-10'><input type='checkbox' id='e5'/>&nbsp;<label>สำเนาสื่อ จำนวน</label><input type='text' id='qty' class='form-control' disabled='true'/></div></p>"+
						"<div class='form-group'><p class='col-sm-offset-2 col-sm-10'><label><input type='checkbox' id='freeLance'/>&nbsp;งานส่วนตัว/งานภายนอก</label><input type='text' id='whoPay' class='form-control' disabled='true'/></p></div>"+
						"<p class='col-sm-offset-2 col-sm-10'><label>ลักษณะงานพอสังเขป<span style='color: red;'>*</span> </label><input type='text' class='form-control' id='workDetail' /></p>"
						)	
				}
				$("#e5").click(function(){
						if( $("#e5").prop("checked")==true){
							$("#qty").prop("disabled",false)
						}else{
							$("#qty").prop("disabled",true)
					}
				})
				$("#a1").click(function(){
						if( $("#a1").prop("checked")==true){
							$("input[name='subA1']").prop("disabled",false)
						}else{
							$("input[name='subA1']").prop("disabled",true)
				
					}
				})

				

					$("#freeLance").click(function(){
						if( $("#freeLance").prop("checked")==true){
							$("#whoPay").prop("disabled",false)
						}else{
							$("#whoPay").prop("disabled",true)
					}
				})
			})
					// $(function(){
					// 		$('.datepicker').datepicker(
							
					// 			)
								
					// });



$("#addDataDetail").click(function(){
	 date=$("#date").val();
	 time=$("#time").val();
	 serviceLocation=$("#location").val();
	 serviceType=$("#addType").val();
	 subjectCode=$("#codeSub").val();
	 subjectName=$("#nameSub").val();	
	 workDescription=$("#workDetail").val();
	 recieveDate=$("#recieveDate").val();
	// รับค่าradio ที่ checked
	
 if(serviceType=="publicRelation"){
 	if($("#a1").prop("checked")){
	 	service1="สื่อวิดีทัศน์";
	 }else{
	 	service1="";
	 }

	  if($("input[name='subA1']:checked").val()!=null || $("input[name='subA1']:checked").val()!="" || $("input[name='subA1']:checked").val()!='undefined'){
	 		if($("input[name='subA1']:checked").val()=="1"){
	 			service1+=" ความยาวน้อยกว่า 1 นาที";
	 			console.log(service1)
	 		}else if($("input[name='subA1']:checked").val()=="2"){
	 			service1+=" ความยาว 1-5 นาที";
	 			console.log(service1)
	 		}else if($("input[name='subA1']:checked").val()=="3"){
	 			service1+=" ความยาว 5-15 นาที";
	 			console.log(service1)
	 		}
	 }
	 if($("#a2").prop("checked")){
	 	service2="สื่อเสียง";
	 }else{
	 	service2="";
	 }
	 if($("#a3").prop("checked")){
	 	service3="ข่าว";
	 }else{
	 	service3="";
	 }if($("#a4").prop("checked")){
	 	service4="ภาพนิ่ง";
	 }else{
	 	service4="";
	 }
	}else if(serviceType=='education'){
				if($("#e1").prop("checked")){
				 	service1="ประกอบบทเรียน";
				 }else{
				 	service1="";
				 }

				 if($("#e2").prop("checked")){
				 	service2="บันทึกการสอนในห้องเรียน";
				 }else{
				 	service2="";
				 }

				 if($("#e3").prop("checked")){
				 	service3="สื่อเสียง";

				 }else{
				 	service3="";
				 }

				 if($("#e4").prop("checked")){
				 	service4="ภาพนิ่ง";
				 }else{
				 	service4="";
				 }

	}

	
	



	
	
	 if($("#e5").prop("checked")){
	 	service5="1";
	 	copyQty=parseInt($("#qty").val());
	 }else{
	 	service5="0";
	 	copyQty=0;
	 }
	 if($("#freeLance").prop("checked")){
	 	freeLance="1";
	 	whoPay=$("#whoPay").val();
	 }else{
	 	freeLance="0";
	 	whoPay="";
	 	// copyQty=0;
	 }
	// console.log(service1+" "+service2+" "+service3+" "+service4+" "+service5);
		if(date=="" || date==null || time=="" || time ==null || recieveDate =="" || recieveDate==null || serviceLocation==null || serviceLocation=="" || serviceType=="0" || workDescription=="" || workDescription==null){
		// console.log("fail")	
				$('#addDataDetail').popover('show');
				 // $("[data-toggle = 'popover']").popover();
				
	}else{
					$('#addDataDetail').popover('hide');
		$("#addDetailModal").modal("hide");
		 var xmlHttp = new XMLHttpRequest();
	 	xmlHttp.open("GET","php/process.php?date="+date+"&time="+time+"&serviceLocation="+serviceLocation+"&serviceType="+serviceType+"&subjectCode="+subjectCode+"&subjectName="+subjectName+"&workDescription="+workDescription+"&service1="+service1+"&service2="+service2+"&service3="+service3+"&service4="+service4+"&service5="+service5+"&copyQty="+copyQty+"&freeLance="+freeLance+"&whoPay="+whoPay+"&recieveDate="+recieveDate,false);
	 	xmlHttp.send(null);
		location.reload(true); 

		$("#resultModal").modal("show");
	}

	 	
		// $("#complete").show();
});



$("#confirm").click(function(){

	
	 	
})
$("#search").click(function(){
	$("#dataGrid").empty()
	$("#dataGrid").append("<tr><td align='center'><a href='serviceDetail.html' class='btn btn-warning' id='idasd'><span class='fa fa-file-text-o'></span></a></td></tr>");
});


$("#date").focus(function(){
	$('#addDataDetail').popover('hide');
})
$("#time").change(function(){
	$('#addDataDetail').popover('hide');
})
$("#recieveDate").focus(function(){
	$('#addDataDetail').popover('hide');
})
$("#location").change(function(){
	$('#addDataDetail').popover('hide');
})
$("workDetail").change(function(){
	$('#addDataDetail').popover('hide');
})

