<?php
   session_start();
   include 'connection_file.php';

   $collection=$db->fblite->MEMBER;
	$find=$collection->deleteOne(['_id'=>$_SESSION['email']]);

unset ($_SESSION["email"]);
 session_destroy();

  echo "<script>
                  alert('Account deleted');
                  window.location.replace('login.php');
                  </script>";       

?>
