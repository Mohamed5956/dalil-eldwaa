<?php
session_start();
include 'menu.php';


if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
$ip = $_SERVER['REMOTE_ADDR'];
}



?>
<!DOCTYPE html>
<html dir="rtl" style="text-align:right">
<head>
<title>
دليل الدواء 
</title>
<meta name="description" content="دليل الدواء , معلومات واستعمالات واسعار الادوية وتركيباتها والبدائل بسهولة ونتائج موثوقة">
<meta name="robots" content="index, follow" />
<link rel="canonical" href="https://dlildwa.com/" />
<meta property="og:title" content="دليل الدواء ">
<meta property="og:description" content="اسعار ومعلومات استعمال وبدائل الادوية من دليل الدواء ">
<meta property="og:url" content="https://dlildwa.com/">
<meta property="og:image" content="https://i.imgur.com/qIgVXpg.png" />
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .carousel-item img {
            width: 100%;
            max-height: 500px;
        }
        .drug-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        h2{
            background-color: #eaeaea;
            padding: 20px;
        }
    </style>
</head>
    <body>
<br>
<section class="searchSection">
    <div class="container mx-auto px-4">
        <form>
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" id="inputSearch" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="اكتب اسم االدواء الذي تود البحث عنه" required>

            </div>
        </form>

        <div id="responseDiv" class=" mb-4 bg-gray-50 rounded-lg border border-gray-100 ">
        </div>
    </div>
</section>
<p align="center">
    موقع دليل الدواء: عبارة عن محرك بحث للأدوية المصرية وكل المعلومات المتعلقة بها من أسعار، بدائل، إستعمالات، تركيبات ومواد فعالة في أكبر موقع يحتوي على 25 ألف صنف دوائي متوفر في السوق المصري والوطن العربي.
</p>

<section class="booksSection">
    <div class="container mb-5">
        <h2 class="m-5 decoration-dashed">أفضل الكتب الطبيه</h2>
        <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">
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
            <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<section class="IconsSection container mt-5">
    <div class="row d-flex align-items-center" style="background-color: #1C2346; padding-top: 25px">
        <div class="mb-4 col-12 col-md-3 text-center">
            <div class="shadow p-3 bg-white rounded" style="height: 100px">
                <div class="text-center">
                    <img src="https://wasfaty.sa/wp-content/uploads/2020/06/logo-rgb-2048x1427.png" alt="logo" style="height: 90px" >
                </div>
            </div>
        </div>
        <?php
        // Perform the query to fetch the count of drugs
        $query = "SELECT COUNT(*) AS drugCount FROM drugs";
        $result = mysqli_query($db, $query);

        if ($result) {
            // Retrieve the count of drugs from the query result
            $row = mysqli_fetch_assoc($result);
            $drugCount = $row['drugCount'];
        } else {
            // Handle the query error if needed
            $drugCount = "N/A";
        }
        ?>
        <div class="mb-4 col-12 col-md-4 text-center">
            <div class="shadow p-3 bg-white rounded" style="height: 100px">
                <div>
                    <h4 class="font-medium text-gray-900">عدد الأدويه</h4>
                    <div id="drug-count" class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold">0+</div>
                </div>
            </div>
        </div>
        <div class="mb-4 col-12 col-md-4 text-center">
            <div class="shadow p-3 bg-white rounded" style="height: 100px">
                <div>
                    <h4 class="font-medium text-gray-900">عدد الزيارات</h4>
                    <dd class="mt-2 text-gray-500"><?php ?></dd>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="articlesSection container mt-5">
    <h2>أفضل الموضوعات </h2>
    <div class="row">
        <div class="col-4 mb-5">
            <h3>سعر وبدائل ليفاسيل Levasyl أكياس للتخسيس 2023</h3>
            <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2022/09/ليفاسيل-أكياس-للتخسيسالسعر-والبدائل-والإستعمالات.png" alt="post1"/>
            <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/levasyl-for-weight-loss/">أذهب الى الموضوع مباشرة</a></h3>
        </div>

        <div class="col-4 mb-5">
            <h3>سعر اريكتاليس 5 وكل ما تود معرفته عنه</h3>
            <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2022/12/download.jpg" alt="post2"/>
            <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/erectalis-5/">أذهب الى الموضوع مباشرة</a></h3>
        </div>

        <div class="col-4 mb-5">
            <h3>كريم سانسو كولاجين (الأسعار والمواصفات)</h3>
            <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2022/12/77088-1-780x405.jpg" alt="post3"/>
            <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/sanso-collagen-cream-price/">أذهب الى الموضوع مباشرة</a></h3>
        </div>

        <div class="col-4 mb-5">
            <h3>بانادول جوينت Panadol joint – أفضل مسكن ألم</h3>
            <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2022/08/%D8%A8%D8%A7%D9%86%D8%A7%D8%AF%D9%88%D9%84-%D8%AC%D9%88%D9%8A%D9%86%D8%AA.png" alt="post3"/>
            <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/panadol-joint/">أذهب الى الموضوع مباشرة</a></h3>
        </div>

        <div class="col-4 mb-5">
            <h3>  بدائل Xanax لعلاج القلق والهلع (وكل ما تود معرفته عنه)</h3>
            <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2022/12/%D8%A8%D8%AF%D8%A7%D8%A6%D9%84-xanax.webp" alt="post3"/>
            <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/xanax-alternatives/">أذهب الى الموضوع مباشرة</a></h3>
        </div>

        <div class="col-4 mb-5">
            <h3>كيورا زونا سبراي Cura Zona Spray لتساقط الشعر 2023 </h3>
            <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2023/01/Cura-Zona-Spray-780x405.webp" alt="post3"/>
            <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/cura-zona-spray/">أذهب الى الموضوع مباشرة</a></h3>
        </div>

        <div class="col-4 mb-5">
            <h3>سعر وبدائل دواء بريجابالين pregabalin للأعصاب</h3>
            <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2022/08/%D8%A8%D8%B1%D8%AC%D8%A7%D9%84%D8%A8%D9%8A%D9%86.png" alt="post3"/>
            <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/pregabalin/">أذهب الى الموضوع مباشرة</a></h3>
        </div>

        <div class="col-4 mb-5">
            <h3>كل ما تحتاج إلى معرفته عن سيريبرو بروف</h3>
            <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2023/01/%D8%B3%D9%8A%D8%B1%D9%8A%D8%A8%D8%B1%D9%88-%D8%A8%D8%B1%D9%88%D9%81.jpg" alt="post3"/>
            <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/cerebroprove/">أذهب الى الموضوع مباشرة</a></h3>
        </div>

        <div class="col-4 mb-5">
            <h3>جل لعلاج حب الشباب Lamivex (وكل ما تود معرفته عنه)</h3>
            <img class="w-100" style="height: 300px" src="https://www.dlildwa.com/artopics/wp-content/uploads/2023/01/%D9%84%D8%A7%D9%85%D9%8A%D9%81%D9%8A%D9%83%D8%B3.jpg" alt="post3"/>
            <h3 class="text-center"><a target="_blank" href="https://www.dlildwa.com/artopics/lamivex-gel/">أذهب الى الموضوع مباشرة</a></h3>
        </div>
    </div>
</section>
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

<section class="DrugsSection container mt-5">
    <h2 class="m-5 decoration-dashed">دليل الأدوية</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        // Retrieve drugs data from the database
        $query = "SELECT * FROM drugs ORDER BY visits DESC LIMIT 50";
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $drugName = $row['name'];
            $drugImage = $row['img'];
            $drugPrice = $row['price'];
            $drugID = $row['id'];
            ?>
            <div class="col">
                <div class="card">
                    <img src="<?php echo $drugImage; ?>" class="card-img-top drug-image" alt="<?php echo $drugName; ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $drugName; ?></h5>
                        <p class="card-text">سعر الدواء: <?php echo $drugPrice; ?> جنيه</p>
                        <a href="drg.php?id=<?php echo $drugID; ?>" class="btn btn-primary mt-auto">تفاصيل الدواء</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>

<section class="features text-center container mt-5">
    <h2>قريبا في دليل الدواء</h2>
    <div style="width:95%;border:1px solid black;border-radius:5px;margin:5px auto;padding:10px;background:#f8f9fa">
<!--        <p style="font-size:20px">-->
<!---->
<!--        </p>-->
        <span class="redBold text-center"> الاستشارات الطبيه / اسئلة وأجوبة </span>
    </div>

</section>

<section class="BestDrugsSection container mt-5">
    <h2 class="m-5 decoration-dashed">اعلى ادويه زياره</h2>
    <div class="container mb-5">
        <div id="drugsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Retrieve drugs data from the database and loop through each book
                $query = "SELECT * FROM drugs ORDER BY visits DESC LIMIT 10";
                if(mysqli_query($db, $query)){
                    $i     = 0;
                    $sql   = mysqli_query($db, $query);
                    $firstItem = true; // Initialize firstItem variable
                    while ($rowactive = mysqli_fetch_assoc($sql)) {
                        $i++;
                        $drg = $rowactive['arabic'];
                        $drgImg = $rowactive['img'];
                        ?>
                        <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                            <img src="<?php echo $drgImg; ?>" alt="<?php echo $drg; ?>">
                            <div class="carousel-caption">
                                <?php echo "<p><a style='text-decoration: none;color: white' href='drg.php?id=".$rowactive['id']."'>".$drg."</a></p>"; ?>
                            </div>
                        </div>
                        <?php
                        $firstItem = false; // Update firstItem after the first iteration
                    }
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#drugsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#drugsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<!--<div class='shareButtons' style="border:1px solid black; border-radius:5px;width:75%;margin:5px auto;background:#1C2346">-->
<!--<h4 style="color: white">-->
<!--مشاركة دليل الدواء الجديد مع اصدقائك-->
<!--</h4>-->
<!--<a href='' id='fbLink' target='_blank'> <i class="fab fa-facebook" style="color: white"></i></a>-->
<!--<a href='' id='waLink' target='_blank'><i class='fab fa-whatsapp' style="color: white"></i></a>-->
<!--<a href='' id='twLink' target='_blank'><i class='fab fa-twitter' style="color: white"></i></a>-->
<!--</div>-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let count = 0;
    let intervalId = setInterval(function(){
        count++;
        document.getElementById("drug-count").innerHTML = count + "+";
    }, 1);
    setTimeout(function(){
        clearInterval(intervalId);
        document.getElementById("drug-count").innerHTML = <?php echo $drugCount; ?> + "+";
    }, 2000);
</script>
<script>
document.getElementById("fbLink").href = "https://www.facebook.com/sharer/sharer.php?u="+ window.location.href;
   document.getElementById("waLink").href = "whatsapp://send?text="+ window.location.href.replace(" ","+");
   document.getElementById("twLink").href = "https://twitter.com/share?url="+ window.location.href;
$(document).ready(function(){
$(document).on('keyup', '#inputSearch', function(){
    /*
if($('#inputSearch').val().length > 2){
var searchterm   = $('#inputSearch').val();
    $.ajax({
  	  url:'server.php',
      type: 'POST',
      data: {
      	'searchterm' : searchterm,
      	'date'       : new Date().toLocaleString(),
      	'ip'         : '<?php echo $ip;?>',
      },
      success: function(response){
      }

  	});
}
*/
if($('#inputSearch').val().length > 1){
var searchq   = $('#inputSearch').val();
  	$.ajax({
  	  url:'server.php',
      type: 'POST',
      data: {
      	'search' : 1,
      	'searchq': searchq,
      },
      success: function(response){
        var results = JSON.parse(response);
     $('#responseDiv').html("<table id='tblDrug'></table>");
     for(i=0;i<results.length;i++){
      tblDrug.innerHTML +=
      "<tr><td><a class='track' href='" + "<?php if((isset( $_SESSION['email']) && $_SESSION['usergroup'] == 3)){echo "/medrg/edit";}else{echo "drg";}?>" + ".php?id="+results[i].id+"' target='_blank'>"+
      "<span  style='font-size:18px;font-weight:bold;color:#0404B4'>"+results[i].name.charAt(0).toUpperCase() + results[i].name.slice(1)+"</span><br>"+
      "<span  style='font-size:15px;color:#000'>"+results[i].arabic+"</span><br>"+
      "<span style='font-size:11px'>"+results[i].id+ "|"  +results[i].visits   + "V|" +results[i].active.slice(0,15)+ ".. - ..</span></a></td>"+
      "<td style='width:20%'><a href='/drg.php?id="+results[i].id+"'><span style='font-size:20px;font-weight:bold;color:#FF0000'>"+results[i].price+"</span> L.E.</a></td></tr>"

       }
      }

  	});

   }else{
       $('#responseDiv').html("");
   }
  });

});
</script>
    </body>
<?php 
include 'footer.php'; 
?>
</html>