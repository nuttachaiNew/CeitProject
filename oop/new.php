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
	<div class="form-horizontal">
		<h4>ตรวจดู Classที่มีการใช้งาน</h4>
		<?php
			class firstClass{
				public $name;
				public function setName(){
					$this->name ="IT#16";
				}public function getName(){
					return $this->name;
				}
			}
			class secondClass{
				public $no;
				public function setNo(){
					$this->no ="6722";
				}public function getNo(){
					return $this->no;
				}
			}
			$allClasses = get_declared_classes();  //ตรวจว่ามีคลาสอะไรใช้งานอยู่มั้ง
			foreach ($allClasses as $value) {
				echo $value;
			}
			echo "<hr/>";
			echo "<h4>ตรวจสอบว่ามีคลาสนี้จิงหรือไม่</h4>";
				
				if(class_exists("mysqli")){
					echo "class have been defined";
				}else{
					echo "class have not yet been defined";
				}	
				echo"<hr/>";
				echo "<h4>ตรวจสอบ method ใน class นั้น ๆ</h4>";
				if(method_exists("firstClass", "getName")){
					echo "method have been defined";
				}else{
						echo "method have not yet been defined";
				}

			?>
	</div>
</div>
</body>
</html>