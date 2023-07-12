<?php
session_start();
include 'header.php';
if(isset( $_SESSION['email'])){ header('Location: /'); } 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email      = $_POST['email'];
$password   = $_POST['pass'];
$hashedPass = md5($password);
$dsn    = 'mysql:host=localhost;dbname=medicationz';
$user   = 'ahmedahmed';
$pass   = '+8duou3xOjXM';
$option = array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
$con = new PDO ($dsn, $user, $pass, $option);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
echo $e.getMessage();
}
$stmt       = $con->prepare("SELECT * FROM users WHERE email=? AND password = ?");
$stmt->execute(array($email, $hashedPass));
$count      = $stmt->rowCount();
$data       = $stmt->fetch();
if($count > 0){
$_SESSION['email']      = $data['email'];
$_SESSION['usergroup']  = $data['usergroup'];
setcookie('UEMAIL',$data['email'],time()+60*60*24*30);
setcookie('UGROUP',$data['usergroup'],time()+60*60*24*30);
header('Location: /');
exit();
}else{echo "Not logged In";}
}
?>
<title>تسجيل دخول</title>
<div class="container" align="center">
    <p>
        تسجيل دخول
    </p>
       <form  action="" method="POST" dir="ltr" style="width:400px;margin:2px auto;">
          <input class="form-control input-lg" type="email" name="email" placeholder="email" />
          <br>
          <input class="form-control input-lg" type="password" name="pass" placeholder="password" />
          <br>
          <input class="btn btn-primary btn-block input-lg"  type="submit"value="Log In" />
      </form> 
</div>

      <hr>
</html>