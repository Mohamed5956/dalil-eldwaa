<?php
session_start();
$id            = $_GET['id'];
if(is_numeric($id)):
if(!isset($_SESSION['email'])  && isset($_COOKIE['UEMAIL'])){
$_SESSION['email']      = $_COOKIE['UEMAIL'];
$_SESSION['usergroup']  = $_COOKIE['UGROUP'];
}
include 'conn.php';
$sql = "SELECT * FROM drugs WHERE id=$id";
if(mysqli_query($db, $sql)){
$q             = mysqli_query($db, $sql);
$row           = mysqli_fetch_assoc($q);
$first3letters = substr($row['name'],0,4);
$active        = $row['active'];
}

$sqlv = "UPDATE drugs SET visits = visits+1 WHERE id = $id";
if(mysqli_query($db, $sqlv)){}
?>
<!DOCTYPE html>
<html>
<head>
    
    
    
<meta name="robots" content="index, follow" />
<title>سعر دواء <?php echo $row['arabic'] . "  " . $row['name'] . " الجديد | " .  "2022"  . " ثمن علاج " . $row['arabic'] . " price | " . $row['price'] ; ?> | دليل الدواء الجديد</title>
<meta content='دليل الدواء الجديد <?php echo $row['name'] ?> ' name='keywords'/>
<meta content=' سعر <?php echo  $row['name'] . " - "  . $row['arabic'] . " - "  ?>' property="og:description"/>
<meta property="og:title" content=" <?php echo $row['arabic'] . " - " . $row['name'] . " price"; ?>">
<meta property="og:image" content="<?php if($row['img'] != ''){ echo $row['img'];}else{ echo "https://www.dlildwa.com/fav.png";} ?> ">
<?php
include 'menu.php';
?>
</head>
<body>
<div class="text-center ">
<hr>
 <div class="pricemetatagsarea" style="width:95%;padding:3px;border-radius:5px;margin:5px auto;background:#fff">
<h1>سعر  
<?php echo $row['arabic'] . " <br> " . ucfirst($row['name']) . " الجديد | 2022"  ?>
</h1>
 
</div>


<hr>

<div align="center">
    <?php
    if($row['img'] != ""){
echo "<img src='" . $row['img'] . "' height='250' width='300' style='object-fit:contain' />";
    }else{
        
    }
    ?>
</div>
<!--<h2>ثمن علاج  
<?//php echo  ucfirst($row['name']); ?> 
</h2>-->
<br>
<h3>
 سعر دواء
<?php echo  ucfirst($row['name']) . " | " . $row['arabic'] ; ?> 
</h3>
<hr>






<hr>




<p style="font-size:17px">
<i class="fas fa-eye"></i>
<?php echo $row['visits'];?>
  مشاهدات/زيارات 
</p>
<?php
if ((isset( $_SESSION['email']) && $_SESSION['usergroup'] == 2) || (isset($_COOKIE['UEMAIL']) && $_COOKIE['UGROUP'] == 2 ) ){
echo "<hr><a  href='medrg/edit.php?id=". $row["id"] ."'><button class='btn btn-danger'>Edit this med</button></a><hr>";
}
?>
<br>

<?php

if($row['price'] > 2000){
echo "<a href='https://www.facebook.com/%D8%A7%D9%84%D8%B7%D8%A8-%D9%88-%D8%A7%D9%84%D8%AF%D9%88%D8%A7%D8%A1-106914350850816' target='_blank'>";
echo "<button class='btn btn-success' style='font-size:20px;font-weight:bold'> اطلبه الأن عبر واتساب بأفضل سعر في السوق  <i class='fab fa-whatsapp'></i></button></a><br><br>";
}
?>
<div align="center">
    
    
    
    
<br>
<a target="_blank" href="https://dlildwa.com/book.php?id=12">
<button class="appclick" style="background:#0B6121;font-family:arial;padding:10px 20px;margin:5px;border:0;border-radius:10px;color:#fff;font-size:21px;font-weight:bold;box-shadow: 0 0 6px 1px rgb(0 0 0 / 23%);">
كتاب " تعلم كل طرق إعطاء الحقن " <br>
للتحميل من هنا</button>
</a>
</div>


<div align="center">
<div id="priceArea" style="width:85%;margin:10px auto;padding:15px 5px;background:#F2F2F2;border-radius:5px;"> 



<br>

<p style="font-size:25px;color:#212529;font-weight:bold" class="hid">
    لاظهار  
    <h3 style="font-size:25px;color:red;font-weight:bold">سعر  <?php if($row['arabic'] !=""){echo $row['arabic'];}else{echo ucfirst($row['name']);} ?> الجديد </h3> 
    
    
</p>

<p style="font-size:25px;color:#212529;font-weight:bold" class="hid"> فضلا اضغط بالاسفل </p>

<br>
555555555555

<br>



<div class="hidden" style="display:none">
<h3>سعر  <?php if($row['arabic'] !=""){echo $row['arabic'];}else{echo ucfirst($row['name']);} ?> الجديد </h3>

<span  style="color:#FE2E2E ;font-weight:bold;font-size:50px;"> <?php if($row['pricem'] !=""){echo $row['pricem'];}else{echo $row['price'];} ?> جنيه</span> 
</div>


<button class="btn btn-primary toggled">
    اظهار السعر
</button>

<br><br>

<a target="_blank" href="https://dlildwa.com/dl.php">
<button class="btn btn-danger" >
كتب 
<br>طبية مجانية
</button>
</a>
<a target="_blank" href="https://dlildwa.com/book.php?id=12">
<button class="btn btn-danger" >
كتاب كيفية 
<br>اعطاء الحقن</button>
</a>

<br>

<script>
$(document).ready(function(){
    
$(document).on('click', '.toggled', function(){
    
$('.hidden').show();
$(this).hide();
$('.hid').hide();


setTimeout(function(){
location.reload();
}, 5000);




});    
    
}); 
</script>


<br>


<span style="font-size:13px;padding:1px;margin:2px;">
<?//php echo $row['uses'];?>
</span>



<hr style="margin:2px">



<div align="center">
<a href="https://dlildwa.com/book.php?id=2" target="blank">
    <button class="btn btn-primary">
        تحميل دليل الادوية وقاعدة بيانات الادوية
        <br>
        اضغط هنا
    </button>
</a>
</div>

<hr>



<p>
تم استعراض بدائل هذا الدواء 
<span style="color:red;font-size:20px;">
<?php echo $row['sim_visits'];?>
</span>
مرة
</p>
<hr>

<div style="width:95%;margin:5px auto;background:#d7dce1">
<h3 style='font-size:18px;font-weight:bold;color:#DF0174'>
بدائل دواء 
<?php echo ucfirst($row['arabic']); ?>
</h3>
<div align="right" style="width:90%;margin:10px auto;font-size:15px">
<?php
$i     = 0;
$qsim   = mysqli_query($db, "SELECT * FROM drugs WHERE active = '$active' ORDER BY visits LIMIT 5");
while ($rowsim = mysqli_fetch_assoc($qsim)) {
$i++;
if($rowsim['arabic'] != ""){	    
echo "<div style='font-size:16px;font-weight:bold;'><a href='drg.php?id=".$rowsim['id']."'>" .$i."-". $rowsim['arabic'] . "</a></div><span>  <i class='fas fa-eye'></i> ". $rowsim['visits'] ." Views </span><hr style='margin:1px'>";
}else{
echo "<div dir='ltr' style='font-size:16px;font-weight:bold;'><a href='drg.php?id=".$rowsim['id']."'>" .$i."-". ucfirst($rowsim['name']) . "</a></div><span>  <i class='fas fa-eye'></i> ". $rowsim['visits'] . " Views </span><hr style='margin:1px'>";  
}
}
?>
</div>
</div>

<a href='/alternatives.php?id=<?php echo $row['id'];?>'>
<button style='font-size:20px' class='btn btn-success lg'>
اضغط هنا لعرض المزيد من البدائل
</button></a>
<hr>
<a target="_blank" href="https://www.google.com/search?tbm=isch&q=<?php echo $row['name'];?>">
<button style='font-size:15px' class='btn btn-primary lg'>
اضغط هنا لعرض صور دواء
<?php echo ucfirst($row['name']); ?>
</button></a>


<hr>
<div align="right" class="container">
<ul>
  <h3>
      معلومات عن دواء
      <?php echo ucfirst($row['arabic']); ?>
  </h3>  
   
   <li>
   كيف يستعمل دواء
      <?php echo ucfirst($row['arabic']); ?>
      ؟
   </li>
    <li>
   ما هي تركيبة دواء
      <?php echo ucfirst($row['arabic']); ?>
     ؟
     
   </li>  
    
    <li>
  ما هي الشركة المنتجة لدواء
      <?php echo ucfirst($row['arabic']); ?>
     ؟
      
   </li>
   
   <li>
   ما هي جرعة دواء
      <?php echo ucfirst($row['arabic']); ?>
     ؟
     
   </li>  
   
   </ul>
   
   <hr>
  <h4>
      استعمالات دواء
       <?php echo $row['arabic']; ?>
  </h4> 
  
   
   
   
   <p>
يستعمل دواء
<?php echo ucfirst($row['arabic']).$row['name']; ?>
<br>
<p dir="ltr" align="left">
<?php if($row['uses'] != "sexual tonic"){echo $row['uses'];}else{echo "<span dir='ltr'> </span>";} ?>
<?php //echo $row['uses'];?>
<br>
<?php //echo $row['indications'];?>
</p>
</p>  
   
<h4>تركيبة دواء 
<?php echo ucfirst($row['arabic']).$row['name']; ?>
</h4>
<p>يتركب هذا الدواء من : 
       <?php echo $row['active'];?>
</p>
<h4>الشركة المنتجة لدواء
<?php echo ucfirst($row['arabic']).$row['name']; ?>
 </h4>
  <p> هذا الدواء من انتاج شركة  <?php echo $row['company'];?></p>
<p>
<h4>جرعة دواء
<?php echo ucfirst($row['arabic']); ?>
</h4>
<?php echo $row['dose'];?>
</p>  


<p>
<?php echo $row['description'];?>
</p>  
  
  <br>
  
 55555555555
  
  <br>
  
<div align="center">
<img style="width:300px; height:250px; object-fit: contain;border:1px solid #fff; border-radius:10px;" src="<?php if($row['img'] == ''){ echo "imagee.php?id=". ucfirst(substr($row['name'],0,7));}else{echo $row['img'];} ?>">
</div>

<hr>
      
<div style="width:95%;margin:5px auto;background:#F6E3CE">
<p style='font-size:18px;font-weight:bold;color:#0101DF'>
ربما تحب التعرف على اسعار هذه الادوية
<br>
اضغط على اسم الدواء لعرض سعره
</p>
<div align="right" style="width:90%;margin:10px auto;font-size:15px">
<?php
$qsim   = mysqli_query($db, "SELECT * FROM drugs WHERE name LIKE '$first3letters%' ORDER BY RAND() LIMIT 30");
while ($rowsim = mysqli_fetch_assoc($qsim)) {
if($rowsim['arabic'] != ""){	    
echo "<div style='font-size:16px;font-weight:bold;'><a href='drg.php?id=".$rowsim['id']."'>" . $rowsim['arabic'] . "</a></div><span>  <i class='fas fa-eye'></i> ". $rowsim['visits'] ." مشاهدات </span><hr style='margin:1px'>";
}else{
echo "<div dir='ltr' style='font-size:16px;font-weight:bold;'><a href='drg.php?id=".$rowsim['id']."'>" . ucfirst($rowsim['name']) . "</a></div><span>  <i class='fas fa-eye'></i> ". $rowsim['visits'] . " مشاهدات </span><hr style='margin:1px'>";  
}
}
?>
</div>
</div>
</div>

<hr>

<div class='shareButtons'>
Share to
<br>
<a href='' id='fbLink' target='_blank'><i class='fab fa-facebook'></i></a>
<a href='' id='waLink' target='_blank'><i class='fab fa-whatsapp'></i></a>
<a href='' id='twLink' target='_blank'><i class='fab fa-twitter'></i></a>
</div>
<hr> 
<p>انقر لنسخ رابط مشاركة معلومات وسعر هذا الدواء</p>
<textarea id="txtarea" dir="ltr" style="width:90%;height:30px"></textarea>
</div>

</div>
</div>  
    
<script>
document.getElementById("fbLink").href       = "https://www.facebook.com/sharer/sharer.php?u="+ window.location.href;
document.getElementById("waLink").href       = "whatsapp://send?text="+ window.location.href.replace(" ","+");
document.getElementById("twLink").href       = "https://twitter.com/share?url="+ window.location.href;
document.getElementById("txtarea").innerHTML = window.location.href;
document.getElementById("txtarea").onclick   = function() {
this.select();
document.execCommand('copy');
};


        // to hide all table rows <tr>  with empty <td>
$('tr:has("td:empty")').hide();
</script>
</div>

<?php
else:
header('Location: /');
endif;
include ' '; 
?>
</body>
</html>