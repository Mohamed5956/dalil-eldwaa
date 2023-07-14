<?php
session_start();
$id          = $_GET['id'];
if(is_numeric($id)):
include 'conn.php';
$q           = mysqli_query($db, "SELECT * FROM drugs WHERE id = $id");
$row         = mysqli_fetch_assoc($q);
$active      = $row['active'];
$sqlv = "UPDATE drugs SET ind_visits = ind_visits+1 WHERE id = $id";
mysqli_query($db, $sqlv);
?>
<!DOCTYPE html>
<html>
<head>
        
<meta name="robots" content="index, follow" />
<meta property="og:title" content=" استعمالات دواء<?php  echo $row['arabic'] . "  "  .  $row['name']; ?> من موقع دليل دواء مصر">
<meta property="og:description" content=" استعمالات / استخدامات دواء <?php echo $row['arabic'] . " | ". $row['name']; ?> ">
<meta property="og:image" content="<?php echo $row['img']; ?> ">
<title> استعمالات دواء  <?php  echo $row['arabic'] . "  "  .  $row['name']; ?> دليل دواء مصر</title>
<meta name="description" content="استعمالات / استخدامات دواء <?php echo $row['arabic'] . " | ". $row['name']; ?> alternatives">
<meta content='ما هي استعمالات واستخدامات علاج <?php echo $row['arabic'] ." | ". $row['name'] ?> ' name='keywords'/>
<link href='https://www.pricesdwa.com/favicon.ico' rel='icon' type='image/x-icon'/>

    <?php
include 'menu.php';
?>
    <style>
        .carousel-item img {
            width: 100%;
            max-height: 500px;
        }
        .text-wrap {
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
        }
        h1,h2{
            background-color: #eaeaea;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
<div style="text-align:right;margin:5px">
<h2>
    استعمالات دواء
 <?php 
 if( $row['arabic'] !=""){
    echo $row['arabic'] . " <br> استخدامات علاج "  . ucfirst($row['name']);
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
<br>
    <p align="center">
        تم البحث عن استخدام هذا الدواء
        <span style="color:red;font-size:20px;">
        <?php echo htmlspecialchars($row['ind_visits'], ENT_QUOTES, 'UTF-8'); ?>
    </span>
        مرة
    </p>

    <hr>
<br>
 مرة
</div>

<?php
 if (isset( $_SESSION['email']) && $_SESSION['user_group'] == 2 ){
echo "<div align='center'><a  href='admin/edit_med.php/?id=". $row["id"] ."'><button class='btn btn-danger'>Edit this med</button></a></div>";
}
?>
<div style="padding:5px;margin:1px;background:#f8f9fa">
<h3 align="center" style="margin:5px auto;">
ما هي دواعي استعمال 
<?php  echo $row['arabic'] . " <br> "  .  ucfirst($row['name']); ?>
؟
</h3>
<hr>
<div id="usesDiv" style="text-align:right;margin:5px;padding:10px;font-size:20px;font-weight:bold;color:blue">
*
<?php if($row['uses'] !=''){echo $row['uses'];}else{echo $row['description'];} ?>
</div>
</div>
<hr>
<div align="center">
    <br>
    
    
<br>
    <div class="container text-wrap">
        <?php echo "<h2 class='mb-3'>ما هو دواء " . $row['arabic'] . "</h2>"; ?>
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

<!--            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"-->
<!--                    crossorigin="anonymous"></script>-->
<!--            <ins class="adsbygoogle"-->
<!--                 style="display:block"-->
<!--                 data-ad-format="fluid"-->
<!--                 data-ad-layout-key="-g4+1d-5f-jd+1jh"-->
<!--                 data-ad-client="ca-pub-7891698547800920"-->
<!--                 data-ad-slot="1765162170"></ins>-->
<!--            <script>-->
<!--                (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--            </script>-->

            <br>
            <br>


    </div>
<div align="center">
   <a target="_blank" href="alternatives.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">البدائل</button></a>
   <a target="_blank" href="composition.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> المكونات</button></a>
   <a target="_blank" href="drg.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">السعر</button></a>
    <br>
<br>    

</div>


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
                        <img src="<?php echo $bookImage; ?>" alt="<?php echo $bookTitle; ?>">
                        <p><?php echo $bookTitle; ?></p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
<?php include "footer.php" ?>

<?php
else:
header('Location: /');
endif;

?>
</html>