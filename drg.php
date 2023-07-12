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
mysqli_query($db, $sqlv);





if (isset($_POST['btnCount'])){

$nameOr  =  $row['name'];
$priceOr =  $row['price'];
$dateOr  =  date("Y/m/d");

$sqlOrder = "INSERT INTO orders (name, price, date) VALUES ('$nameOr','$priceOr','$dateOr')";
mysqli_query($db, $sqlOrder); 


//$sqlbtncnt = "UPDATE global SET btnCount = btnCount + 1";
//mysqli_query($db, $sqlbtncnt); 



$sqloccnt = "UPDATE drugs SET orderCount = orderCount+1 WHERE id = $id";
mysqli_query($db, $sqloccnt);




}





?>
<!DOCTYPE html>
<html>
<head>
    

    
<meta name="robots" content="index, follow" />
<title>سعر دواء <?php echo $row['arabic'] . "  " . $row['name'] . " الجديد | " .  "2023"  . " ثمن علاج " . $row['arabic'] . " price | " . $row['price'] ; ?> | دليل الدواء الجديد</title>
<meta content='دليل الدواء الجديد <?php echo $row['name'] ?> ' name='keywords'/>
<meta content=' سعر <?php echo  $row['name'] . " - "  . $row['arabic'] . " - "  ?>' property="og:description"/>
<meta property="og:title" content=" <?php echo $row['arabic'] . " - " . $row['name'] . " price"; ?>">
<meta property="og:image" content="<?php if($row['img'] != ''){ echo $row['img'];}else{ echo "https://www.dlildwa.com/favy.png";} ?> ">
<?php
include 'menu.php';
?>
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-12 d-flex justify-content-start align-items-center mb-4">
            <h2 class="card-title">سعر<?php echo $row['arabic'] . " <br> " . ucfirst($row['name']) . " الجديد | 2023"  ?></h2>
        </div>
        <div align="center" class="mb-3">
            <img src=" <?php echo $row['img']?>" alt="<?php echo $row['arabic']?>"
                 class="card-img-top rounded-lg transform hover:scale-125 transition duration-200"
                 style="object-fit:contain; height: 350px;width: 400px;">
        </div>
        <div>
            <h2 id="features-heading" class="font-medium text-gray-500 text-center mt-3">سعر دواء  <?php echo $row['arabic']?></h2>
        </div>
        <div class="d-flex justify-content-around align-items-center my-3">
            <a href="https://api.whatsapp.com/send?phone=+201018126196&amp;text=ORDER FROM DLILDWA <?php echo $row['name'];  ;?>."><button class="btn btn-success btnCount" >اطلب عبر واتساب <i class="fab fa-whatsapp"></i></button></a>
            <a href="tel:+201018126196"><button class="btn btn-primary btnCount" >اطلب عن طريق اتصال</button></a>
        </div>

    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="mb-3">معلومات سريعة عن
                <b>
                    <?php echo $row['arabic']?>
                </b>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="mb-4 col-12 col-md-3 text-center">
            <div class="shadow p-3 bg-white rounded">
                <div>
                    <h4 class="font-medium text-gray-900">الشركة</h4>
                    <dd class="mt-2 text-gray-500"><?php echo $row['company']?></dd>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-3 text-center">
            <div class="shadow p-3 bg-white rounded">
                <div>
                    <h4 class="font-medium text-gray-900">نوع الدواء</h4>
                    <dd class="mt-2 text-gray-500"><?php echo $row['artype']." ".$row['arroute']?></dd>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-3 text-center">
            <div class="shadow p-3 bg-white rounded">
                <div>
                    <h4 class="font-medium text-gray-900">اخر تحديث للسعر</h4>
                    <dd class="mt-2 text-gray-500"><?php echo $row['lastupdated']?></dd>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-3 text-center">
            <div class="shadow p-3 bg-white rounded">
                <div>
                    <h4 class="font-medium text-gray-900">عدد الزيارات</h4>
                    <dd class="mt-2 text-gray-500"><?php echo $row['visits']?></dd>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3 p-3">
        <div class="col-12 text-center p-5" style="background-color: #f8f9fa">

            <h3 class="my-3" style="font-size:25px;font-weight:bold;color:blue">            لاظهار سعر  <?php if($row['arabic'] !=""){echo $row['arabic'];}else{echo ucfirst($row['name']);} ?> الجديد </h3>
            <p style="font-size:25px;color:#212529;font-weight:bold" class="hid my-3"> فضلا اضغط بالاسفل </p>
            <div class="hidden my-3" style="display:none">
                <h3>سعر  <?php if($row['arabic'] !=""){echo $row['arabic'];}else{echo ucfirst($row['name']);} ?> الجديد </h3>
                <span  style="color:#FE2E2E ;font-weight:bold;font-size:50px;"> <?php if($row['pricenw'] > $row['price']){echo $row['pricenw'];}else{echo $row['price'];} ?> جنيه</span>
            </div>
            <button class="btn btn-primary toggled">
                اظهار السعر
            </button>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12 d-flex align-items-center justify-content-around">
            <div>
                <a target="_blank" href="/indications.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">الإستعمال</button></a>
            </div>
            <div>
                <a target="_blank" href="/composition.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> المكونات</button></a>
            </div>
            <div>
                <a target="_blank" href="/alternatives.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">البدائل</button></a>
            </div>

        </div>
    </div>
</div>


<!--w-full min-h-80 aspect-w-1 aspect-h-1 rounded-md   lg:h-80 -->
<div class="bg-white">
  <section aria-labelledby="features-heading" class="relative">


<div align="center">
      
  



<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"-->
<!--     crossorigin="anonymous"></script>-->
<!-- drugs page -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-7891698547800920"-->
<!--     data-ad-slot="7468553298"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->









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

<hr>
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
    
    
</p>


<script>
  var count = 0;
  var intervalId = setInterval(function(){
    count++;
    document.getElementById("visitor-count").innerHTML = count + "+";
  }, 1); // increments every 100 milliseconds
  setTimeout(function(){
    clearInterval(intervalId);
    document.getElementById("visitor-count").innerHTML = <?php echo $row['sim_visits']; ?> + "+";
  }, 1000); // stops counting after 4 seconds
</script>


<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
      <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6"> 
بدائل دواء 
<?php echo ucfirst($row['arabic']); ?>
</h2>

      <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto"> </p>
    </div>
    <!-- text - end -->

    <div class="grid grid-cols-2 md:grid-cols-4 md:divide-x gap-8 md:gap-0">
      
      

      <!-- stat - start -->
      <div class="flex flex-col items-center md:p-4">
        <div class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold"><?php echo $num['total']; ?>+</div>
        <div class="text-sm sm:text-base font-semibold">عدد البدائل</div>
      </div>

      <!-- stat - start -->
      <div class="flex flex-col items-center md:p-4">
        <div id="visitor-count" class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold ">0+</div>
        <div class="text-sm sm:text-base font-semibold">زائر</div>
      </div>
      <!-- stat - end -->

      <!-- stat - start -->
      <div class="flex flex-col items-center md:p-4">
        <div class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold"><?php echo $row['active']?> </div>
        <div class="text-sm sm:text-base font-semibold">المادة الفعالة</div>
      </div>
      <!-- stat - end -->
    </div>
  </div>
</div>

<p>
تم استعراض بدائل هذا الدواء 
<span style="color:red;font-size:20px;">
<?php echo $row['sim_visits'];?>
</span>
مرة
</p>
<hr>



<div class="p-5 mb-4 bg-gray-50 rounded-lg border border-gray-100 ">
    <time class="text-lg font-semibold text-gray-900 ">البدائل/المثائل</time>
    <ol class="mt-3 divide-y divider-gray-200 ">



    <?php
$i     = 0;
$qsim   = mysqli_query($db, "SELECT * FROM drugs WHERE active = '$active' ORDER BY visits LIMIT 5");
while ($rowsim = mysqli_fetch_assoc($qsim)) {
$i++;

        echo '<li><a href="drg.php?id='.$rowsim["id"].'" class="block items-center p-3 sm:flex hover:bg-gray-100 ">';
               echo' <img class="mr-3 mb-3 w-12 h-12 rounded-full sm:mb-0" src="/rpng/'.$rowsim["route"].'.png" alt="'.$rowsim["route"].'">';
                echo'<div class="text-gray-600 ">
                    <div class="text-lg font-normal"><span class="font-medium text-gray-900 ">'.$rowsim["name"].'</span></div>
                    <div class="text-sm font-normal">"'.$rowsim["active"].'"</div>';
                    echo '<span class="inline-flex items-center text-xs font-normal text-gray-500 ">
                        
                        '.$rowsim["route"].'
                    </span> </div></a></li>';


    }?>

    </ol>
</div>



<a href='/alternatives.php?id=<?php echo $row['id'];?>'>
<button class='text-2xl  btn bg-green-500 text-white font-medium  hover:shadow-lg  hover:bg-green-600 '>
اضغط هنا لعرض المزيد من البدائل
</button></a>

<!-- Related products -->
    <section aria-labelledby="related-heading" class="mt-16 sm:mt-24">
      <h2 id="related-heading" class="text-xl font-bold text-gray-900">ربما تحب التعرف على هذه الأدوية</h2>

      <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        



<?php
$qsim   = mysqli_query($db, "SELECT * FROM drugs WHERE name LIKE '$first3letters%' ORDER BY RAND() LIMIT 5");
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



<br>
<br>

<hr>


<ul class="space-y-4 list-disc list-inside text-gray-500 dark:text-gray-400">
    <li>
كيف يستعمل دواء<?php echo ucfirst($row['arabic']); ?> ؟
        <ul class="pl-5 mt-2 space-y-1 list-disk list-inside">
            <li>
يستعمل دواء
<?php echo ucfirst($row['arabic']).$row['name']; ?>
<br>
                <?php if($row['uses'] != "sexual tonic"){echo $row['uses'];}else{echo "<span> </span>";} ?>
<?php echo $row['uses'];?>

            </li>
            <li><?php echo $row['description'];?>.</li>
             <li><?php echo $row['indications'];?>.</li>
        </ul>
    </li>
    <li>  ما هي تركيبة دواء <?php echo ucfirst($row['arabic']); ?> 
        <ul class="pl-5 mt-2 space-y-1 list-disc list-inside">
            <li>
<h4>تركيبة دواء 
<?php echo ucfirst($row['arabic']).$row['name']; ?>
</h4>

</li>
     <li>يتركب هذا الدواء من : 
       <?php echo $row['active'];?></li>    
        </ul>
    </li>
    <li>
 ما هي الشركة المنتجة لدواء<?php echo ucfirst($row['arabic']); ?> ؟
        <ul class="pl-5 mt-2 space-y-1 list-disc list-inside">
            <li>
<h4>الشركة المنتجة لدواء
<?php echo ucfirst($row['arabic']).$row['name']; ?>
 </h4></li>
             هذا الدواء من انتاج شركة  <?php echo $row['company'];?>
           
        </ul>
    </li>
    
    
     <li>
       ما هي جرعة دواء<?php echo ucfirst($row['arabic']); ?>  ؟
        <ul class="pl-5 mt-2 space-y-1 list-disk list-inside">
            <li>
<h4>جرعة دواء
<?php echo ucfirst($row['arabic']); ?>
</h4></li>
            <li><?php echo $row['dose'];?></li>
       
        </ul>
    </li>
</ul>













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









$(document).on('click', '.btnCount', function(){
$.ajax({
//url  :'routing.php',
type : 'POST',
data : {
'btnCount' : 1,
'date'     : new Date().toLocaleString()
}
});		
});






</script>
</div>

<?php
else:
header('Location: /');
endif;

?>
</body>
</html>