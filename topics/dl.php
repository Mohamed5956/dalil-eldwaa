<?php
include '../conn.php';
$sql    = mysqli_query($db, "SELECT * FROM books ORDER BY id DESC");


?>
<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="index, follow" />
<title> 
قسم تحميل الكتب الطبية
</title>
      <meta property = "og:title"         content = "تحميل جميع الكتب الطبية" />
      <meta property = "og:image"         content = "https://i.imgur.com/hi8POpv.jpg" />
      <meta property = "og:description"   content = "تحميل وتنزيل كل كتب الطب والصيدلة" />
      <meta name     = "keywords"         content = "كتب طبية, كتب صيدلة, كتب اسنان, كتب تحاليل طبية, كتب ادوية" />
      <meta name     = "description"      content = "تحميل كتب طبية وكتب ادوية كتب طبية, كتب صيدلة, كتب اسنان, كتب تحاليل طبية, كتب ادوية" />
      <meta name     = "author"           content = "Dr - Ahmed Hassan" />
     
<?php
include '../menu.php';
?>
</head>
<body>
   <div style="margin:5px auto;padding:5px;width:380px;border:1px solid black; border-radius:10px;text-align:center">
   <h1 style="font-size:22px">
قائمة بها جميع الكتب الطبية مرتبة حسب الأحدث
   </h1> 
</div>


 
 <div align="center" id="searchBooksArea">
       
   <br>
<input id="inputSearch" class="form-control input-lg" style="height:50px" type="text" placeholder="ابحث عن اي كتاب هنا " autofocus />   
   <br>
   <div id="result"></div>
 </div>
 
 
<div align="center">
<br>
<br><br>
<div align="center">
   <a id="shareLinkuses" class="sharebookcounter" href="https://www.facebook.com/sharer/sharer.php?u=https://dlildwa.com/dl.php" target="blank">
       <button style="width:350px;height:70px;margin:10px auto;background:#007bff;border:0;border-radius:5px;color:#fff;">
     <span style="font-size:30px;">Share to facebook</span>   
      <br>
       </button>
   </a>
   <br>
   
   تم تحميل هذه الكتب 
   <span id="cunter" style="font-size:20px;color:red;font-weight:bold"></span>
   مرة تحميل
 </div>
 </div>
    

    <style>
     .itemsfeatured {
    position: relative;
    margin:5px;
    height:200px;
    width:45%;
    background: #D8CEF6;
    padding: 10px;
    text-align: center;
    border: 1px solid transparent;
    border-radius: 5px;
    box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
    }
    
   .itemsfeatured a{
        font-size:14px;
        color:#000;
        font-weight:bold;
        text-decoration:none;
    }
    .fileName{
        height:45px;
        overflow:hidden;
        padding:5px;
        color:blue;
    }
    </style>

    <div id="divOuter" style="display:flex; flex-wrap: wrap;justify-content: center;margin:10px auto;text-align:center">
     <?php 
	while ($row = mysqli_fetch_assoc($sql)) {
	    echo "<div class='itemsfeatured sharebookcounter'><a href='book.php?id=".$row['id']."'>";
	    echo "<img src='". $row['img']."' style='width:160px; height:100px; object-fit: contain; border-radius:10px;'>";
	    echo "<br><p class='fileName'> تحميل ".$row['arabic']."</p><hr style='margin:1px'> <i class='fa fa-download' aria-hidden='true'></i><span class='counterdl'> ".$row['visits']."</span></a></div>";
	   
	    }
	    
	    ?>
   </div> 
   <hr>
    <div class="about" style="font-size:18px;margin:10px auto;width:80%;text-align:right">
   
<p style="text-align: right;">&nbsp;دليل الدواء الجديد : قسم الكتب الطبية / للتحميل والتنزيل المجاني&nbsp;</p><p style="text-align: right;"><br /></p><p style="text-align: right;">لقد قمنا بإنشاء هذا القسم تحديداً لكي يحتوي علي كل الكتب الطبية التي تخص كل الفئات العاملة بالمجال الطبي من الأطباء والصيادلة والممرضين ووضعها جميعاً داخل قسم " الكتب الطبية " في موقع " دليل الدواء الجديد "</p><p style="text-align: right;"><br /></p><p style="text-align: right;">&nbsp;وهذه الكتب الطبية مقدمة بشكل مجاني تماماً وبطريق تحميل بسيطة جداً وعبر روابط تحميل مباشرة , يتم تحديث هذا القسم بإستمرار وإضافة كل الكتب الطبية والصيدلانية الجديدة والتعديل علي الكتب الموجودة ان حدث بها تغيير أو اضافة&nbsp;</p><p style="text-align: right;"><br /></p><p style="text-align: right;">وسوف تجد في هذا القسم كل الكتب التي تخص المجال الطبي والأدوية مثل :&nbsp;</p><p style="text-align: left;"></p>
<div style="text-align: right;"><ul dir="rtl" style="text-align: right;"><li><span style="text-align: center;"> التداخلات الدوائية</span></li><li>- كتب التحاليل الطبية</li><li>- كتب المضادات الحيوية</li><li>- كتب الفارماكولوجي</li><li>- كتب وشروحات وتدريبات الصيادلة&nbsp;</li><li>- شرح الصيدلة الاكلينيكية والعلاجية</li><li>- أشهر أخطاء الأطباء في كتابة الروشتات العلاجية</li><li>- وصف ال otc</li></ul></div>
 هذا فقط علي سبيل المثال لا الحصر 

كما يمكنك أيضا - من خلال هذا القسم - تحميل دليل وقاعدة بيانات الأدوية مجاااناً
   
        </div>  
    <hr>
  <div style="text-align:center;width:90%;margin:10px auto; padding:5px;border:1px solid black">
      <h1>
          تنبيه هام
      </h1>
      
      <p>
        
        
         <br>
         <a href="contact.php">
               اتصل بنا -
              contact us
         </a>
      </p>
</div>
   </div>
   
   
 <script>
$(document).on('input', '#inputSearch', function(){
    if(inputSearch.value.length > 1){
  	$.ajax({
  	  url  :'server.php',
      type : 'POST',
      data : {
      	'searchBooks' : inputSearch.value
       },success: function(response){
        var results = JSON.parse(response);
         result.innerHTML = ""
        for(i=0;i<results.length;i++){
        result.innerHTML += "<p style='text-align:right;padding:5px;margin:5px'><a style='font-size:15px;font-weight:bold;color:#0404B4' href='book.php?id="+results[i].id+"'>"+results[i].arabic+"</a></p>"
        console.log(results);
       }
       }
  	});
    }
  });
 
 
 $('#cunter').html($('.counterdl').text().split(" ").map(x=>+x).reduce((a, b) => a + b, 0))
     
   $(document).on('click', '.sharebookcounter', function(){
  	$.ajax({
  	  url  :'',
      type : 'POST',
      data : {
      	'sharebooks' : 1
       }
      
  	});		
  });
  
     
     
 </script>
 
  
</body>
<?php 
include '../footer.php'; 
?>
</html>