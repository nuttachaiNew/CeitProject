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
	<div class="container" style='margin-top:2%'>
	<?php
		class myFirstClass{
			public $say = "Goodbye World!";
			public function getGreeting(){
				return "Hello world!";
			}
		}
		$result = new myFirstClass();
		echo "This function : ".$result->getGreeting()."<br/>";
		echo "This attribute : ".$result->say ."<hr />";
	 ?>

	 <div class="form-horizontal">
	 	<?php
	 		class newWebsiteClass{
	 			public $className;

	 			public function showDetail(){
	 				return "Nuttachai Tippayaboonnont";
	 			}

	 		}

	 	   $website = new newWebsiteClass();
	 	   $website->className="B5576722";
	 	   echo $website->className ." <br/>";
	 	   echo $website->showDetail() ."<hr />";	

	 	?>

	 </div>
	 <div class="form-horizontal">
	 	<?php

	 		class user{
	 			protected $username;
	 			protected $password; 

	 			public function setUsername($username){
	 				$this->username=$username;
	 			}
	 			public function setPassword(){
	 				$this->password="new";
	 			}

	 			public function getUsername(){
	 				$result ="Name is ". $this->username ."<br/>";
	 				$result .="Password is ".$this->password;
	 				return $result;
	 			}

	 		}
	 		$newuser = new user();
	 		$newuser->setUsername("Nuttachai");
	 		$newuser->setPassword();
	 		echo $newuser->getUsername()."<hr/>";


	 	?>
	 	<div class="form-horizontal">
	 		<?php
	 			class users {
	 				private $id;
	 				protected $user;
	 				public function setMyname($input){
	 					$this->user=$input; 
	 				}public function getMyname(){
	 					return $this->user;
	 				}
	 		}

	 				$new = new users();
	 				$new->setMyname("Tippayaboonnont");
	 				echo $new->getMyname();
	 				echo "<hr/>";
	 				require_once 'oop2.php';
	 				$now = new magicnow();
	 				$now->setData("0892166645");
	 				echo	$now->getData();
	 		 ?>
	 	</div>

	 </div>
	</div>



</body>

</html>