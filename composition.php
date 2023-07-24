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
        h1, h2, h3{
            color: #098bac !important;
        }
        h2{
            background-color: #eaeaea;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row ">
        <div class="col-12 d-flex justify-content-start align-items-center my-3">
<!--            <div class="card text-center" style="width: 20rem;">-->
<!--                <div class="card-body">-->
                    <h1 class="card-title">    المادة الفعالة  لدواء
                        <?php
                        if( $row['arabic'] !=""){
                            echo $row['arabic'] . " <br> مكونات علاج "  . ucfirst($row['name']);
                        }else{
                            echo ucfirst($row['name']);
                        }
                        ?>
                    </h1>
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
            <p class="text-wrap text-center">
                مرحبًا بك في موقع دليل الدواء الجديد، وتحديدًا في صفحة دواء <?php echo $row['arabic']. " ".$row['name'];?>.

                <?php echo $row['arabic']. " ".$row['name'];?> هو دواء فعال جدًا يستخدم لعلاج مجموعة متنوعة من الحالات. يحتوي الدواء على <?php echo $row['active'];?>، وهي المادة الفعالة التي توفر التأثير العلاجي للدواء.

                يتم تصفية هذا الدواء بشكل عام لعلاج <?php echo $row['uses'];?>، والتي تشمل <?php echo $row['indications'];?>. يشتهر الدواء بتركيبته القوية وسرعة عمله، مما يجعله اختيارًا شائعًا بين مقدمي الرعاية الصحية والمرضى على حد سواء.

                <?php echo $row['arabic']. " ".$row['name'];?> من إنتاج <?php echo $row['company'];?> ويتوفر في السوق بسعر <?php echo $row['price'];?>. إنه واحد من أشهر وأكثر الأدوية ثقة في فئته، ويتم توصيته عادة من قبل الأطباء بسبب سلامته وفعاليته.

                قبل تناول <?php echo $row['arabic']. " ".$row['name'];?>، من المهم استشارة مقدم الرعاية الصحية الخاص بك للتأكد من أنه آمن ومناسب لحالتك. تأكد من اتباع تعليمات الجرعة بعناية، ولا تتجاوز الجرعة الموصى بها.

                إذا كان لديك أي أسئلة أو مخاوف حول <?php echo $row['arabic']. " ".$row['name'];?> أو أي أدوية أخرى، فلا تتردد في الاتصال بنا. فريقنا من المهنيين الصحيين هنا لمساعدتك في اتخاذ القرارات المستنيرة حول صحتك ورفاهيتك.
            </p>
            <hr>
            <p class="text-center text-wrap">Welcome to the new Drug Guide website, specifically the page for
                <?php echo $row['arabic']. " ".$row['name'];?>.

                <?php echo $row['arabic']. " ".$row['name'];?> is a highly effective medication that is used to treat a variety of conditions. It contains <?php echo $row['active'];?>, which is the active ingredient that provides the drug's therapeutic effect.

                This medication is typically prescribed to treat <?php echo $row['uses'];?>, which include <?php echo $row['indications'];?>. It is known for its potent formula and fast-acting nature, making it a popular choice among healthcare providers and patients alike.

                <?php echo $row['arabic']. " ".$row['name'];?> is produced by <?php echo $row['company'];?> and is available in the market at a price of <?php echo $row['price'];?>. It is one of the most popular and trusted medications in its class, and is often recommended by doctors for its safety and effectiveness.

                Before taking <?php echo $row['arabic']. " ".$row['name'];?>, it is important to consult with your healthcare provider to ensure that it is safe and appropriate for your condition. Be sure to follow the dosage instructions carefully, and do not exceed the recommended dose.

                If you have any questions or concerns about <?php echo $row['arabic']. " ".$row['name'];?> or any other medications, please don't hesitate to contact us. Our team of healthcare professionals is here to help you make informed decisions about your health and wellness.
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
     </div>
    <section class="postsSection container mt-5">
        <h2>أفضل المقالات</h2>

        <div class="row">
            <div class="col-4 mb-5">
                <h3>سعر فورفلوزين 10 مجم ودواعي الاستعمال</h3>
                <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2023/01/%D9%81%D9%88%D8%B1%D9%81%D9%84%D9%88%D8%B2%D9%8A%D9%86-10-%D8%B3%D8%B9%D8%B1.jpg" alt="post1"/>
                <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/forflozin-10-price/">أذهب الى الموضوع مباشرة</a></h3>
            </div>

            <div class="col-4 mb-5">
                <h3>كيورا زونا سبراي Cura Zona Spray لتساقط الشعر 2023 </h3>
                <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2023/01/Cura-Zona-Spray-780x405.webp" alt="post2"/>
                <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/cura-zona-spray/">أذهب الى الموضوع مباشرة</a></h3>
            </div>

            <div class="col-4 mb-5">
                <h3>جل لعلاج حب الشباب Lamivex (وكل ما تود معرفته عنه)</h3>
                <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2023/01/%D9%84%D8%A7%D9%85%D9%8A%D9%81%D9%8A%D9%83%D8%B3.jpg" alt="post3"/>
                <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/lamivex-gel/">أذهب الى الموضوع مباشرة</a></h3>
            </div>

            <div class="col-4 mb-5">
                <h3>بدائل Arcoxia لعلاج التهاب المفاصل (كل ما تريد معرفته عنه)</h3>
                <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2023/01/arcoxia.jpg" alt="post3"/>
                <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/arcoxia-alternatives/">أذهب الى الموضوع مباشرة</a></h3>
            </div>

            <div class="col-4 mb-5">
                <h3> ليفاسيل بودر للتخسيس وسد الشهية (وكل ما تود معرفته عنه)</h3>
                <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2022/09/%D9%84%D9%8A%D9%81%D8%A7%D8%B3%D9%8A%D9%84-%D8%A3%D9%83%D9%8A%D8%A7%D8%B3-%D9%84%D9%84%D8%AA%D8%AE%D8%B3%D9%8A%D8%B3%D8%A7%D9%84%D8%B3%D8%B9%D8%B1-%D9%88%D8%A7%D9%84%D8%A8%D8%AF%D8%A7%D8%A6%D9%84-%D9%88%D8%A7%D9%84%D8%A5%D8%B3%D8%AA%D8%B9%D9%85%D8%A7%D9%84%D8%A7%D8%AA-780x405.png" alt="post3"/>
                <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/levasyl-powder/">أذهب الى الموضوع مباشرة</a></h3>
            </div>

            <div class="col-4 mb-5">
                <h3>تساقط الشعر – الأسباب وأفضل طرق العلاج للرجال والنساء</h3>
                <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2022/09/%D8%AA%D8%B3%D8%A7%D9%82%D8%B7-%D8%A7%D9%84%D8%B4%D8%B9%D8%B1-%D8%A7%D9%84%D8%A3%D8%B3%D8%A8%D8%A7%D8%A8-%D9%88%D8%A3%D9%81%D8%B6%D9%84-%D8%B7%D8%B1%D9%82-%D8%A7%D9%84%D8%B9%D9%84%D8%A7%D8%AC-%D9%84%D9%84%D8%B1%D8%AC%D8%A7%D9%84-%D9%88%D8%A7%D9%84%D9%86%D8%B3%D8%A7%D8%A1-768x448.jpg" alt="post3"/>
                <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/hair-regrowth-minoxidil/">أذهب الى الموضوع مباشرة</a></h3>
            </div>
        </div>
    </section>

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


