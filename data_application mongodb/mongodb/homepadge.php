<!DOC HTML>
<HTML>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="homepage.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<style>
body{

background-color: f0f0f5;
	}

*{
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.side-menu {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  padding: 10px 0;
  background-color: #f1f1f1;
  width: 10%;
  text-align: center;
}
.side-menu a {
  text-decoration: none;
  color: #333;
  padding: 2px 30px;
  display: block;
}
.side-menu a:hover {
  background-color: #CCC;
}
section {
  float: right;
  width: 90%;
}
section div {
  width: 500px;
  margin-left: 345px;
  background-color: #fff;
  overflow: hidden;
  padding: 20px;
  border-radius: 3px;
  box-shadow: 1px 1px 1px rgba(0,0,0,.3);
  z-index: 3;
  position: relative;
}
section div img {
  float: left;
  width: 60px;
  height: 60px;
}

section div button {
  float: right;
  margin: 15px 10px auto auto;
  border: none;
  background-color: #0077CC;
  color: #fff;
  font-weight: bold;
  padding: 10px 15px;
  border-radius: 3px;
  font-size: 16px;
}
.overlay {
  background-color: rgba(0,0,0,.5);
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  z-index: 2;
  display: none;
}
.post {
  background-color: #fff;
  width: 500px;
  margin: 10px auto;
  padding: 10px;
  color: #333;
  box-shadow: 1px 1px 1px rgba(0,0,0,.3);
  border-radius: 3px;
}
</style>
</head>
<body>
<ul class="navi">
<ul class="icon">
<?php include_once ('connection_file.php');?>

   <a href ="homepadge.php">
	<img src="icon.png"></a>
	<p style="display:inline-block;"></p>
	</ul>
		<ul class="bar">
		<a href="profile.php" style="background-color:transparent;margin-right:15px; text-decoration: none; vertical-align:top; font-size: 15px; color:#3333ff;outline:none;cursor: pointer">Profile</a>
		<a href="homepadge.php" style="background-color:transparent;margin-right:15px; text-decoration: none; vertical-align:top; font-size: 15px; color:#3333ff;outline:none;cursor: pointer ">Home</a>
		<a href="logout_process.php"style="background-color:transparent;margin-right:15px;text-decoration: none; vertical-align:top; font-size: 15px; color:#3333ff; outline:none;cursor: pointer">LogOut</a>
		</ul>
	</ul>	

		<div>
		<form method="post" style="margin-top: 2%;">
			<input type="text" name="post_content" placeholder="What's on your mind " 	 autocomplete="off" style="height:100px; width:600px;overflow:auto;border-radius:25px; outline:0;"><br>
			<input type="submit" name="post" style="margin-left:52%; border-radius:25px;border-line:none;outline:0;background-color:white;" value="POST"/>
		</form>		
		</div>
	<?php
		if(isset($_POST["post"])){
		$post_content=$_POST["post_content"];
		$time=date("Y-m-d  h:i:s, time()");
		$collection=$db->fblite->POSTS;
			$post=$collection->insertOne([
											
											'POST_CONTENT'=>$post_content,
											'POST_TIME'=>$time,
											'MEMBER_USER_EMAIL'=>$_SESSION['email']]);
			
			
		}
	?>
	
	<p style="margin-left:50px; color:3333ff;"><?php echo("{$_SESSION['email']}"."<br />");?></p>
		

    <section>
	<?php	

		$filter  = [];
		$options = ['sort' => ['POST_TIME' => -1]];
		$collection=$db->fblite->POSTS;
		$post_1 =$collection->find($filter, $options);

		
		foreach($post_1 as $row){
			echo'<br>';
		    echo'<div class="text" >';
			echo'<img src="20190730115116381.jpg"/>';
			echo '<h2>'. $row['MEMBER_USER_EMAIL'] . '</h2>';
			echo'<div style="margin-left:auto"><p>' . $row['POST_CONTENT'] . '</p>';

			$collection=$db->fblite->LIKES;
			$like =$collection->count(
				 ['POSTS_POST'=>$row['_id']]
			);

				echo'<p style="float:right; margin-right:25px; margin-bottom:-5px;">Likes: <span id="returnLike' . $row['_id'] . '">' .	$like .'</span></p>';


			echo'</div>';
			
			echo'<input style="margin-top:25px;" type="input" name="comment" id="comment' . $row['_id'] . '"/>';
			echo'<button id="like' . $row['_id'] . '" class="like"/>like</button>';
			echo'<button id="postcomment' . $row['_id'] . '"/>Comment</button>';

			$collection=$db->fblite->COMMENTS;
		$comment =$collection->find(
			['POSTS_POST'=>$row['_id']]
		);
		
		
			foreach($comment as $rows2){

						echo'<p>'. $row2['USER_EMAIL'] . '</p>';
						echo'<p>'. $row2['COMMENT_CONTENT'] . '</p>';							
			}
			
			echo '<p id="com' . $row['_id'] . '"></p>';
			echo'</div>';


			echo '<script>';

			echo '$("#like'. $row["_id"].'").click(function(){
				console.log(' . $row["_id"] .');
				jQuery.ajax({
			
						type:"post",
						dataType:"json",
						url: "ajax.php",
						data: {like: "like", id: '. $row["_id"].' , email: "'. $row['MEMBER_USER_EMAIL'].'"},
						success: function(data) {
							$("#returnLike'. $row["_id"].'").text(data);
						},
						error: function(data) {
							console.log("fail");
						},
					});
					
			});';
			echo'</script>';
			

			echo '<script>';

echo '$("#postcomment'. $row["_id"].'").click(function(){
	
	var comment = $("#comment'. $row["_id"].'").val();

	jQuery.ajax({

            method:"post",
            dataType:"json",
            url: "ajax_post.php",
            data: {comment: comment, id: '. $row["_id"].' , email: "'. $row['MEMBER_USER_EMAIL'].'"},
            success: function(data) {
                $("#com'. $row["_id"].'").append("<p>"+data+"</p>");
		$("#comment'. $row["_id"].'").val("");
		$("#comment'. $row["_id"].'").focus();


            },
            error: function(data) {
                console.log("fail");
            },
        });
		
});';
echo'</script>';


		

			



		}

			?>

	</section>


		<div style="margin-left:1200px; margin-top:-150px; margin-right:80px; position:absolute">

		<h3 style="margin-left:35px; color:3333ff;">Friend request</h3>
		<div style="border-style: solid;  border-color: #3b5998 #3b5998 transparent #3b5998;background-color:#e0e0eb;  overflow: auto; text-align: center; height:275px; width:200px;margin-top:-15px; border-radius: 10px;">
		

		<?php

			$collection=$db->fblite->FRIEND_REQUESTS;
			$friend_request=$collection->find( [
				'RECEIVER_EMAIL'=>  $_SESSION["email"]],);
			
				foreach($friend_request as $row){
				 echo"<td style='text-align: center;'><p>".$row ['MEMBER_USER_EMAIL']."</p></td>";
				echo"<form  method =post><input type='submit' name='accept' value='accept' style='margin-top:30px; margin-left:60px;'></form>";
				echo"<form  method =post><input type='submit' name='decline' value='decline' style='margin-top:30px; margin-left:60px;'></form>";

	


	if(isset($_POST["accept"])){
	$date = date('m/d/Y', time());
	$collection=$db->fblite->FRIENDSHIPS;
	$sql_friend=$collection->insertOne([ 
		'_id'=>$row['MEMBER_USER_EMAIL'],	
		'START_DATE'=>$date , 	
		'MEMBER_USER_EMAIL'=>$_SESSION['email']
	]
	);

	$collection=$db->fblite->FRIEND_REQUESTS;
	$sql3=$collection->deteleOne([
				'RECEIVER_EMAIL'=> $row ['RECEIVER_EMAIL']]);
	



}

			
if(isset($_POST["decline"])){
	
	$collection=$db->fblite->FRIEND_REQUESTS;
			$sql=$collection->deteleOne(
				['RECEIVER_EMAIL'=> $row ['RECEIVER_EMAIL']]);
		
			}
		}	
			
		?>

		</div>
			<h3 style="margin-left:40px; color:3333ff;">Add Friend</h3>
			<div  style="border-style: solid;  border-color: #3b5998 #3b5998 transparent #3b5998; background-color:#e0e0eb; overflow: auto; text-align: center;height:100px; width:200px;margin-top:-15px; border-radius: 10px;">


			<form  method ="post" style="margin-left:0; margin-top:0;">
				<input type=text style="margin-top:10px;"name="add_friend" autocomplete="off" placeholder="Enter Friends Email..." />
				<input type="submit" name="add" value="add" style="margin-top:30px; margin-left:60px;">
			</form>

		<?php	
			if(isset($_POST["add"])){
				$friend=$_POST["add_friend"];
				$collection=$db->fblite->FRIEND_REQUESTS;
				$sql3=$collection->insertOne([
									'RECEIVER_EMAIL'=>$friend,
									'MEMBER_USER_EMAIL'=>$_SESSION['email']]);
				
				
			}
		?>

		</div>
		</div>


		
		
		
	
		

</body>
</Html>	