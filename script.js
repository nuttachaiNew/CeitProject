$(function(){

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',  //  prevYear nextYea
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
        },  
        buttonIcons:{
            prev: 'left-single-arrow',
            next: 'right-single-arrow',
            prevYear: 'left-double-arrow',
            nextYear: 'right-double-arrow'         
        },       

        events: {
            url: 'data_events.php',
            error: function() {

            }
        },    
        eventLimit:true,
//        hiddenDays: [ 2, 4 ],
        lang: 'th',
        dayClick: function() {
         
           // var view = $('#calendar').fullCalendar('getView');
           // alert("The view's title is " + view.title);
     
        } ,
          eventClick: function(calEvent, jsEvent, view) {
                queryValue(calEvent.id)
        // alert('Event: ' + calEvent.id);
                
    }

// end calendar
    });

  
    
});

function queryValue(id){
    
     $.ajax({
           type: "POST",
           url: "php/queryWork.php",
           cache: false,
           data: "serviceID="+id,
           success: function(msg){
                    var text=msg.split(",");
                    var date=text[0];
                    var time=text[1];
                    var serviceLocation=text[2];
                    var workDescription=text[3];
                    var emp1=text[4];
                    var emp2=text[5];
                    var emp3=text[6];
                //
                 $.ajax({
                           type: "POST",
                           url: "php/userData.php",
                           cache: false,
                           data:"id="+id,
                           success: function(msg){
                              var use=msg.split(",");
                               $("span#user").text("");
                                $("span#tel").text("");
                                $("span#user").text(use[0]);
                                $("span#tel").text(use[1]);
                           }
                         })

                   $.ajax({
                           type: "POST",
                           url: "php/employeeData.php",
                           cache: false,
                           data:"id="+id,
                           success: function(msg){
                                var text=msg.split(",");
                                // console.log(text[0]+""+text[1]+""+text[2])
                                     $.ajax({
                                             type: "POST",
                                             url: "php/employee.php",
                                             cache: false,
                                             data:"empid1="+emp1+"&empid2="+emp2+"&empid3="+emp3,
                                               success: function(msg){
                                                var emp = msg.split(",");
                                                emp1=emp[0];
                                                emp2=emp[1];
                                                emp3=emp[2];
                                               // console.log(date+" : "+time+" : "+serviceLocation+" : "+workDescription+" : "+emp1+" : "+emp2+" : "+emp3+" : ")
                                                $("span#emp1").text("");
                                                $("span#emp2").text("");
                                                $("span#emp3").text("");
                                               
                                                $("span#date").text(date); 
                                                $("span#time").text(time); 
                                                $("span#serviceLocation").text(serviceLocation);
                                                $("span#workDescription").text(workDescription);
                                                $("span#emp1").text(emp1);
                                                $("span#emp2").text(emp2);
                                                $("span#emp3").text(emp3);
                                               
                                                     $("#showValue").modal("show");
                                               }
                                             });

                           }
                         });
                   
              }// success:
            });
   
}

$( document ).ready(function() {
    notify()

});

function notify(){
   $.ajax({
            type: "POST",
            url: "php/notifyWork.php",
            cache: false,
                 success: function(msg){
                    var value=msg.split(",");
                    $("span#work").append(value[0]);
                    $("span#dates").append(value[1]);
                    $("span#times").append(value[2]);
                    $("span#locate").append(value[3]);
                 }
             });    
}