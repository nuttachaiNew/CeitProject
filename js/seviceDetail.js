var id=location.search.split("=")[1];
var sta;
var type={} ;
var service1={};
var service2={};
var service3={};
var service4={};
var service5={};
service1['Y']="ประกอบบทเรียน"
service2['Y']="บันทึกการสอนในห้องเรียน"
service3['Y']="สื่อเสียง"
service4['Y']="ภาพนิ่ง"

type["education"]="การเรียนการสอน";

// type["education"]="การเรียนการสอน";
$( document ).ready(function() {	
   getData();
});
function getData(){

	if(id==null || id=='undefined'){
	// var xmlHttp = new XMLHttpRequest();
	//  	xmlHttp.open("GET","php/serviceDetail.php",false);
	//  	xmlHttp.send(null);
	//  	var str =xmlHttp.responseText;
	//  	var text=str.split(",");
	//  	$("#serviceID").val(text[0])
	//  	$("#time").val(text[1])
	//  	$("#date").val(text[2])
	//  	$("#serviceLocation").val(text[3])	
	//
		// console.log("no paramiter"); 
	 }else{
	 	
	 	var xmlHttp = new XMLHttpRequest();
	 	xmlHttp.open("GET","php/serviceDetail.php?id="+id,false);
	 	xmlHttp.send(null);
	 	var workDetail="";
	 	var str =xmlHttp.responseText;
	 	var text=str.split(",");
	 	// console.log(text.length)
	 	$("#serviceID").val(text[0])
	 	$("#time").val(text[1])
	 	$("#date").val(text[2])
	 	$("#serviceLocation").val(text[3])
	 	sta=text[4];	
	 	$("#descript").text(text[5]);
	 	if([text[6]]=="publicRelation"){
	 	$("#serviceType").val("ประชาสัมพันธ์");
	 	}else if([text[6]]=="education"){
	 			$("#serviceType").val("เพื่อการเรียนการสอน");
	 	}
	 	
	 		$("#copyQty").val(text[7]);
	 	if(text[4]=='waiting'){
	 		// $("#approve").show()
	 		$("#print").show()
	 	}else if(text[4]=='created'){
	 		$("#edit").show()
	 		$("#print").show()
	 	}else if(text[4]=='working'){
	 		// console.log("wait working event ");
	 	}
	   if(text[8]!="" || text[8]!=null){
	   	 workDetail+=text[8]+" ";
	   } 
	   if(text[9]!="" || text[9]!=null){
	   	 workDetail+=text[9]+" ";
	   }
	    if(text[10]!="" || text[10]!=null){
	   	 workDetail+=text[10]+" ";
	   }
	    if(text[11]!="" || text[11]!=null){
	   	 workDetail+=text[11]+" ";
	   }
	   $("#workDetail").val(workDetail);
	   console.log(text[11]+","+text[12])
	   if(text[12]=="0"){
	   	$("#freeLance").val("ไม่")
	   }else{
	   	 	$("#freeLance").val("ใช่")
	  		$("#whoPay").val(text[13])
	   }
	 		$("#recieveDate").val(text[14])

	 }

}



$("#edit").click(function(){
		$("#serviceLocation").prop("readonly",false);
		$("#descript").prop("readonly",false);
		$("#time").prop("readonly",false);
		$("#date").prop("readonly",false);
		$("#edit").hide();
		$("#save").show();
});


$("#save").click(function(){
	var id=$("#serviceID").val()
	var time=$("#time").val()
	var date=$("#date").val()
	var serviceLocation =$("#serviceLocation").val();
	var descript=$("#descript").val();
		

$.ajax({				   type: "GET",
							   url: "php/serviceUpdate.php",
							   cache: false,
							   data:"id="+id+"&date="+date+"&time="+time+"&serviceLocation="+serviceLocation+"&workDescription="+descript,
							   success: function(msg){
										alert("แก้ไขข้อมูลเรียบร้อย !");
										$("#approveModal").modal("hide");
											$("#serviceLocation").prop("readonly",true);
											$("#descript").prop("readonly",true);
											$("#time").prop("readonly",true);
											$("#date").prop("readonly",true);
											
											$("#edit").show();
											$("#save").hide();
																			// location.reload(true); 

										}
							 });		


	
});

$("#print").click(function(){
	var id=$("#serviceID").val()
	var status="waiting";
	var xmlHttp = new XMLHttpRequest();
	 	xmlHttp.open("GET","php/status.php?id="+id+"&status="+status,false);	
		xmlHttp.send(null);
		location.reload(true); 

		
});
			

$("#approveConfirm").click(function(){
	var serviceID=$("#serviceID").val()
	var ind1=$("#ind1").val()
	var ind2=$("#ind2").val()
	var emp1=$("#emp1").val()
	var emp2=$("#emp2").val()
	var emp3=$("#emp3").val()
	console.log(ind1+" "+ind2+" "+emp1+" "+emp2+" "+emp3);

	if(ind2=="0"){
		ind2=null;
		// console.log(ind2)
	}
	if(emp2=="0"){
		emp2=null;
	}
	if(emp3=="0"){
		emp3=null;
		
	}
	if(emp1=="0" || ind1=="0" ){

		
				$('#approveConfirm').popover('show');

		// กรุณากรอกให้ครบ
	}else{
		$('#approveConfirm').popover('hide');
			$.ajax({
				   type: "POST",
				   url: "php/approve.php",
				   cache: false,
				   data: "serviceID="+serviceID+"&ind1="+ind1+"&ind2="+ind2+"&emp1="+emp1+"&emp2="+emp2+"&emp3="+emp3,
				   success: function(msg){
							
							//update document stage; 
							$.ajax({
							   type: "GET",
							   url: "php/statusUpdate.php",
							   cache: false,
							   data: "id="+serviceID+"&status=approve",
							   success: function(msg){
										alert("อนุมัติงานเรียบร้อย !");
										$("#approveModal").modal("hide");
										location.reload(true); 

										}
							 });
					}
				 });
	}

	
});