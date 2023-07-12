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
<link href="tailwindcss/output.css" rel="stylesheet">


   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    
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
$sql          = "UPDATE drugs SET pricenw  = '$pr' , lastupdated  = '$lastupdated' WHERE id = '$medId'";
mysqli_query($db,$sql);
exit();
}
?>


<body>
<div class="container">


<p>
    عدد الاوردرات الاجمالي لكل الادوية:
    
</p>
    
<?php

$qrr             = mysqli_query($db, "SELECT * FROM global WHERE id = '1'");
$rowrr           = mysqli_fetch_assoc($qrr);


echo $rowrr['btnCount'] . "<br>";



?>



<p>
الادوية مرتبة حسب الاكثر طلبا    
</p>


<table class="table table-striped table-bordered" style="direction:ltr">
<tr><th>no.</th><th>name</th><th>price</th><th>date</th></tr>
<?php
$qsim   = mysqli_query($db, "SELECT * FROM orders ORDER BY id DESC LIMIT 50");
$x = 0;
while ($rowsim = mysqli_fetch_assoc($qsim)) {
$x++;	    
echo "<tr><td>".$x."</td><td>".$rowsim['name']."</td><td>".$rowsim['price']."</td><td>".$rowsim['date']."</td></tr>";
}
?>


</table>

<hr>
<p>
    جدول طلبات الادوية حسب اليوم
</p>



<table class="table table-striped table-bordered" style="direction:ltr">
<tr><th>day</th><th>number of orders</th><th>SUM</th></tr>




<?php

$dateS = date( "Y/m/d");
for($x=0;$x<7;$x++){
    
$Rdate =  date( "Y/m/d", strtotime( $dateS . "-$x day"));

$qo             = mysqli_query($db, "SELECT SUM(price) AS sumprice FROM orders WHERE date = '$Rdate' ");
$rowo           = mysqli_fetch_assoc($qo);

echo "<tr><td>".$Rdate."</td><td>". mysqli_num_rows(mysqli_query($db,"SELECT * FROM orders WHERE date = '$Rdate'"))."</td><td>".round($rowo['sumprice'], 2)."</td></tr>";


}
?>


</table>
    

    
  
<div style="text-align:right;margin:10px">
<p>
عدد الأدوية التي تم تحديثها حتى الآن من خلال وجود الاسم باللغة العربية
</p>





<div style="background: #81F7D8">




<?php




$sqlupdatedtotal = mysqli_query($db, "SELECT * FROM drugs WHERE pricenw = '' AND id BETWEEN 0 AND 20000");
echo "<p>عدد الأدوية التي تم تحديثها حتى الآن</p>";
echo mysqli_num_rows($sqlupdatedtotal) . "<br> من إجمالي
14996
17247 دواء";
?>
</div>
</div>
<hr>
























<div class="flex items-center justify-between h-16 px-4">
     

      <!-- search box -->

      <div class="w-72">
        <!-- search example -->

        <div class="relative">
          <input id="inputSearch" type="search" value="" class="w-full rounded-lg border border-gray-200" autocomplete="off" placeholder="Search" />

          <!-- search result -->
		  
		  
		  
		  
		  <div id='responseDiv__' class='max-h-48 mb-40'></div>
		  
		  
          <!-- end search result -->
        </div>

        <!-- end search example -->
      </div>

      <!-- end search box -->

      
    </div>
    
    
    
    
<table id="topVtbl" style='margin-top: 12rem;'class="table mt-40 table-striped table-bordered">
<tr><th>م</th><th>الدواء</th><th>السعر</th></tr>
<?php
$query = "SELECT * FROM drugs WHERE pricenw ='' ORDER BY id  ASC LIMIT 5";
if(mysqli_query($db, $query)){
$i     = 0;
$sql   = mysqli_query($db, $query);
while ($rowactive = mysqli_fetch_assoc($sql)) {
$i++;
echo  "<tr><td>".$i."</td><td style='text-align:right;direction:ltr'>";
echo $rowactive['name'];
echo "</td><td>
<input id='priee' class='p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent pricee'  type='text' value='".$rowactive['price'].
"' /> <button class='text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600  update_btn' data-id='".$rowactive['id']."'> Update </button><div class='responsDiv_".$rowactive['id']."'></div>"."";
echo "<button class='text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 close_btn' data-id='".$rowactive['id']."'> Close </button></td></tr>";
}
}
?>
</table>
</div>   







<script>
$(document).on('click', '.close_btn', function(){
var classR = $(this).attr('data-id');
var self = $(this);
$.ajax({
type: 'POST',
data: {
'medId' : classR,
'price' : 1,
'lastupdated' : new Date().toLocaleString()
},success: function(){
self.closest('tr').remove();
}});
});
    
    

$(document).on('click', '.update_btn', function(){
var classR = $(this).attr('data-id');
var self = $(this);
$.ajax({
type: 'POST',
data: {
'medId'          : $(this).attr('data-id'),
'price'          : $(this).parent().parent().find('.pricee').val(),
'lastupdated' : new Date().toLocaleString()
},success: function()

{
$(".responsDiv_"+classR).html("<p class='innerPar' style='background:green;color:#fff;text-align:center;padding:2px;margin:7px auto'> Success </p>");
setTimeout(function(){ $('.innerPar').fadeOut(); }, 1000);
self.closest('tr').remove();

}

});


});
</script>

<script>
   
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
var searchm   = $('#inputSearch').val();
  	$.ajax({
  	  url:'server.php',
      type: 'POST',
      data: {
      	'searc' : 1,
      	'searchm': searchm,
      },
      success: function(response){
        var results = JSON.parse(response);  
      $('#responseDiv__').html("<div id='tbDrug'  class='absolute z-10 w-full border rounded-lg shadow divide-y max-h-72 overflow-y-auto bg-white mb-40 mt-20'></div>");
     for(i=0;i<results.length;i++){
      tbDrug.innerHTML += 
      "<a class='block p-2 hover:bg-indigo-50' href='#'> <b>"+results[i].pricem+"</b>--"+results[i].namem.charAt(0).toUpperCase() + results[i].namem.slice(1)+
      "</a>"     

       } 
	   
	   $("#tbDrug li").click(function(){
    let price = $(this).find("b").text();
    navigator.clipboard.writeText(price).then(() => {
      console.log('Price copied to clipboard');
    }).catch(err => {
      console.log('Failed to copy price: ', err);
    });
   });
	   
	   
	   
	   
      }

  	});		
  	
   }else{
       $('#responseDiv__').html("");
   }
  });

});

 $("#priee").click(function() {
    $(this).select();
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

</body>
</html>