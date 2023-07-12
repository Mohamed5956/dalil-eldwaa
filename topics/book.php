<?php
$id     = $_GET['id'];
if(is_numeric($id)):
include '../conn.php';
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
include '../menu.php';
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
</div>




<p style="font-size:25px;color:red;font-weight:bold;text-align:center">
 <br>
<?php echo $row['arabic'] ; ?>
<br>
اضغط الزر اسفله
</p>
<br>
<div align="center">

55555555555555555
  <br>
    <br>
</div>
<div align="center">

5555555555555555555
  <br>
</div>

      
<form action="/d/" method="POST" align="center">
 <input type="hidden" name="name" value="<?php echo $row['name']?>"/>
 <input type="hidden" name="link" value="<?php echo $row['link']?>"/>
 <input type="hidden" name="img"  value="<?php echo $row['img']?>"/>
 <input class="btn btn-primary" style="font-size: 0.7rem;" value="توجه للموضوع " type="submit">
</form>




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
  

<div align="center">
<img src="<?php echo $row['img']; ?>" style="width:400px; height:400px; object-fit: contain; border-radius:10px;">
</div>



<hr>
<div class="container" style="text-align:right">
<div class="about" style="font-size:18px">
<?php echo $row['description']; ?>
</div>  
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



  
  
  
  
  
   <div>
       <p>
        اللغة
       </p>
       <span>
          <?php echo $row['language']; ?>
       </span>
   </div>
   <hr>
   
    <div>
       <p>
         مشاهدات
       </p>
       <span>
         <?php echo $row['visits']; ?>
       </span>
       مرة 
   </div>
 
 <hr>
 
   
   <div>
       <p>
    مرات التحميل
       </p>
       <span>
         <?php echo $row['visits']; ?>
       </span>
       مرة 
   </div>
 
 <hr>
 
  <div>
       <p>
          حجم / مساحة الملف بالميجابايت
       </p>
       <span>
         <?php echo $row['size'] . " MB " ; ?>
       </span>
      
   </div>
 
 <hr>
 
  <div>
       <p>
    عدد صفحاته
       </p>
       <span>
         <?php echo $row['pages']; ?>
       </span>
   </div>
 <hr>
 <div>
    <h2>
       كلمات دلالية
   </h2> 
   <p>
    <?php echo $row['keywords']; ?>
   </p>
  </div>
   
    
    
    
   </div> 
    
    <hr>
    
  <div style="text-align:center;width:90%;margin:10px auto; padding:5px;border:1px solid black">
     
         
         <a href="contact.php">
             
               اتصل بنا -
              contact us
         </a>

      </p>
      
</div>
   
    
    
   
   
   </div>
   <!-- End Class Container -->
<?php
else:
     header('Location: /');
     
     endif;
?>


    
</body>

<?php 
include '../footer.php'; 
?>
</html>