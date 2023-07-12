<?php
include 'conn.php';
include 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="index, follow" />
<title>
    قراءة هذه الروشتة
</title>
</head>
<body>
<div class="container">
<p align="center">
    قراءة وحل هذه الروشتة بالجدول اسفله
</p>
<table class="table table-bordered" style="direction:ltr">
<tr>
<th>م</th>
<th>الدواء</th>
<th>السعر</th>
<th>العلبة</th>
</tr>
<?php
$id     = $_GET['id'];
$rslt   = explode("-",$id);
$length = count($rslt);
for ($x = 0; $x <$length; $x++) {
$q      = mysqli_query($db, "SELECT * FROM drugs WHERE id=$rslt[$x]");
$row    = mysqli_fetch_assoc($q);
echo "<tr><td>".($x+1)."</td>"; 
echo "<td style='direction:ltr;text-align:left'>".ucfirst($row['name'])."</td>";
echo "<td>".$row['price']."</td>"; 
echo "<td><img height='100' width='100' style='object-fit: contain' src='".$row['img']."' /></td></tr>";
}
?>   
</table>
<hr>
<div align="center">
    <p>
        قم بكتابة اسم الدواء في صندوق البحث وعند ظهور الدواء المراد قم بالضغط عليه ليتم نقل رقمه التعريفي
        id
        الى الرابط ثم قم بكتابة الدواء الثاني و الثالث و الرابع حتى اخر دواء لديك
        <br>
        وبعد ان تقوم باضافة كل الادوية المطلوبة  قم بالنقر على الرابط المنشأ في الحقل العلوي ليتم نسخه الى الحافظة 
        <br>
        بعد ذلك قم بنشره في اي مكان
    </p>
<button class="btn btn-danger togg">
اظهار/اخفاء اداة تجهيز روشتة جديدة
</button>
</div>
<div class="containInputs" align="center">
<br>
<input id="txtarea" style="width:95%;text-align:left;direction:ltr" value='https://dlildwa.com/rx.php?id=' />
<br><br>
<input id="inputSearch" class="form-control input-lg" style="height:50px;text-align:left;direction:ltr" type="text"  autofocus />
<div id="responseDiv"></div>

</div>
<hr><hr>
<script>
document.getElementById("txtarea").onclick   = function() {
txtarea.value = txtarea.value.slice(0,-1);
this.select();
document.execCommand('copy');
};
$(document).ready(function(){
//$('.containInputs').hide();
$(document).on('keyup', '#inputSearch', function(){
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
$('#responseDiv').html("<table id='tblDrug' style='direction:ltr'></table>");
for(i=0;i<results.length;i++){
tblDrug.innerHTML += "<tr class='clickytd' data-id='"+results[i].id+"'><td>"+results[i].name.charAt(0).toUpperCase() + results[i].name.slice(1)+"</td></tr>"   
}
}
});		
}    
});

$(document).on('click', '.clickytd', function(){
console.log($(this).attr('data-id'));
$('#txtarea').val($('#txtarea').val()+$(this).attr('data-id') + "-");
$('#inputSearch').val("");
$('#responseDiv').html("<table id='tblDrug' style='direction:ltr'></table>");
});


$(document).on('click', '.togg', function(){
$('.containInputs').toggle();
});
});
</script>
</body>
<?php
include 'footer.php'; 
?>
</html>