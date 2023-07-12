<?php
session_start();
include 'menu.php';
include 'conn.php';
?>
<!DOCTYPE html>
<html dir="rtl" style="text-align:right">
<head>
<title>
احصائيات
</title>
<meta name="description" content="دليل الدواء الجديد , معلومات واستعمالات واسعار الادوية وتركيباتها والبدائل بسهولة ونتائج موثوقة">
<link rel="canonical" href="https://dlildwa.com/" />
<meta property="og:title" content="دليل الدواء الجديد">
<meta property="og:description" content="اسعار ومعلومات استعمال وبدائل الادوية من دليل الدواء الجديد">
<meta property="og:url" content="https://dlildwa.com/">
<meta property="og:image" content="https://www.dlildwa.com/fav.png" />
</head>


<?php
if (isset($_POST['medId'])) {
$medId        = $_POST['medId'];
$pr           = $_POST['price'];
$lastupdated  = $_POST['lastupdated'];
$sql          = "UPDATE drugs SET price  = '$pr' , lastupdated  = '$lastupdated' WHERE id = '$medId'";
mysqli_query($db,$sql);
exit();
}
?>


<body>
<div class="container">
<div style="text-align:right;margin:10px">
<p>
عدد الأدوية التي تم تحديثها حتى الآن من خلال وجود الاسم باللغة العربية
</p>
<div style="background: #81F7D8">
<?php
$sqlupdatedtotal = mysqli_query($db, "SELECT * FROM drugs WHERE arabic != ''");
echo "<p>عدد الأدوية التي تم تحديثها حتى الآن</p>";
echo mysqli_num_rows($sqlupdatedtotal) . "<br> من إجمالي 17247 دواء";
?>
</div>
</div>
<hr>
<div class="text-center">
<p>
أكثر الأدوية بحثا عن أسعارها
</p>
<div id="responsDiv"></div>
<table id="topVtbl" class="table table-striped table-bordered">
<tr><th>م</th><th>الدواء</th><th>السعر</th><th>مشاهدات</th><th>السعر</th><th>EDIT</th></tr>
<?php
$query = "SELECT * FROM drugs where id Between 18000 AND 25000 ORDER BY visits DESC LIMIT 200
";
if(mysqli_query($db, $query)){
$i     = 0;
$sql   = mysqli_query($db, $query);
while ($rowactive = mysqli_fetch_assoc($sql)) {
$i++;
echo  "<tr><td>".$i."</td><td style='text-align:right;direction:ltr'><a href='drg.php?id=".$rowactive['id']."'>";
echo "<img  src='" . $rowactive['route'] .".png". "' height='50' width='68' style='object-fit:contain'  >";
   if($rowactive['arabic'] != ""){echo $rowactive['arabic'];}else{echo $rowactive['name'];}
echo "</a></td><td>".$rowactive['price']." جنيهاً </td><td>".$rowactive['visits']." مرةً </td>";
echo "<td>
<input class='formm-control pricee'  type='text' value='".$rowactive['price'].
"' />"."<td><button class='btn btn-success update_btn' data-id='".$rowactive['id']."'> Update </button><div class='responsDiv_".$rowactive['id']."'></div></td>"."</tr>";
}
}
?>
</table>
</div>   
</div>

<script>
$(document).on('click', '.update_btn', function(){
var classR = $(this).attr('data-id');
$.ajax({
type: 'POST',
data: {
'medId'          : $(this).attr('data-id'),
'price'          : $(this).parent().parent().find('.pricee').val(),
'lastupdated' : new Date().toLocaleString()
},success: function(){
$(".responsDiv_"+classR).html("<p class='innerPar' style='background:green;color:#fff;text-align:center;padding:2px;margin:7px auto'> Success </p>");
setTimeout(function(){ $('.innerPar').fadeOut(); }, 1000);
}

});


});
</script>

<script>
var terms = document.getElementsByClassName("terms"); 
for(k=0;k<terms.length;k++){
var array =  terms[k].innerHTML.split(",");
let sentence = array.join(",");
var result = [];
for (i = 0; i < array.length; i++) {
var nn = sentence.substr((sentence.indexOf(array[i]) + array[i].length), ).indexOf(array[i]);
if (nn == -1 ){
result.push(array[i]);
}
}
let longestWord = sentence.split(",").reduce((l, c) => (c.length > l.length ? c : l));
terms[k].innerHTML = longestWord + "<br>" + result.join("<br>") ;
}
$(document).on('click', '.reset', function(){
     $.ajax({
      type : 'POST',
      data : {
      	'reset' : 1,
      	'id' : $(this).attr('data-id')
       }
});	
    
});
</script>
<style>
    .terms{
        width:150px;
        word-break: break-word;
        word-break: break-all;
    }
</style>
<?php 
include 'footer.php'; 
?>
</body>
</html>