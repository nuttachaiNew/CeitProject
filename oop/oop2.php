<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/master.css">

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<title>OOP Tutorials</title>
</head>

<body>
<div class="container">
	
<?php
	
	class magicnow{
		protected $mydata;
		public function setData($mydata){
			$this->mydata=$mydata;
		}public function getData(){
			return $this->mydata;
		}
	}
?>

</div>

</body>

</html>