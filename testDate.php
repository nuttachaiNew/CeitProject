<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/master.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />

  

  <script type="text/javascript" src="lib/site.js"></script>
  <link rel="stylesheet" type="text/css" href="lib/site.css" />

<script type="text/javascript">

$( document ).ready(function() {

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
								



 
</script>

</head>
<body>

    <input class="datepicker" type="text" id="date" />
 <input class="datepicker" type="text" id="recieveDate" />


</body>

</html>