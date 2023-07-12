<?php
session_start();
include '.../menu.php';
include '.../conn.php';
$id   = $_GET['id'];
if ( is_numeric($id) && ($_SESSION['usergroup'] == 2) || ( $_COOKIE['UGROUP'] == 2 ) ){

$sql  = mysqli_query($db,"SELECT * FROM books WHERE id = $id");
$data = mysqli_fetch_assoc($sql);
}else{
header('Location: /');
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="noindex" />
<title>تعديل بيانات دواء</title>
</head>

<?php
if (isset($_POST['name'])) {
$sql      = "UPDATE books SET 
  name         = '{$_POST['name']}',
arabic       = '{$_POST['arabic']}',
link        = '{$_POST['link']}', 
pages       = '{$_POST['pages']}',
size         = '{$_POST['size']}',
category     = '{$_POST['category']}',
description  = '{$_POST['description']}', 
keywords     = '{$_POST['keywords']}', 
img          = '{$_POST['img']}',
language      = '{$_POST['language']}' 
WHERE id=".$id;
mysqli_query($db,$sql);
exit();
}

?>


<div id="responsDiv"></div>
<div class="formcontainer center-block text-center"><br>
<a href="/book.php?id=<?php echo $data['id'] ?>" ><button class="btn btn-primary">Medication Page</button></a>
<button class="btn btn-success input-lg center-block update_btn">Update Medication Data</button>
<hr>
<a target="_blank" href="https://www.google.com/search?tbm=isch&q=<?php echo $data['name'];?>">
<button style='font-size:15px' class='btn btn-primary lg'>
اضغط هنا لعرض صور الدواء من جوجل صور
</button></a>
<hr>
<a href="https://dlildwa.com/medrg/editbook.php?id=<?php echo ($id+1); ?>" ><button class="btn btn-primary">Go Edit Next</button></a>
<a href="https://dlildwa.com/medrg/editbook.php?id=<?php echo ($id-1); ?>" ><button class="btn btn-primary">Go Edit Back</button></a>

<div align="center">
<?php echo $data['visits'] ?>
Views
</div>

<div>
<div style="margin:5px auto; text-align:center" id="uploaded_image"><img width="150" height="150" src="<?php echo $data['img'];?>" /></div>
<input class="form-control lg" type="file" name="file" id="file" />
<input class="form-control lg" id="img" value="<?php echo $data['img'] ;?>" placeholder='الصورة' />
</div>




<div style="background:#BE81F7;width:80%;margin:2px auto;padding:5px" align="center">
    Now You Can Upload Image From URL
       <div id="result"></div>
    <input type="text" name="image_url" id="image_url" class="form-control" placeholder="put valid img url here" style="text-align:left" />
  
    <input type="button" name="upload" id="upload" value="Upload IMG" class="btn btn-info" />
  
</div>
<hr>





<input dir="ltr" class="form-control" id="name" placeholder='Name En' type="text" value="<?php echo $data['name'] ?>" />
<input class="form-control" id="arabic" placeholder='الاسم بالعربي'  type="text" value="<?php echo $data['arabic'] ?>" />
<input class="form-control" id="link" placeholder='link' type="text"  value="<?php echo $data['link'] ?>" />
<input dir="ltr" class="form-control" id="pages" placeholder='pages Constit' type="text" value="<?php echo $data['pages'] ?>" />
<input class="form-control" id="size" placeholder='size' type="text"  value="<?php echo $data['size'] ?>" />
<textarea style="text-align:left" dir="ltr" class="form-control" id="category" placeholder='category' ><?php echo $data['category'] ?></textarea>
<textarea style="text-align" dir="rtl" class="form-control" id="description" placeholder='وصف الدواء' ><?php echo $data['description'] ?></textarea>
<input class="form-control" id="keywords" placeholder='keywords' type="text" value="<?php echo $data['keywords'] ?>" />
<input class="form-control" id="language" placeholder='language'   value="<?php echo $data['language'] ?>" />
<hr>
<div id="responsDiv"></div>
<button class="btn btn-success input-lg center-block update_btn">Update Medication Data</button>
<hr>

<a target="_blank" href="https://www.google.com/search?tbm=isch&q=<?php echo $data['name'];?>">
<button style='font-size:15px' class='btn btn-primary lg'>
اضغط هنا لعرض صور الدواء من جوجل صور
</button></a>


</div>
<hr>
<div align="center">
    
<a href="https://dlildwa.com/medrg/editbookbook.php?id=<?php echo ($id+1); ?>" ><button class="btn btn-primary">Go Edit Next</button></a>
<a href="https://dlildwa.com/medrg/editbookbook.php?id=<?php echo ($id-1); ?>" ><button class="btn btn-primary">Go Edit Back</button></a>
</div>
<hr>
<hr>
<p align="center" style="color:red">
    اضافة دواء جديد
</p>
<div align="center">
<input dir="ltr" class="form-control" id="medName" placeholder='الاسم انجليزي' type="text"  />
 <div id="responsinsert"></div>
 <br>
<button class="btn btn-success input-lg center-block addnewmed">Add New Medication</button>
</div>

<hr><hr>




<script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 3000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
     var imgSrc = document.getElementById('newImg').src;
     $('#img').val(imgSrc);
   //  $('#img').prop('readonly', true);
    }
   });
  }
 });
 

$(document).on('click', '.update_btn', function(){
$.ajax({
type: 'POST',
data: {
'name'    : $('#name').val(),
'arabic'      : $('#arabic').val(),
'link'       : $('#link').val(),
'pages'      : $('#pages').val(),
'size'        : $('#size').val(),         
'category' : $('#category').val(),
'description' : $('#description').val(),
'keywords'       : $('#keywords').val(),
'img'         : $('#img').val(),
'language'     : $('#language').val()
},success: function(response){
$('#responsDiv').html("<p id='innerP'>Data Updated Successfully </p>");
setTimeout(function(){ $('#innerP').fadeOut(); }, 2000);
}});		
});



$(document).on('click', '.addnewmed', function(){
$.ajax({
url:"upload.php",
method:"POST",
type: 'POST',
data: {
'medName'    : $('#medName').val(),
},success: function(response){
$('#responsinsert').html(response);
setTimeout(function(){ $('#innerP').fadeOut(); 
}, 2000);
}});		
});

// Upload image from external url SCRIPT

$('#upload').click(function(){
  var image_url = $('#image_url').val();
  if(image_url == '')
  {
   alert("Please enter image url");
   return false;
  }
  else
  {
   $('#upload').attr("disabled", "disabled");
   $.ajax({
    url:"upload.php",
    method:"POST",
    data:{image_url:image_url},
    dataType:"JSON",
    beforeSend:function(){
     $('#upload').val("Processing...");
    },
    success:function(data)
    {
     $('#image_url').val('');
     $('#upload').val('Upload');
     $('#upload').attr("disabled", false);
     $('#result').html(data.image);
     var imgSrcUrl = document.getElementById('uploadedFromUrlImg').src;
     $('#img').val(imgSrcUrl);
   // alert(data.message);

     setTimeout(function(){ $('#uploadedFromUrlImg').fadeOut(); }, 2000);

    }
   })
  }
 });
 
   
});
</script>
</html>