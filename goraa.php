<?php
include 'menu.php';
include 'conn.php';
$id   = $_GET['id'];
if ( is_numeric($id) && ($_SESSION['usergroup'] == 2) || ( $_COOKIE['UGROUP'] == 2 ) ){

$sql  = mysqli_query($db,"SELECT * FROM drugs WHERE id = $id");
$data = mysqli_fetch_assoc($sql);
}else{
header('Location: /');
exit();
}
?>


<?php
if (isset($_POST['drugName'])) {
$sql      = "UPDATE drugs SET 
name         = '{$_POST['drugName']}',
arabic       = '{$_POST['arabic']}',
price        = '{$_POST['price']}', 
active       = '{$_POST['active']}',
dose         = '{$_POST['dose']}',
description  = '{$_POST['description']}', 
lastupdated  = '{$_POST['lastupdated']}' 
WHERE id=".$id;
mysqli_query($db,$sql);
exit();
}

?>


<div style="background: #81F7D8;text-align:center">
<?php
$sqlupdatedtotal = mysqli_query($db, "SELECT * FROM drugs WHERE dose != ''");
echo "<p>عدد الأدوية التي تم تحديثها حتى الآن</p><p class='boldme'>";
echo mysqli_num_rows($sqlupdatedtotal) . "</p> من إجمالي 17247 دواء";
?>
</div>
<div id="responsDiv"></div>
<div align="center"><a href="/drg.php?id=<?php echo $data['id'] ?>" ><button class="btn btn-primary">Medication Page</button></a>
<p>ID رقم  <?php echo $data['id'] ?></p>
</div>
<div>
    
   <input dir="ltr" class="form-control" id="drugName" placeholder='Name En' type="text" value="<?php echo $data['name'] ?>" />
<input class="form-control" id="arabic" placeholder='الاسم بالعربي'  type="text" value="<?php echo $data['arabic'] ?>" />
<input class="form-control" id="price" placeholder='Price' type="number" step="0.01" value="<?php echo $data['price'] ?>" />
<input dir="ltr" class="form-control" id="active" placeholder='Active Constit' type="text" value="<?php echo $data['active'] ?>" /> 
    <textarea style="text-align" dir="rtl" class="form-control" id="description" placeholder='وصف الدواء' ><?php echo $data['description'] ?></textarea>
 <textarea style="text-align" dir="rtl" class="form-control" id="dose" placeholder='الجرعة' ><?php echo $data['dose'] ?></textarea>

<hr>

</div>

<div align="center">
    
<a href="https://dlildwa.com/goraa.php?id=<?php echo ($id+1); ?>" ><button class="btn btn-primary">الدواء التالي</button></a>

<button class="btn btn-success input-lg center-block update_btn" style='text-align:center;'>Update Medication Data</button>
<a href="https://dlildwa.com/goraa.php?id=<?php echo ($id-1); ?>" ><button class="btn btn-primary">الدواء السابق</button></a>
</div>


<script>



$(document).on('click', '.update_btn', function(){
$.ajax({
type: 'POST',
data: {
'drugName'    : $('#drugName').val(),
'arabic'      : $('#arabic').val(),
'price'       : $('#price').val(),
'active'      : $('#active').val(),
'dose'      : $('#dose').val(),
'description' : $('#description').val(),
'lastupdated' : new Date().toLocaleString()
},success: function(response){
$('#responsDiv').html("<p id='innerP'>تم التحديث بنجاح د/خالد شكرا لك </p>");
setTimeout(function(){ $('#innerP').fadeOut(); }, 2000);
}});		
});





</script>


<style>
    
    .boldme{
        
        font-weight:bold;
    }
</style>

