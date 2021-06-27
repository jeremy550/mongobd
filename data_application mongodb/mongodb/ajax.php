<?php
session_start();
include 'connection_file.php';


if(isset($_POST['like'])){

	$collection=$db->fblite->LIKES;
		$sql_like =$collection->insertOne([	
			'POSTS_POST'=>$_POST['_id'],
			'MEMBER_USER_EMAIL'=>$_SESSION['email']]);
		

echo json_encode(1);

}


?>