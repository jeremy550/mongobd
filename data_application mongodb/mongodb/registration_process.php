<?php 

session_start();

include_once("connection_file.php");

if(isset($_POST['signup'])){

$full_name=$_POST['full_name'];
$screen_name=$_POST['uname'];
$email=$_POST['email'];
$password=$_POST['password'];
$location=$_POST['location'];
$dob=$_POST['dob'];
$date_1=date('d-m-Y', strtotime($dob));
$gender=$_POST['gender'];
$status=$_POST['status'];
$visibility_level=$_POST['visibility_level'];

$_SESSION["email"]=$email;

$collection=$db->fblite->MEMBER;



$register = $collection->insertOne([
'_id'=> $email, 
'PASSWORD'=>$password,
'FULL_NAME'=>$full_name,
'SCREEN_NAME'=>$screen_name, 
'D_O_B'=>$date_1, 
'GENDER'=>$gender, 
'STATUS'=>$status,  
'VISIBILITY_LEVEL'=>$visibility_level,
'LOCATION'=>$location
]);







if(count($register)!=0){
 header('Location:homepadge.php');
}else{
	echo'Fail to create account';
}
}else{

	alert('Fail to create account');
}
 
?> 