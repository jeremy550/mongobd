<?php
session_start();
include 'connection_file.php';
?>
<!DOC HTML>
<HTML>
<head>
<title>
Profile
</title>
<link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
<style>
body {
  background-color: #8a9fc2;
}

</style>
<ul class="navi">
<ul class="icon">
  	
	<img src="icon.png">	
	</ul>
	<ul class="bar">
	<a href="profile.php" style="background-color:transparent;margin-right:15px; text-decoration: none; vertical-align:top; font-size: 15px; color:#3333ff;outline:none;cursor: pointer">Profile</a>
	<a href="homepadge.php" style="background-color:transparent;margin-right:15px; text-decoration: none; vertical-align:top; font-size: 15px; color:#3333ff;outline:none;cursor: pointer ">Home</a>
	<a href="logout_process.php"style="background-color:transparent;margin-right:15px;text-decoration: none; vertical-align:top; font-size: 15px; color:#3333ff; outline:none;cursor: pointer">LogOut</a>
	</ul>
</ul>	
<h1></h1>
<form action="" method="post">
      <div style="background-color:#7189b0; margin-right:370px;padding-top:0.2px;padding-bottom:150px;margin-top:75px;">
	<div class ="profile" style="margin-left:250px;margin-top:200px;">

	<?php 
	
	$collection=$db->fblite->MEMBER;
	$find=$collection->findOne(['_id'=>$_SESSION['email']]);



	?>

	
	
	<p>ScreenName <br><input type="text" name="uname"value="<?php echo $find['SCREEN_NAME'];?>"/>

	<p>Location <br><input type="text" name="Location"value="<?php echo $find['LOCATION'];?>"/>
<p>Status</p>
	<select name="status" style="margin-left:70px; margin-top:-32px;" value="<?php echo $find['STATUS'];?>">
  	<option value="Single">Single</option>  	
	<option value="Taken">Taken</option>  		
	 <option value="Married">Married</option>	
	</select><br>
<p >Visibility_Level</p>
	<select name="visibility_level" style="margin-left:30px;" value="<?php echo $find['VISIBILITY_LEVEL'];?>">
   	 <option value="private">Private</option>
    	<option value="friends-only">Friends-only</option>
    	<option value="everyone">Everyone</option>
	</select><br>	


	<a href="submit.php" style="background-color:transparent;margin-right:15px; text-decoration: none; vertical-align:top; font-size: 15px; outline:none;cursor: pointer;margin-right:30px;">Submit</a>
	<a href="homepadge.php" style="background-color:transparent;margin-right:15px; text-decoration: none; vertical-align:top; font-size: 15px; outline:none;cursor: pointer;margin-right:30px;">Cancel</a>
	<a href="delete.php" style="background-color:transparent;margin-right:15px; text-decoration: none; vertical-align:top; font-size: 15px; outline:none;cursor: pointer;margin-right:30px;">Delete Account</a>
	</div>	
      </div>
    </form>
	
</body>
</Html>	