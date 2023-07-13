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
    <style>
        .text-wrap {
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
        }
        h1,h2{
            background-color: #c4ced7;
            padding: 20px;
        }
        .carousel-item img {
            width: 100%;
            max-height: 500px;
        }
        .hvr-icon-forward:hover .overlay {
            bottom: 75%;
            height: 25%;
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


    </style>
</head>
<body>
<div class="container">
<div style="text-align:right;margin:5px">
<h2 class="mt-3">
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
    <p align="center">
        تم البحث عن بدائل هذا الدواء
        <span style="color:red;font-size:20px;">
            <?php echo $row['sim_visits'];?>
        </span>
        مرة
    </p>
    <hr>
</div>
<h3 align="center" style="margin:10px auto;">
بدايل دواء 
<?php  echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
</h3>


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
    <hr>
<!-- Related products -->
    <section aria-labelledby="related-heading" class="mt-5 sm:mt-24">
      <h2 id="related-heading" class="text-xl font-bold text-gray-900">
بدائل دواء <?php  echo $row['arabic']; ?> </h2>

      <div class="text-wrap mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

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
    </section>





</div>
<div class="text-center">
<div style="width:95%;border:1px solid black;border-radius:5px;margin:5px auto;background:#f8f9fa">
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
    <div class="row text-wrap">
        <h2 class="me-auto mt-3"> All You Need To Know About <?= $row['name'] ?>  </h2>
        <p>
            Welcome to the new Drug Guide website, specifically the page for <?php echo $row['arabic']. " ".$row['name'];?>.
            <?php echo $row['arabic']. " ".$row['name'];?> is a highly effective medication that is used to treat a variety of conditions. It contains <?php echo $row['active'];?>, which is the active ingredient that provides the drug's therapeutic effect.
            This medication is typically prescribed to treat <?php echo $row['uses'];?>, which include <?php echo $row['indications'];?>. It is known for its potent formula and fast-acting nature, making it a popular choice among healthcare providers and patients alike.
            <?php echo $row['arabic']. " ".$row['name'];?> is produced by <?php echo $row['company'];?> and is available in the market at a price of <?php echo $row['price'];?>. It is one of the most popular and trusted medications in its class, and is often recommended by doctors for its safety and effectiveness.
            Before taking <?php echo $row['arabic']. " ".$row['name'];?>, it is important to consult with your healthcare provider to ensure that it is safe and appropriate for your condition. Be sure to follow the dosage instructions carefully, and do not exceed the recommended dose.
            If you have any questions or concerns about <?php echo $row['arabic']. " ".$row['name'];?> or any other medications, please don't hesitate to contact us. Our team of healthcare professionals is here to help you make informed decisions about your health and wellness.
        </p>
        
    </div>
    <hr>
    <div class="container mb-5">
        <h2 class="m-5 decoration-dashed">كتب ذات صله</h2>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Retrieve book data from the database and loop through each book
                $booksQuery = mysqli_query($db, "SELECT * FROM books");
                $firstItem = true;
                while ($book = mysqli_fetch_assoc($booksQuery)) {
                    $bookTitle = $book['arabic'];
                    $bookImage = $book['img'];
                    ?>
                    <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                        <h4><?php echo $bookTitle; ?></h4>
                        <img src="<?php echo $bookImage; ?>" alt="<?php echo $bookTitle; ?>">
                    </div>
                    <?php
                    $firstItem = false;
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include "footer.php" ?>

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