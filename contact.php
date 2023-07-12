<title>Contact Us |  اتصل بنا</title>
<?php 
include 'menu.php';

    if(isset($_POST['btn-send']))
    {
       $UserName = $_POST['UName'];
       $Email    = $_POST['Email'];
       $Subject  = $_POST['Subject'];
       $Msg      = $_POST['msg'];

       if(empty($UserName) || empty($Email) || empty($Subject) || empty($Msg))
       {
           header('location:contact_us.php?error');
       }
       else
       {
           $to = "phphamh@gmail.com";

           if(mail($to,$Subject,$Msg,$Email))
           {
               header("location:contact_us.php?success");
           }
       }
    }
  //  else{header("location:contact_us.php");}
?>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
  
</head>
<body>

   
                    <div class="card-title">
                        <h2 class="text-center py-2"> Contact Us </h2>
                        <hr>
                        <?php 
                            $Msg = "";
                            if(isset($_GET['error']))
                            {
                                $Msg = " Please Fill in the Blanks ";
                                echo '<div class="alert alert-danger">'.$Msg.'</div>';
                            }

                            if(isset($_GET['success']))
                            {
                                $Msg = " Your Message Has Been Sent ";
                                echo '<div class="alert alert-success">'.$Msg.'</div>';
                            }
                        
                        ?>
                    </div>
                    <div class="card-body text-center">
                        <form action="" method="post">
                            <input type="text" name="UName" placeholder="اسمك" class="form-control mb-2">
                            <input type="email" name="Email" placeholder="Email" class="form-control mb-2">
                            <input type="text" name="Subject" placeholder="الموضوع" class="form-control mb-2">
                            <textarea name="msg" class="form-control mb-2" rows="7" placeholder="اكتب رسالتك"></textarea>
                            <button style="margin:5px auto;" class="btn btn-success" name="btn-send"> إرســـــــــــــــــــــــــــال </button>
                        </form>
                    </div>
                
</body>

<?php
include 'footer.php';
?>

</html>