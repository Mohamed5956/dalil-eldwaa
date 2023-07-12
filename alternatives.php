<?php
session_start();
$id          = $_GET['id'];
if(is_numeric($id)):
include 'conn.php';
$q           = mysqli_query($db, "SELECT * FROM drugs WHERE id = $id");
$row         = mysqli_fetch_assoc($q);
$active      = $row['active'];
$uses        = $row['uses'];
$similars_id = $row['similars_id'];
$sqlv        = "UPDATE drugs SET sim_visits = sim_visits+1 WHERE id = $id";
mysqli_query($db, $sqlv);
?>
<!DOCTYPE html>
<html>
<head>

<meta name="robots" content="index, follow" />
<meta property="og:title" content=" بدائل <?php  echo $row['arabic'] . "  "  .  $row['name']; ?> دليل الدواء الجديد">
<meta property="og:description" content=" بدائل / بديل ومثائل <?php echo $row['arabic'] . " | ". $row['name']; ?> alternatives">
<meta property="og:image" content="<?php echo $row['img']; ?> ">
<title> بديل <?php  echo $row['arabic'] . "  بدائل  "  .  $row['name']; ?></title>
<meta name="description" content=" بدائل / بديل دواء <?php echo $row['arabic'] . " | ". $row['name']; ?> alternatives">
<meta content='دليل اسعار الدواء الجديد <?php echo $row['arabic'] ." | ". $row['name'] ?> ' name='keywords'/>
<?php
include 'menu.php';
?>
</head>
<body>
<div class="container">
<div style="text-align:right;margin:5px">
<h2 >
بديل 
<?php 
if( $row['arabic'] !=""){
echo $row['arabic'] . " <br> بديل "  . ucfirst($row['name']);
}else{
echo ucfirst($row['name']);
}
?> 
</h2>
<div align="center">
    <?php
    if($row['img'] != ""){
echo "<img src='" . $row['img'] . "' height='250' width='300' style='object-fit:contain' />";
    }else{
        
    }
    ?>
</div>
<p align='center'>
تم البحث عن بدائل هذا الدواء
<?php echo $row['sim_visits'];?> 
 مرة
</p>
</div>
<h3 align="center" style="margin:10px auto;">
بدايل دواء 
<?php  echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
</h3>



<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<!-- alternative page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="5692437195"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>



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
<div align="center">
    
   <a target="_blank" href="/indications.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">الإستعمال</button></a>
   <a target="_blank" href="/composition.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> المكونات</button></a>
   <a target="_blank" href="/drg.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">السعر</button></a>    
    <br>
<br>
    <h3>
مثائل دواء <?php  echo $row['arabic']; ?>
    </h3>
<hr>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<!-- alternative page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="5692437195"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>




<!-- Related products -->
    <section aria-labelledby="related-heading" class="mt-16 sm:mt-24">
      <h2 id="related-heading" class="text-xl font-bold text-gray-900">
بدائل دواء <?php  echo $row['arabic']; ?> </h2>

      <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        



<?php
$qsim   = mysqli_query($db, "SELECT * FROM drugs WHERE active LIKE '$active%'  ORDER BY price+0 ASC LIMIT 20");
while ($rowsim = mysqli_fetch_assoc($qsim)) {
	    
echo    '<div class="group relative"><div class="w-full min-h-80 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:scale-75 lg:h-80 lg:aspect-none">
            <img src="';
            
             if($rowsim['img'] != ''){ echo $rowsim['img'];}else{ echo "/rpng/". $rowsim['route'].".png";};
             
             echo'" alt="'.$rowsim["route"].'" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a href="drg.php?id='.$rowsim["id"].'">
                  <span aria-hidden="true" class="absolute inset-0"></span>';
echo $rowsim["arabic"] ;
                echo'</a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">'.$rowsim["active"].'</p>
            </div>
            <p class="text-sm font-medium text-gray-900">'.$rowsim["price"].'</p>
          </div> </div>';
          
}
?>  

        </div>
     
      </div>
      
    </section>










</div>
</div>
</div>
<div class="text-center">
<div style="width:95%;border:1px solid black;border-radius:5px;margin:5px auto;background:yellow">
<p style="font-size:20px">
سعر دواء
<?php 
if( $row['arabic'] !=""){
echo $row['arabic'];
}else{ echo ucfirst($row['name']);}
?> 
</p>
<span class="redBold"> <?php echo $row['price'];?> جنيه</span> 
</div> 
</div>
</div>
<style>

.imgme {display: block;

}

.overlay {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  background-color: #008CBA;
  overflow: hidden;
  width: 100%;
  height: 0;
  transition: .5s ease;
}

.hvr-icon-forward:hover .overlay {
   bottom: 75%;
  height: 25%;
}

.hvr-icon-forward:hover, .hvr-icon-forward:focus, .hvr-icon-forward:active {box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
}
  


.hvr-icon-forward:hover, .hvr-icon-forward:focus, .hvr-icon-forward:active {
  -webkit-transform: scale(0.9);
  transform: scale(0.9);
}


.text {
  white-space: nowrap; 
  color: white;
  font-size: 18px;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}


.hvr-icon-forward {
    height: 320px;
    background: white;
    border-radius: 10px;
    padding: 20px;
    margin: 20px;
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-transition-duration: 0.1s;
  transition-duration: 0.1s;
}
.hvr-icon-forward .hvr-icon {
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-transition-duration: 0.1s;
  transition-duration: 0.1s;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}

.hvr-icon-forward:hover .hvr-icon, .hvr-icon-forward:focus .hvr-icon, .hvr-icon-forward:active .hvr-icon {
  -webkit-transform: translateX(4px);
  transform: translateX(20px);
}

 
/* .similardivmain:hover .overlay {
   bottom: 75%;
  height: 25%;
}
.similardivmain:hover, .similardivmain:focus, .similardivmain:active {box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
}
.similardivmain:hover, .similardivmain:focus, .similardivmain:active {
  -webkit-transform: scale(0.9);
  transform: scale(0.9);
}
*/
.similardivmain {
    box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
    border: 1px solid transparent;
    width:90%;
    height: 320px;
    background: white;
    border-radius: 10px;
    padding: 3px;
    margin: 10px;
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  
  -webkit-transition-duration: 0.1s;
  transition-duration: 0.1s;
}
.similardivmain .hvr-icon {
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-transition-duration: 0.1s;
  transition-duration: 0.1s;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
 
 
 

 

    .featuredItemPage {
    margin:10px auto;
    padding:3px;
    text-align:right;
    background-image: linear-gradient(to bottom right, #fff, #2ECCFA);
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
}




    .featuredItemPage {
    margin:10px auto;
    padding:3px;
    text-align:right;
    background-image: linear-gradient(to bottom right, #fff, #2ECCFA);
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
}

 .featuredItemPage2 {
    margin:10px auto;
    padding:3px;
    text-align:right;
    background-image: linear-gradient(to bottom right, #fff, #BE81F7);
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
.prpda{
    color:#FE2E2E;
    font-weight:bold;
    font-size:2rem;
    
}
</style>
<script>
$(document).ready(function(){});
</script>
<?php
else:
header('Location: /');
endif;

?>
</body>
</html>