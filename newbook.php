<?php
session_start();
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
<title>

رفع كتاب جديد

    </title>
<?php
include 'menu.php';
include 'conn.php';

if (isset($_POST['name'])){



  	$name         = $_POST['name'];
  	$arabic       = $_POST['arabic'];
  	$category     = $_POST['category'];
  	$description  = $_POST['description'];
  	$link         = $_POST['link'];
  	$img          = $_POST['img'];
  	$keywords     = $_POST['keywords'];
  	$language     = $_POST['language'];
  	$size         = $_POST['size'];
  	$pages        = $_POST['pages'];
  	$time         = $_POST['time'];
  	
           $sql = "INSERT INTO books (name,arabic,category,description,link,img,keywords,language,size,pages,time)  
                   VALUES  ('$name','$arabic','$category','$description','$link','$img','$keywords','$language','$size','$pages','$time')";
mysqli_query($db, $sql);
}


?>
</head>
<body>
    
    
    <?php
    
    if($_SESSION['usergroup'] == 2):
        
    ?>
    
<div style="text-align:center">
     <h4>
        رفع كتاب جديد
      </h4>
      <hr>
       <form id="regForm" class="login" dir="ltr">
   <input class="form-control input-lg" type="text"    id="name"     placeholder='book name' />
   <input class="form-control input-lg" type="text"    id="arabic"    placeholder='arabic name' />
   <input class="form-control input-lg" type="text"    id="category" placeholder='category' />
   <textarea rows="7" class="form-control input-lg"    id="description"  placeholder='description'></textarea>
   <input class="form-control input-lg" type="text"    id="link"    placeholder='download link' />
   <input class="form-control input-lg" type="text"    id="img"    placeholder='Image' />
   <input class="form-control input-lg" type="text"    id="keywords"   placeholder='keywords' />
   <input class="form-control input-lg" type="text"    id="language"    placeholder='language' />
   <input class="form-control input-lg" type="number"  id="size"    placeholder='Size' />
   <input class="form-control input-lg" type="number"  id="pages"    placeholder='Pages' />
   
   
   <input class="btn btn-primary input-lg" id="insert" type="button" style="width:60%;margin:5px auto" value=" Upload Book " />
</form>

 <div class="text-center bg-danger" id="message"></div>
 
 
 <?php
 endif;
 ?>
 
 
 <hr>

 <script>
  $(document).ready(function(){
      
   $("#insert").click(function(){
       var name         = $("#name").val();
       var arabic       = $("#arabic").val();
       var category     = $("#category").val();
       var description  = $("#description").val();
       var link         = $("#link").val();
       var img          = $("#img").val();
       var keywords     = $("#keywords").val();
       var language     = $("#language").val();
       var size         = $("#size").val();
       var pages        = $("#pages").val();
       
	$.ajax({
      url: '',
      type: 'POST',
      data: {
        'name'        : name,
        'arabic'      : arabic,
        'category'    : category,
        'description' : description,
        'link'        : link,
        'img'         : img,
        'keywords'    : keywords,
        'language'    : language,
        'size'        : size,
        'pages'       : pages,
        'time'      : new Date().toLocaleString()
      },
      success: function(response){
          
           $("#message").html("تم رفع الكتاب بنجاح, شكرا لك");
           setTimeout(function(){ $('#message').fadeout; }, 2000);
      }
  	});
  	
   });
  });
</script> 
<style>

.login{
    width:90%;
    margin: 10px auto;
    text-align:center;
}
    .featuredItemPage {
    width: 90%;
    margin:10px auto;
    background: #fff;
    padding: 10px;
    text-align: right;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 0 4px 1px rgb(0 0 0 / 33%);
}
.orderImg{
    width:60px;
    height:60px;
    border-radius:50%;
}

</style>
</body>
</html>