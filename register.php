<?php
include('connection.php');
$name = "";
$email = "";
$password = "";
$confirm_password = "";
$nameErr = $emailErr = $passwordErr = $confirmpasswordErr = "";
if(isset($_POST['userRegistration'])){
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if(empty($name)){
$nameErr = "Name is required";
}
if(empty($email)){
$nameErr = "Email is required";
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
$emailErr = "Invalid email format";
}
else{
$checkSql = "select uid from users where email = '$email'";
$result = mysqli_query($connection, $checkSql);
if(mysqli_num_rows($result)>0){
$emailErr = "Email already registered";
}
}
if(empty($password)){
$passwordErr = "Password is required";
}
elseif(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)){
$passwordErr = "Password at least 8 characters with uppercase, lowercase, digit and special character";
}
if(empty($confirm_password)){
$confirmpasswordErr = "Confirm Password is required";
}
elseif($password!==$confirm_password){
$confirmpasswordErr = "Passwords do not match";
}
if(empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmpasswordErr)){
$query = "insert into users(name, email, password)values('$name', '$email', '$password')";
$query_run = mysqli_query($connection, $query);
if($query_run){
echo "<script type='text/javascript'>
alert('User registered successfully...');
window.location.href = 'login.php';
</script>
";
}
else{
echo "<script type='text/javascript'>
alert('Error... Please try again.');
window.location.href = 'register.php';
</script>
";
}
}
}
?>

<html>
<head>
<title>register page</title>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="styleregisterpage.css">
<script>
window.addEventListener("load", function(){
if(performance.navigation.type===1){
document.querySelectorAll("input").forEach(function(input){
if(input.type==="submit")return;
input.value="";
});
document.querySelectorAll(".error").forEach(function(el){
el.innerText="";
});
}
});
</script>
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
<h1>Register</h1>
<form action="" method="post" id="registerForm">
<div class="form-group">
<input type="text" name="name" placeholder="Username" value="<?php if(isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>" required>
<div class="error"><?php echo $nameErr ??''; ?></div>
<div>
<div class="form-group">
<input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" required>
<div class="error"><?php echo $emailErr ??''; ?></div>
</div>
<div class="form-group input-group">
<input type="password" name="password" id="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>" required>
<span class="toggle-icon">
<i class="fa-solid fa-eye-slash" id="toggleIcon1" onclick="togglePassword('password', 'toggleIcon1')"></i>
</span>
<div class="error"><?php echo $passwordErr ??''; ?></div>
</div>
<div class="form-group input-group">
<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="<?php if(isset($_POST['confirm_password'])) echo htmlspecialchars($_POST['confirm_password']); ?>" required>
<span class="toggle-icon">
<i class="fa-solid fa-eye-slash" id="toggleIcon2" onclick="togglePassword('confirm_password', 'toggleIcon2')"></i>
</span>
<div class="error"><?php echo $confirmpasswordErr ??''; ?></div>
</div>
<input type="submit" name="userRegistration" value="Register"/>
<div class="register_link">
Already have an account?<a href="login.php">Login now</a>
</div>
</form>
</div>
</body>
</html>







































