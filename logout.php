<?php
session_start();
setcookie('UEMAIL',$_SESSION['email'],60);
setcookie('UGROUP',$_SESSION['usergroup'],60);
unset($_SESSION);
session_destroy();
header('Location: /');
die("message from die function");
?>