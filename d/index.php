<?php include_once'../menu.php';?>

<html>
<head>
<meta charset="UTF-8">
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
<title>
مركز التحميل
</title>
</head>
<body>
<?php 
  // if ($_SERVER['REQUEST_METHOD'] === 'POST') :
if (isset($_POST['link'])):
    ?>
   <div style="margin:10px;">
       <p align="center">
      
           <br>
          مركز التحميل للملفات والكتب الطبية
       </p>
       <p align="center">
           <?php echo $_POST['name']; ?>
       </p>
 
 
  <div align="center">
      <img src="<?php echo $_POST['img']; ?>" style="width:300px; height:300px; object-fit: contain; border-radius:10px;">
      </div>
       
       
       
       
   <div align="center">
       
       <p style="text-align: center;"><span style="font-size: 25px;">مرحباً بكم&nbsp;</span></p><p style="text-align: center;"><span style="font-size: 25px;">في هذا القسم " قسم الكتب الطبية " من موقع " دليل الدواء الجديد " نقدم لكم - وبشكل مجاانا تماماً - خدمة تنزيل وتحميل الملفات والكتب الطبية بشكل سلسل جداً ومن خلال روابط تحميل مباشرة دون الخروج من الموقع.</span></p><p style="text-align: center;"><span style="font-size: 25px;"><br /></span></p><p style="text-align: center;"><span style="font-size: 25px;">وقد قمنا بضغط بعض الملفات والكتب الكبيرة التي تستهلك مساحة وبيانات كبيرة لكي يسهل عليكم تحميلها وتنزيلها في هواتفكم وعلي اجهزتكم بسهولة ويسر.</span></p><p style="text-align: center;"><span style="font-size: 25px;"><br /></span></p><p style="text-align: center;"><span style="font-size: 25px;">كما نتمني ان تجدوا كل ما تبحثون عنه وما تريدونه هنا في موقعكم وأن تستفيدوا كل الإفادة من هذه الكتب والملفات&nbsp;</span></p><p style="text-align: center;"><span style="font-size: 25px;"><br /></span></p><p style="text-align: center;"><span style="font-size: 25px;">شكراً لثقتكم بنا</span></p><p style="text-align: center;"><span style="font-size: 25px;">&nbsp;</span></p>
        </div>
<p align="center" style="font-size:25px;font-weight:blod;color:red">
لتحميل التطبيق / الملف من فضلك اضغط اسفله
</p>
       
       <br>
  
     <div align="center">  
       Advertisement
       
       <br>
       
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<!-- Adme -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="2096790545"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

       
       <br>
       
        
 </div>      
       <br>
<form action="download.php" method="POST" align="center">
    
 <input type="hidden" name="name" value="<?php echo $_POST['name']?>"/>
 
 <input type="hidden" name="link" value="<?php echo $_POST['link']?>"/>
 
 <input type="hidden" name="img"  value="<?php echo $_POST['img']?>"/>
<button style="border:0;background:#fff;color:blue;cursor:pointer;font-size:20px" type="submit">تحميل الملف </button>
   
  
 <br>
</form>

<br>




<br>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<!-- Adme -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="2096790545"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
       
       <br>
       
      
   </div> 
    
 </body>
    
      
<?php
endif;

include" ";
?>
   
 
</html>