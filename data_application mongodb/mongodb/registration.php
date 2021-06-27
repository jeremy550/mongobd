<!DOC HTML>
<HTML>
<head>
<link rel="stylesheet" type="text/css" href="register.css">
<title>Register</title>
</head>
<form action="registration_process.php" method="post">
<div class="signup_box">

<div class="signup">
	<h2>Create a new account</h2>
	<p>Full Name<input type="text" name="full_name" placeholder="Enter FullName"  autocomplete="off" required><br>
	<p>ScreenName<input type="text" name="uname" placeholder="Enter ScreenName"  autocomplete="off" required><br>
	<p>Email <input type="text" name="email" placeholder="Enter Email"  autocomplete="off" required><br>
	<p>Password<input type="password" name="password" placeholder="Enter Password" autocomplete="new-password" required><br>
	<p>Location<input type="text" name="location" placeholder="Enter Location" autocomplete="off" required><br>
	<p>Date Of birth <input type="date" name="dob" placeholder="Enter Date Of Birth"  autocomplete="off" required ><br>
	<p>Gender	<br>
		<input type="radio" name="gender" value="male"/>Male
		<input type="radio" name="gender" value="female"/>Female
	<p>Status
		<select name="status" style="margin-left:30px;">
    			<option value="Single">Single</option>
   			 <option value="Taken">Taken</option>
    			<option value="Married">Married</option>
	</select><br>
	<p >Visibility_Level
		<select name="visibility_level" style="margin-left:30px;">
  		  	<option value="private">Private</option>
   		        <option value="friends-only">Friends-only</option>
    			<option value="everyone">Everyone</option>
	</select><br>	

	<a style="text-decoration:none; font-size:12px; line-height:30px; color:#002080;"href="login.php"> Already have an account ?</a>

	<input type="submit" name="signup" value="Sign Up">
</div>
</div>





</form>
</body>
</Html>