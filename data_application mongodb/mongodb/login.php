<!DOC HTML>
<HTML>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<form action="login_process.php" method="POST">
    <div class="loginbox">
    <img src="gif.gif" class="avatar">
        <h1>Login Here</h1>
        <form>
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" autocomplete="new-password" required>
            <input type="submit" name="login"  value="Login">
            <a href="registration.php">Don't have an account?</a>
        </form>
        
    </div>
</form>
</body>
</Html>	
