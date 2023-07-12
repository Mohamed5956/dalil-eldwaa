<?php
session_start();
$id          = $_GET['id'];
if(is_numeric($id)):
include 'conn.php';
$q           = mysqli_query($db, "SELECT * FROM drugs WHERE id = $id");
$row         = mysqli_fetch_assoc($q);
$active      = $row['active'];
$sqlv = "UPDATE drugs SET cmp_visits = cmp_visits+1 WHERE id = $id";
mysqli_query($db, $sqlv);
?>
<!DOCTYPE html>
<html>
<head>
        
<meta name="robots" content="index, follow" />
<meta property="og:title" content=" المادة الفعالة  دواء<?php  echo $row['arabic'] . "  "  .  $row['name']; ?> من موقع دليل الدواء ">
<meta property="og:description" content=" المادة الفعالة  / مكونات دواء <?php echo $row['arabic'] . " | ". $row['name']; ?> ">
<meta property="og:image" content="<?php echo $row['img']; ?> ">
<title> المادة الفعالة  دواء  <?php  echo $row['arabic'] . "  "  .  $row['name']; ?> دليل دواء مصر</title>
<meta name="description" content="المادة الفعالة  / مكونات دواء <?php echo $row['arabic'] . " | ". $row['name']; ?> alternatives">
<meta content='ما هي المادة الفعالة  ومكونات علاج <?php echo $row['arabic'] ." | ". $row['name'] ?> ' name='keywords'/>
<link href='/favicon.png' rel='icon' type='image/x-icon'/>
<?php
include 'menu.php';
?>
</head>
<body>
<div class="container">
    <hr>
<div style="text-align:right;margin:5px">
<h1 style="font-size:18px">
    المادة الفعالة  لدواء
 <?php 
 if( $row['arabic'] !=""){
    echo $row['arabic'] . " <br> مكونات علاج "  . ucfirst($row['name']);
 }else{
     echo ucfirst($row['name']);
 }
  ?> 
 </h1>

<div align="center">
    <?php
    if($row['img'] != ""){
echo "<img src='" . $row['img'] . "' height='250' width='300' style='object-fit:contain' />";
    }else{
        
    }
    ?>
</div>

<br>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="9385944970"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>


<br>


<br>
تم البحث عن المادةالفعالة لدواء 
<?php echo ucfirst($row['name']);?>
<br>
<?php echo $row['cmp_visits'];?> 
 مرة
</div>

<?php
 if (isset( $_SESSION['email']) && $_SESSION['user_group'] == 2 ){
echo "<div align='center'><a  href='admin/edit_med.php/?id=". $row["id"] ."'><button class='btn btn-danger'>Edit this med</button></a></div>";
}
?>
<div style="padding:5px;margin:1px;background:#81F7BE">
<h3 align="center" style="margin:5px auto;">
ما هي تركيبة  
<?php  echo $row['arabic'] . " <br> "  .  ucfirst($row['name']); ?>
؟
</h3>
<hr>
<div id="usesDiv" style="text-align:right;margin:5px;padding:10px;font-size:20px;font-weight:bold;color:blue">
*
<?php if($row['aractive'] !=''){echo $row['aractive'];}else{echo $row['active'];} ?>
</div>
</div>
<hr>
<div align="center">
    
    
    <br>
    <br>

<p>
مرحباً بكم في موقع دليل الدواء الجديد، وتحديداً في صفحة دواء 
<?php echo $row['arabic']. " ".$row['name'];?>

يعد دواء <?php echo $row['arabic']. " ".$row['name'];?> من أفضل وأقوى الأدوية التي يتم صرفها واستخدامها في علاج 
<?php echo $row['uses']." ". $row['indications']?>، 
حيث أنه يحتوي على مادة فعالة وتركيبة قوية جداً في علاج مثل هذه الحالات ألا وهي 
<?php echo $row['active']?>.

يتوفر دواء 
<?php echo $row['arabic']. " ".$row['name'];?> في السوق بسعر 
<?php echo $row['price'];?> وهو من إنتاج شركة 
<?php echo $row['company'];?> 
 ومن أشهر بدائل دواء
<?php echo $row['arabic']. " ".$row['name'];?>    
    
    
    <?php
    $qnum   = mysqli_query($db, "SELECT COUNT(*) as total FROM drugs WHERE active = '$active'");
    
    $num=mysqli_fetch_assoc($qnum);
    
    ?>
<br>
<br>

<br>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="3939407444"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>


<br>

<div align="center">
    
   <a target="_blank" href="/indications.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">الإستعمال</button></a>
   <a target="_blank" href="/alternatives.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> البدائل</button></a>
   <a target="_blank" href="/drg.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">السعر</button></a>    
    <br>
<br>
</div>







</div>

<div class="usesKeywords" align="right" style="margin:10px">
    <p>
 كلمات دلالية
    </p>
   <li>
       ما هي المادة الفعالة  دواء
        <?php  echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
   </li>
   
   <li>
      دواعي استعمال
        <?php  echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
   </li>
   
    <li>
       مكونات علاج
        <?php  echo  $row['name']; ?>
   </li>
   
    <li>
      فيم يستخدم دواء/ علاج
        <?php  echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
   </li>
   
    <li>
 هل يستخدم دواء
        <?php  echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
        لعلاج 
   </li>
   
    <li>
متى استعمل علاج
        <?php  echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
   </li>
    
</div>
<script>
$(document).ready(function(){

usesDiv.innerHTML = usesDiv.innerHTML.replaceAll("--","<br>* ")
});
</script>
<style>
    .featuredItemPage {
    margin:10px auto;
    padding:3px;
    text-align:right;
    background-image: linear-gradient(to bottom right, #fff, #58FAD0);
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
}
.divDiv{
    background:#8A0829;
    color:#fff;
    width:150px;
    text-align:center;
    margin: 20px auto;
    padding:10px;
    border-radius:5px;
    font-size:15px;
    font-weight:bold;
}

.img_position{
    position:absolute;
    left:5px;
    top:3px;
}

.pDiv {
    position:absolute;
    left:25px;
    top:100px;
}

</style>

</body>

<?php
else:
header('Location: /');
endif;

?>
</html>