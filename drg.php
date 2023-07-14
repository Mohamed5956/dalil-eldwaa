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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="robots" content="index, follow" />
    <title>سعر دواء <?php echo $row['arabic'] . "  " . $row['name'] . " الجديد | " .  "2023"  . " ثمن علاج " . $row['arabic'] . " price | " . $row['price'] ; ?> | دليل الدواء الجديد</title>
    <meta content='دليل الدواء الجديد <?php echo $row['name'] ?> ' name='keywords'/>
    <meta content=' سعر <?php echo  $row['name'] . " - "  . $row['arabic'] . " - "  ?>' property="og:description"/>
    <meta property="og:title" content=" <?php echo $row['arabic'] . " - " . $row['name'] . " price"; ?>">
    <meta property="og:image" content="<?php if($row['img'] != ''){ echo $row['img'];}else{ echo "https://www.dlildwa.com/favy.png";} ?> ">
    <?php
    include 'menu.php';
    ?>

    <style>
        .text-wrap {
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
        }
        .qr{
            background-color: #eaeaea;
        }
    </style>
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
            <div class="shadow p-3 bg-white rounded" style="height: 116px">
                <div>
                    <h4 class="font-medium text-gray-900">الشركة</h4>
                    <dd class="mt-2 text-gray-500"><?php echo $row['company']?></dd>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-3 text-center">
            <div class="shadow p-3 bg-white rounded" style="height: 116px">
                <div>
                    <h4 class="font-medium text-gray-900">نوع الدواء</h4>
                    <dd class="mt-2 text-gray-500"><?php echo $row['artype']." ".$row['arroute']?></dd>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-3 text-center">
            <div class="shadow p-3 bg-white rounded" style="height: 116px">
                <div>
                    <h4 class="font-medium text-gray-900">اخر تحديث للسعر</h4>
                    <dd class="mt-2 text-gray-500"><?php echo $row['lastupdated']?></dd>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-3 text-center">
            <div class="shadow p-3 bg-white rounded" style="height: 116px">
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
    <div class="row my-3">
        <hr>
        <div class="col-12 my-3">
            <h2>أسئلة شائعة عن</h2>
            <div class="py-3">
                <div>
                    <h3 class="text-center qr">
                        كيف يستعمل دواء<?php echo ucfirst($row['arabic']); ?> ؟
                    </h3>
                    <div>
                        <p>
                            يستعمل دواء
                            <?php echo ucfirst($row['arabic']).$row['name']; ?>
                            <?php if($row['uses'] != "sexual tonic"){echo $row['uses'];}else{echo "<span> </span>";} ?>
                            <?php echo $row['uses'];?>
                        </p>
                        <p><?php echo $row['description'];?></p>
                        <p><?php echo $row['indications'];?></p>

                    </div>
                </div>

                <div class="py-3">
                    <h3 class="text-center qr">  ما هي تركيبة دواء <?php echo ucfirst($row['arabic']); ?> ? </h3>
                    <div>
                        <p>تركيبة دواء<?php echo ucfirst($row['arabic']).$row['name']; ?></p>
                        <p>يتركب هذا الدواء من :<?php echo $row['active'];?></p>
                    </div>
                </div>

                <div class="py-3">
                    <h3 class="text-center qr">ما هي الشركة المنتجة لدواء<?php echo ucfirst($row['arabic']); ?> ؟ </h3>
                    <div>
                        <p>الشركة المنتجة لدواء<?php echo ucfirst($row['arabic']).$row['name']; ?></p>
                        <p>هذا الدواء من انتاج شركة  <?php echo $row['company'];?></p>
                    </div>
                </div>

                <div class="py-3">
                    <h3 class="text-center qr">ما هي جرعة دواء<?php echo ucfirst($row['arabic']); ?>  ؟</h3>
                    <div>
                        <p>جرعة دواء<?php echo ucfirst($row['arabic']); ?></p>
                       <p><?php echo $row['dose'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <hr>
        <div class="col-12">
            <h2>All You Need To Know About <b><?php echo $row['name'];?> </b></h2>
            <div class="content-en">
                <p>
                    Welcome to the new Drug Guide website, specifically the page for
                    <?php echo $row['arabic']. " ".$row['name'];?>.

                    <?php echo $row['arabic']. " ".$row['name'];?> is a highly effective medication that is used to treat a variety of conditions. It contains <?php echo $row['active'];?>, which is the active ingredient that provides the drug's therapeutic effect.

                    This medication is typically prescribed to treat <?php echo $row['uses'];?>, which include <?php echo $row['indications'];?>. It is known for its potent formula and fast-acting nature, making it a popular choice among healthcare providers and patients alike.

                    <?php echo $row['arabic']. " ".$row['name'];?> is produced by <?php echo $row['company'];?> and is available in the market at a price of <?php echo $row['price'];?>. It is one of the most popular and trusted medications in its class, and is often recommended by doctors for its safety and effectiveness.

                    Before taking <?php echo $row['arabic']. " ".$row['name'];?>, it is important to consult with your healthcare provider to ensure that it is safe and appropriate for your condition. Be sure to follow the dosage instructions carefully, and do not exceed the recommended dose.

                    If you have any questions or concerns about <?php echo $row['arabic']. " ".$row['name'];?> or any other medications, please don't hesitate to contact us. Our team of healthcare professionals is here to help you make informed decisions about your health and wellness.
                </p>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <hr>
        <p>
            <?php
            $qnum = mysqli_query($db, "SELECT COUNT(*) as total FROM drugs WHERE active = '$active'");
            $num=mysqli_fetch_assoc($qnum);
            ?>
        </p>
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-5 md:mb-6">
            بدائل دواء
            <?php echo ucfirst($row['arabic']); ?>
        </h2>
        <div class="mb-4 col-12 col-md-4 text-center">
            <div class="shadow p-3 bg-white rounded">
                <i class="fa-solid fa-store"></i>
                <div>
                    <div class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold"><?php echo $num['total']; ?>+</div>
                    <div class="text-sm sm:text-base font-semibold">عدد البدائل</div>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-4 text-center">
            <div class="shadow p-3 bg-white rounded">
                <i class="fa-solid fa-store"></i>
                <div>
                    <div id="visitor-count" class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold ">0+</div>
                    <div class="text-sm sm:text-base font-semibold">زائر</div>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-4 text-center">
            <div class="shadow p-3 bg-white rounded" style="height: 117px">
                <div>
                    <div class="text-indigo-500 font-bold text-wrap" style="font-size: 20px"><?php echo $row['active']?> </div>
                    <div class="text-sm sm:text-base font-semibold ">المادة الفعالة</div>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-4 text-center">
            <p>
                تم استعراض بدائل هذا الدواء
                <span style="color:red;font-size:20px;">
                <?php echo $row['sim_visits'];?>
                </span>
                مرة
            </p>
        </div>
    </div>
    <div class="row my-3 align-items-center justify-content-center">
        <hr>
        <h2 id="related-heading" class="text-xl font-bold text-gray-900 text-center qr py-2 my-3">ربما تحب التعرف على هذه الأدوية
            <?php  echo $row['arabic']; ?> </h2>        <?php
        $i = 0;
        $qsim = mysqli_query($db, "SELECT * FROM drugs WHERE active = '$active' ORDER BY visits LIMIT 5");
        while ($rowsim = mysqli_fetch_assoc($qsim)) {
            $i++;
            echo '<div class="col-12 col-md-4">';
            echo '<div class="card" style="width: 18rem;">';
            echo'  <img src="';
            if($rowsim['img'] != ''){ echo $rowsim['img'];}else{ echo "/rpng/". $rowsim['route'].".png";};

            echo'" alt="'.$rowsim["route"].'" class="w-full h-full object-center object-cover lg:w-full lg:h-full">';
            echo ' <div class="card-body">
                        <h5 class="card-title">'.$rowsim["active"].'</h5>
                        <p class="card-text">'.$rowsim["name"].'</p>
                        <a href="#" class="btn btn-primary"> '.$rowsim["id"].'</a>
                    </div>
                    </div>
                    </div>';
        }?>
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

<a href='/alternatives.php?id=<?php echo $row['id'];?>'>
<button class='text-2xl  btn bg-green-500 text-white font-medium  hover:shadow-lg  hover:bg-green-600 '>
اضغط هنا لعرض المزيد من البدائل
</button></a>

<div class='shareButtons'>
    <hr>
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
      <script>
          let count = 0;
          let intervalId = setInterval(function(){
              count++;
              document.getElementById("visitor-count").innerHTML = count + "+";
          }, 1); // increments every 1 millisecond
          setTimeout(function(){
              clearInterval(intervalId);
              document.getElementById("visitor-count").innerHTML = <?php echo $row['sim_visits']; ?> + "+";
          }, 4000); // stops counting after 4 seconds
      </script>
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

<?php
else:
header('Location: /');
endif;
include 'footer.php'
?>
</body>
</html>