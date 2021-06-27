<?php
session_start();
include 'connection_file.php';


if(isset($_POST['comment'])){

	$collection=$db->fblite->COMMENTS;
		$comment =$collection ->insertOne([
				'COMMENT_CONTENT'=>$_POST['comment'], 
				'COMMENT_DATE'=>date('d-m-Y h:i:s'), 
				'USER_EMAIL'=>$_SESSION['email'],
				'POSTS_POST'=>$_POST['_id'] ]);
		

echo json_encode($_POST['comment']);


}


?>