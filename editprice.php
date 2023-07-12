<?php
session_start();
include 'menu.php';
$sql        = "SELECT * FROM searches ORDER BY date DESC LIMIT 200";
$sqli       = mysqli_query($db, $sql);
if(isset($_POST['reset'])){
$id = $_POST['id'];
$sqlreset = "DELETE FROM searches WHERE id='$id'";
mysqli_query($db,$sqlreset);
}
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

<?php
if (isset($_POST['drugName'])) {
$sql      = "UPDATE drugs SET 
name         = '{$_POST['drugName']}',
arabic       = '{$_POST['arabic']}',
price        = '{$_POST['price']}', 
lastupdated  = '{$_POST['lastupdated']}' 
WHERE id=".$id;
mysqli_query($db,$sql);
exit();
}

?>




<?php




$query = "SELECT * FROM drugs ORDER BY visits DESC LIMIT 500";

if(mysqli_query($db, $query)){
$i     = 0;
$sql   = mysqli_query($db, $query);
while ($rowactive = mysqli_fetch_assoc($sql)) {
    
$i++;


echo  "<tr><td>".$i."</td><td>".$rowactive['price']."</td></tr>";    





}
}
?>
</table>
</div>   
</div>

<input class="form-control" id="price" placeholder='Price' type="number" step="0.01" value="<?php echo $data['price'] ?>" />



















<hr>

<p dir="rtl" style="text-align:right">
    احصائيات كلمات البحث
</p>
<hr>
<table class="table table-striped table-bordered">
    <tr>
        <th>no</th>
        <th>ip</th>
        <th>words</th>
        <th>time</th>
        <th>DELETE</th>
    </tr>
<?php
$i =0;
    while ($row = mysqli_fetch_assoc($sqli)) {
$i++;
echo  "<tr><td>".$i."</td><td style='width:150px;word-break: break-word;word-break: break-all;'>".$row['ip']."</td><td class='terms'>".$row['term']."</td><td>".$row['date']."</td><td><button data-id='".$row['id']."' class='btn btn-danger reset'>DELETE</button></td></tr>";     
}
?>
</table>
</div>
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