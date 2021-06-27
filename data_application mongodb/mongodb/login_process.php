<?php
session_start();
include_once ('connection_file.php');



 if(isset($_POST['login'])){
	   	if (isset($_POST['email']) and isset($_POST['password'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$_SESSION["email"]=$email;
			
		$collection=$db->fblite->MEMBER;



$login = $collection->findOne([
			"_id" => $email,
			
			"PASSWORD" => $password]);


			if(count($login)!=0){
	
				header('Location: homepadge.php	');
			
			}
			else{	
				echo "<script>
								 alert('Invalid Email or Password');
								 window.location.replace('login.php');
							  </script>";       
			
			
			}
			
			 }
			}




?>