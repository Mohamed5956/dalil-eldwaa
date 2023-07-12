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
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
$sql          = "UPDATE drugs SET pricem  = '$pr' , lastupdated  = '$lastupdated' WHERE id = '$medId'";
mysqli_query($db,$sql);
exit();
}
?>


<body>
<div class="container">

<div class="searchHome" dir="ltr" style="margin:20px auto;">
<input id="inputSearch" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded input-lg" style="height:50px" type="text"  placeholder="اكتب اسم الدواء بالانجليزية.." autofocus  />

<div id="responseDiv"></div>
</div>

<div style="text-align:right;margin:10px">

<div style="background: #81F7D8">
</div>
</div>
<hr>
<div class="text-center">

<p id="responsDiv"></p>
<table id="topVtbl" class="table table-striped table-bordered">
<tr>
<th>الدواء</th>


<th>السعر</th>
<th>EDIT</th></tr>
<?php


$query = "SELECT * FROM drugs    LIMIT 10";
if(mysqli_query($db, $query)){
$i     = 0;
$sql   = mysqli_query($db, $query);

while ($rowactive = mysqli_fetch_assoc($sql)) {

$i++;
echo  "<tr class='btrow_".$rowactive['id']."'><td style='text-align:right;direction:ltr'><a href='drg.php?id=".$rowactive['id']."'>";
echo $rowactive['name'];
echo "<td>
<input class='formm-control pricee' style='max-width: 3rem;' type='text' value='".$rowactive['pricen'].
"' />"."<td><button class='inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600 lg update_btn btm_".$rowactive['id']."' data-id='".$rowactive['id']."'> Update</button></td>"."</tr>";
}
}
?>
</table>
<div style="text-align:center;margin:10px">
 <?php
$sqlupdatedtotal = mysqli_query($db, "SELECT * FROM drugs WHERE pricem != ''");
echo "<p>عدد الأدوية التي تم تحديثها حتى الآن</p>";
echo mysqli_num_rows($sqlupdatedtotal);
?>
</div>
<a href='/statme.php'>
<button style='font-size:20px' class='inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600 lg'>
اللي بعده
</button></a>
</div>   
</div>

<script>
$(document).ready(function(){
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
     $('#responseDiv').html("<table id='tblDrug'></table>");
     for(i=0;i<results.length;i++){
      tblDrug.innerHTML += 
      "<tr><td><a class='track' href='" + "<?php echo "/medrg/edit";?>" + ".php?id="+results[i].id+"' target='_blank'>"+
      "<span  style='font-size:18px;font-weight:bold;color:#0404B4'>"+results[i].name.charAt(0).toUpperCase() + results[i].name.slice(1)+"</span><br>"+
      
"<td><input class='formm-control pricee'  type='text' value='"+results[i].price+
"' />"+"<td><button class='btn inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600 lg update_btn' data-id='"+results[i].id+
"'> Update <p class='responsDiv_"+results[i].id+"'></p></button></td>"+
      "<span style='font-size:11px'>"+results[i].id+ "|"  +results[i].visits   + "V|" +results[i].active.slice(0,15)+ ".. - ..</span></a></td>"+
      "<td style='width:20%'><a href='/goraa.php?id="+results[i].id+"'><span style='font-size:20px;font-weight:bold;color:#FF0000'>"+results[i].price+"</span> L.E.</a></td></tr>"   

       } 
      }

  	});		
  	
   }else{
       $('#responseDiv').html("");
   }
  });

});






$(document).on('click', '.update_btn', function(){
var classR = $(this).attr('data-id');
$.ajax({
type: 'POST',
data: {
'medId'          : $(this).attr('data-id'),
'price'          : $(this).parent().parent().find('.pricee').val(),
'lastupdated' : new Date().toLocaleString()
},success: function(){

setTimeout(function(){ $('.btrow_'+classR).fadeOut(); }, 1);
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

</body>
</html>