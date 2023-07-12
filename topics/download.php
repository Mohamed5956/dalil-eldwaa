<?php include_once'../menu.php';?>
<html>
<head>
<meta charset="UTF-8">
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
<title>
مركز التحميل المباشر
</title>


</head>
<body>
 <div style="margin:10px;">
<?php 
  // if ($_SERVER['REQUEST_METHOD'] === 'POST') :
if (isset($_POST['link'])):
    ?>
    

       
       <p align="center" style="font-size:20px">
        مركز التحميل المباشر للكتب والملفات الطبية
          <br>
         
           
       </p>
       
        <div align="center">
      <img src="<?php echo $_POST['img']; ?>" style="width:300px; height:300px; object-fit: contain; border-radius:10px;">
      <br>
      </div>
       
 
 
  <div align="center">
      
     <p style="font-size:20px">
         
        
         
         
      أنتم الأن علي بعد ثوان قليلة لتحميل الكتاب المطلوب  
         <br>
     نقوم الأن بتجهيز الملف المطلوب ( برجاء الانتظار )
          <br>
      حرصاً منا علي توفير كل الكتب والمواد العلمية المطلوبة وتحقيق أكبر قدر من الإستفادة لدي زوارنا الكرام
      <br>
      نقوم بتوفير الكتب والملفات التي تحتاجونها بجودة عالية واحجام مناسبة للتحميل 
          <br> <br>
         
         نتمنى لكم قضاء وقت ممتع و تحقيق الاستفادة القصوي من خلال هذه المواد والكتب
       
     </p> 

  </div>
 

<div style="font-size:20px" align="center" id="CountDown">
من فضلك انتظر قليلا ريثما نقوم بتجهيز رابط التحميل المباشر الخاص بك
<br/> <br />
<img src="https://i.imgur.com/KGsV0hy.gif" /> 
<br/><br/> 
<span id="Scnds"></span>&nbsp;  Seconds
<br><br>
</div> 
 <div align="center">
<p id="dlNow" style="display:none;font-size:25px;color:red">
  
  اضغط اسفله لتحميل الكتاب الآن
    
    <br> &#8595;&#8595;&#8595;&#8595;&#8595;
     <a href="<?php echo $_POST['link']?>" target="blank" style="text-decoration:none;font-size:20px;font-weight:bold">
            
          تحميل الآن ..
        </a>    
</p>


</div>  
<br>
<div align="center">
Advertisment
555555555555555
  <br>
</div>



 <script>
      $(document).ready(function(){
$(function () {
        var seconds = 20;
        $("#Scnds").html(seconds);
        setInterval(function () {
            seconds--;
            $("#Scnds").html(seconds);
            if (seconds == 0) {
                $("#CountDown").hide();
                $("#dlNow").show();
                $("#dlNow").attr("href"," <?php echo $_POST['link']; ?>")
            }
        }, 1000);
 });
 }); 
  </script>    
       
       
       
        <div align="center">
            
         

       </div>

       <br>
       
        <div align="center">
            
       

       </div>
       
       <br>
       
        <div align="center">
        
        
       </div>
       
  
   </div> 
    
 
    </body>


<?php
endif;

include"../footer.php";
?>
   
 
</html>