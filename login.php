<?php
include('connection.php');
if(isset($_POST['userLogin'])){
$query = "select name, email, password, uid from users where email = '$_POST[email]' AND password = '$_POST[password]'";
$query_run = mysqli_query($connection, $query);
if(mysqli_num_rows($query_run)){
echo "<script type='text/javascript'>
window.location.href = 'home.php';
</script>
";
}
else{
echo "<script type='text/javascript'>
alert('Please enter correct details.');
window.location.href = 'login.php';
</script>
";
}
}
?>

<html>
<head>
<title>login page</title>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="styleregisterpage.css">
<style>
.pass{
margin:7px 0px 15px 4px;
color:purple;
cursor:pointer;
font-size:15px;
}
.pass:hover{
text-decoration:underline;
}
.login_link{
margin:7px 0px 20px 0px;
text-align:center;
font-size:16px;
color:#666666;
font-size:15px;
}
.login_link a{
color:purple;
text-decoration:none;
font-size:15px;
}
.login_link a:hover{
text-decoration:underline;
}
</style>
<script>
function togglePassword(inputId, iconId){
const input = document.getElementById(inputId);
const icon = document.getElementById(iconId);
if(input.type==="password"){
input.type="text";
icon.classList.remove("fa-eye-slash");
icon.classList.add("fa-eye");
}
else{
input.type="password";
icon.classList.remove("fa-eye");
icon.classList.add("fa-eye-slash");
}
}
</script>
</head>
<body>
<div class="form-container">
<h1>Login</h1>
<form action="" method="post">
<div class="form-group">
<input type="email" name="email" placeholder="Email" required>
<div>
<div class="form-group input-group">
<input type="password" name="password" id="password" placeholder="Password" required>
<span class="toggle-icon">
<i class="fa-solid fa-eye-slash" id="toggleIcon1" onclick="togglePassword('password', 'toggleIcon1')"></i>
</span>
</div>
<div class="pass">Forgot Password?</div>
<input type="submit" name="userLogin" value="Login">
<div class="login_link">
Don't have an account?<a href="register.php">Register now</a>
</div>
</form>
</div>
</body>
</html>
