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
    </style>
</head>
<body>

<div class="container">
    <div class="row ">
        <div class="col-12 d-flex justify-content-start align-items-center my-3">
<!--            <div class="card text-center" style="width: 20rem;">-->
<!--                <div class="card-body">-->
                    <h2 class="card-title">    المادة الفعالة  لدواء
                        <?php
                        if( $row['arabic'] !=""){
                            echo $row['arabic'] . " <br> مكونات علاج "  . ucfirst($row['name']);
                        }else{
                            echo ucfirst($row['name']);
                        }
                        ?>
                    </h2>
                </div>
        <div align="center">
            <img src=" <?php if($row['img'] != ""){echo $row['img'];} ?>" class="card-img-top" alt="<?php echo ucfirst($row['name']); ?>" style="object-fit:contain; height: 350px;width: 400px;">
        </div>
                <div align="center">
                    <h2 class="card-text"> <b>
                            <?php
                            if( $row['arabic'] !=""){
                                echo " <br> مكونات علاج "  . ucfirst($row['name']);
                            }else{
                                echo ucfirst($row['name']);
                            }
                            ?>
                        </b>
                    </h2>
                </div>
<!--            </div>-->
<!--        </div>-->
    </div>
<!--    <div class="row">-->
<!--        <div class="col-12 my-3">-->
<!--            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"-->
<!--                    crossorigin="anonymous"></script>-->
<!--            <ins class="adsbygoogle"-->
<!--                 style="display:block; text-align:center;"-->
<!--                 data-ad-layout="in-article"-->
<!--                 data-ad-format="fluid"-->
<!--                 data-ad-client="ca-pub-7891698547800920"-->
<!--                 data-ad-slot="9385944970"></ins>-->
<!--            <script>-->
<!--                (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--            </script>-->
<!--        </div>-->
<!--        <hr>-->
<!--    </div>-->
    <div class="row my-3">
        <hr>
        <div class="col-12 my-3 p-3" style="background-color: #f8f9fa">
            <h3 class="text-center">ما هي تركيبة <?php  echo $row['arabic'] . " <br> "  .  ucfirst($row['name']); ?>؟</h3>
            <hr>
            <p class="text-wrap" style="font-weight: bold;font-size:20px;color:blue;">*<?php if($row['aractive'] !=''){echo $row['aractive'];}else{echo $row['active'];} ?></p>
        </div>
    </div>
    <div class="row mt-5 text-center">
        <div class="col-12">
            <a target="_blank" href="/indications.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">الإستعمال</button></a>
            <a target="_blank" href="/alternatives.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> البدائل</button></a>
            <a target="_blank" href="/drg.php?id=<?php echo $row['id'];?>"> <button type="button" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">السعر</button></a>
        </div>
    </div>
    <div class="row my-5">
        <hr>
        <div class="col-12 text-center">
            <h2 class="card-title text-center my-3">    المادة الفعالة  لدواء
                <?php
                if( $row['arabic'] !=""){
                    echo $row['arabic'] . " <br> مكونات علاج "  . ucfirst($row['name']);
                }else{
                    echo ucfirst($row['name']);
                }
                ?>
            </h2>
            <p class="text-center text-wrap">
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
        </div>
    </div>
<!--    <div class="row my-3">-->
<!--        <hr>-->
<!--        <div class="col-12">-->
<!--            <div class="usesKeywords" align="right" style="margin:10px">-->
<!--                <p>-->
<!--                    كلمات دلالية-->
<!--                </p>-->
<!--                <li>-->
<!--                    ما هي المادة الفعالة  دواء-->
<!--                    --><?php // echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    دواعي استعمال-->
<!--                    --><?php // echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    مكونات علاج-->
<!--                    --><?php // echo  $row['name']; ?>
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    فيم يستخدم دواء/ علاج-->
<!--                    --><?php // echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    هل يستخدم دواء-->
<!--                    --><?php // echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
<!--                    لعلاج-->
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    متى استعمل علاج-->
<!--                    --><?php // echo $row['arabic'] . "  "  .  ucfirst($row['name']); ?>
<!--                </li>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
     <div class="row">
         <hr>
         <div class="col-12">
             <h2 class="m-5 decoration-dashed">كتب ذات صله</h2>
             <div id="myCarousel" class="carousel slide col-12" data-bs-ride="carousel">
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
</div>

<!--تم البحث عن المادةالفعالة لدواء -->
<?php //echo ucfirst($row['name']);?>
<!--<br>-->
<?php //echo $row['cmp_visits'];?><!-- -->
<!-- مرة-->

<?php
 if (isset( $_SESSION['email']) && $_SESSION['user_group'] == 2 ){
echo "<div align='center'><a  href='admin/edit_med.php/?id=". $row["id"] ."'><button class='btn btn-danger'>Edit this med</button></a></div>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
include 'footer.php'
?>
</html>


