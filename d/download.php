<?php include_once'../menu.php';?>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
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
       <p align="center" style="font-size:20px">
           <?php echo $_POST['name']; ?>
           
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

<br/><br/> 



<div role="status">
    <svg class="inline mr-2 w-32 h-32 text-gray-200 animate-spin dark:text-white-600 fill-purple-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
    </svg>
    <span class="sr-only">Loading...</span>
</div>





<span id="Scnds"></span>&nbsp;  Seconds
<br><br>
</div> 

<br>


<br>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-g4+1d-5f-jd+1jh"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="1765162170"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>


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

include"  ";
?>
   
 
</html>