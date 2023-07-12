<?php
$id     = $_GET['id'];
if(is_numeric($id)):
include 'conn.php';
$sql    = mysqli_query($db, "SELECT * FROM books WHERE id = $id");
$row    = mysqli_fetch_assoc($sql);
if (isset($_POST['shares'])) {
    $sqlshares   = "UPDATE books SET shares = shares + 1 WHERE id = $id";
    mysqli_query($db, $sqlshares);
}
$sqlv   = "UPDATE books SET visits = visits + 1 WHERE id = $id";
mysqli_query($db, $sqlv);
?>
<!DOCTYPE html>
<html>
 
<head>
<script src="https://cdn.tailwindcss.com"></script>
<meta name="robots" content="index, follow" />
<title> 
تحميل / تنزيل
<?php echo " " . $row['arabic'] . " | " . $row['name']; ?>
</title>
      <meta property="og:title"       content = "<?php echo $row['arabic'] . " | " . $row['name']; ?>" />
      <meta property="og:image"       content = "<?php echo $row['img']; ?>" />
      <meta property="og:description" content = "<?php echo  $row['description']; ?>" />
      <meta name = "keywords"         content = "<?php echo  $row['keywords']; ?>" />
      <meta name = "description"      content = "<?php echo  $row['description']; ?>" />
      <meta name = "author"           content = "Dr- Ahmed Hassan" />
      <link href="https://www.dwaprices.com/img/books.ico" rel="icon" type="image/x-icon"/>

<?php
include 'menu.php';
?>
<style>
.navbar-nav a{
   text-align:right; 
}

    .preDownload{
        margin:5px auto;
        padding:5px;
        width:80%;
        border:1px solid transparent;
        border-radius:10px;
        text-align:center;
        background:#8A0808;
        color:#fff;
        font-size:20px;
        font-weight:bold;
        box-shadow: 0 0 8px 5px rgb(0 0 0 / 33%);
    }
</style>


</head>
<body>
<div style="margin:5px auto;padding:5px;width:380px;border:1px solid black; border-radius:10px;text-align:center">
<h1 style="font-size:30px;color:#0101DF">
تحميل / تثبيت
<?php echo $row['arabic'] . " <br> " . $row['name']; ?>
</h1> 
 </div>
<div align="center">    
<p style="font-size:17px" align="center">
<i class="fas fa-eye"></i>
<?php echo $row['visits'];?>
 Views
 <?php
if ((isset( $_SESSION['email']) && $_SESSION['usergroup'] == 2) || (isset($_COOKIE['UEMAIL']) && $_COOKIE['UGROUP'] == 2 ) ){
echo "<hr><a  href='medrg/editbook.php?id=". $row["id"] ."'><button  class='btn btn-danger'  >Edit this book</button></a><hr>";
}
?>

</p>

<hr>

<div class="about" style="font-size:18px">
<?php echo $row['description']; ?>
</div>  
</div>
<br>
<br>
<br>
<br>
<div align="center">
<img src="<?php echo $row['img']; ?>" style="width:400px; height:400px; object-fit: contain; border-radius:10px;">
</div>


<p style="font-size:25px;color:red;font-weight:bold;text-align:center">
لتحميل  / تثبيت <br>
<?php echo $row['arabic'] ; ?>
<br>
اضغط الزر اسفله
</p>
<br>
<div align="center">

  <br>
    <br>
</div>
<div align="center">


  <br>
  
  
  <br>
</div>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<!-- Adme -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="2096790545"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br>
      
<form action="/d/" method="POST" align="center">
 <input type="hidden" name="name" value="<?php echo $row['name']?>"/>
 <input type="hidden" name="link" value="<?php echo $row['link']?>"/>
 <input type="hidden" name="img"  value="<?php echo $row['img']?>"/>
 <input class="btn btn-primary" style="font-size: 0.7rem;" value="تحميل " type="submit">
</form>

<br>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-g4+1d-5f-jd+1jh"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="1765162170"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<br>


<script>
      $(document).ready(function(){
       var replacedBr = $(".about").html()
       replacedBr = replacedBr.replaceAll("\n", "<br>");
       $(".about").html(replacedBr);
       
       $(document).on('click', '#shareLink', function(){
  	$.ajax({
  	  url  :'',
      type : 'POST',
      data : {
      	'shares' : 1
       }
      
  	});		
  });
});
</script>  

<br />


<br />
<hr>  
  




<hr>
<div class="container" style="text-align:right">

<hr>


<div align="center">
     
   <a id="shareLink" href="" target="blank">
       <button class="btn btn-primary input-lg" style="width:300px;height:70px;font-size:30px;font-weight:bold">
        Share to facebook
       </button>
   </a>
   <p>
       تم مشاركة هذا الملف
       
     <?php echo $row['shares'];?>
   
   مرة
   </p>
   
   
</div>

<script>
     document.getElementById("shareLink").href       = "https://www.facebook.com/sharer/sharer.php?u=" + "https://dlildwa.com/book.php?id=<?php echo $id;?>";
</script>



  
  

    
   </div> 
    
    <hr>

   
   
   </div>
   
 
<div class="bg-white">
  <section aria-labelledby="features-heading" class="relative">
    <div class="aspect-w-3 aspect-h-2 overflow-hidden sm:aspect-w-5 lg:aspect-none lg:absolute lg:w-1/2 lg:h-full lg:pr-4 xl:pr-16">
      <img src="<?php echo $row['img']?>" alt="<?php echo $row['arabic']?>" class="rounded-lg bg-gray-100">
    </div>

    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:pb-32 sm:px-6 lg:max-w-7xl lg:pt-32 lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
      <div class="lg:col-start-2 text-right	">
        <h2 id="features-heading" class="font-medium text-gray-500">تحميل كتاب <?php echo $row['arabic']?></h2>
        <p class="mt-4 text-4xl font-extrabold text-gray-900 tracking-tight"><?php echo $row['arabic']?></p>
        <p class="mt-4 text-gray-500"><?php echo $row['arabic']?></p>

        <dl class="mt-10 grid grid-cols-1 gap-y-10 gap-x-8 text-sm sm:grid-cols-2">
          <div>
            <dt class="font-medium text-gray-900">اللغة</dt>
            <dd class="mt-2 text-gray-500"><?php echo $row['language']?></dd>
          </div>

          <div>
            <dt class="font-medium text-gray-900">حجم الكتاب</dt>
            <dd class="mt-2 text-gray-500"><?php echo $row['size']?></dd>
          </div>

          <div>
            <dt class="font-medium text-gray-900">عدد الصفحات</dt>
            <dd class="mt-2 text-gray-500"><?php echo $row['pages']?></dd>
          </div>

          <div>
            <dt class="font-medium text-gray-900">عدد التحميلات </dt>
            <dd class="mt-2 text-gray-500"><?php echo $row['visits']?></dd>
          </div>
        </dl>
      </div>
    </div>
  </section>
</div>



 
 
   
   
   
   
   
   
   
   
   <!-- End Class Container -->
<?php
else:
     header('Location: /');
     
     endif;
?>


    
</body>

<?php 
//include ' ';
?>
</html>