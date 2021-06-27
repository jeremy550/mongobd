<?php 
session_start();
include_once("connection_file.php");
if(isset($_POST['submit'])){

$screen_name=$_POST['uname'];
$location=$_POST['location'];
$status=$_POST['status'];
$visibility_level=$_POST['visibility_level'];

$collection=$db->fblite->MEMBER;

$update = $collection->updateOne(
  [
'_id'=>  $_SESSION["email"]],
 ['$set' => ['SCREEN_NAME'=>$screen_name, 
 'STATUS'=>$status,
 'VISIBILITY_LEVEL'=>$visibility_level,
 'LOCATION'=>$location]
]);


if($update){
 header("Location:homepadge.php");	
 }

   }
?>