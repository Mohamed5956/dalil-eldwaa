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
<title>
دليل الدواء 
</title>
<meta name="description" content="دليل الدواء , معلومات واستعمالات واسعار الادوية وتركيباتها والبدائل بسهولة ونتائج موثوقة">
<meta name="robots" content="index, follow" />
<link rel="canonical" href="https://dlildwa.com/" />
<meta property="og:title" content="دليل الدواء ">
<meta property="og:description" content="اسعار ومعلومات استعمال وبدائل الادوية من دليل الدواء ">
<meta property="og:url" content="https://dlildwa.com/">
<meta property="og:image" content="https://i.imgur.com/qIgVXpg.png" />

<?php
    $qnum   = mysqli_query($db, "SELECT COUNT(*) as total FROM drugs ");
    
    $num=mysqli_fetch_assoc($qnum);
    
    ?>
</head>
    
<br>
<p align="center">
    موقع دليل الدواء: عبارة عن محرك بحث للأدوية المصرية وكل المعلومات المتعلقة بها من أسعار، بدائل، إستعمالات، تركيبات ومواد فعالة في أكبر موقع يحتوي على 25 ألف صنف دوائي متوفر في السوق المصري والوطن العربي.
</p>


<div align="center">
      
    
<br>
<a target="_blank" href="https://dlildwa.com/book.php?id=9">
<button class="appclick" style="background:#00aecd;font-family:arial;padding:10px 20px;margin:5px;border:0;border-radius:10px;color:#fff;font-size:21px;font-weight:bold;box-shadow: 0 0 6px 1px rgb(0 0 0 / 23%);">
تطبيق دليل أسعار وبدائل الأدوية للموبايل
<br>
يعمل بدون انترنت
<br>
للتحميل اضغط هنا 
</button>
</a>
</div>


<br>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7891698547800920"
     crossorigin="anonymous"></script>
<!-- home-page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7891698547800920"
     data-ad-slot="2796818729"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<br>








  <div class="container mx-auto px-4"> 


 <form>   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
    <div class="relative">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="search" id="inputSearch" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="اكتب اسم االدواء الذي تود البحث عنه" required>
        
    </div>
</form>

<div id="responseDiv" class=" mb-4 bg-gray-50 rounded-lg border border-gray-100 ">
</div>
</div>








<div align="center" class="container">




     
     

  <div align="center">
      Advertisement
     <br>
     


  </div> 





<div class="text-center">
<p>
أكثر الأدوية بحثا عن أسعارها
</p>

<table id="topVtbl" class="bg-white rounded-lg overflow-hidden text-center border-separate">
  <thead class="bg-gray-200">
    <tr>
      <th class="px-4 py-2">م</th>
      <th class="px-4 py-2">الدواء</th>
      <th class="px-4 py-2">السعر</th>
      <th class="px-4 py-2">مشاهدات</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM drugs ORDER BY visits DESC LIMIT 100";
    if(mysqli_query($db, $query)){
    $i     = 0;
    $sql   = mysqli_query($db, $query);
    while ($rowactive = mysqli_fetch_assoc($sql)) {
    $i++;
    echo  "<tr class='odd:bg-gray-100'><td class='px-4 py-2'>".$i."</td><td class='px-4 py-2'><a href='drg.php?id=".$rowactive['id']."' dir='ltr'>";
    if($rowactive['arabic'] != ""){echo $rowactive['arabic'];}else{echo $rowactive['name'];}
    echo "</a></td><td class='px-4 py-2'>".$rowactive['price']." جنيهاً </td><td class='px-4 py-2'>".$rowactive['visits']." مرةً </td></tr>";     
    }
    }
    ?>
  </tbody>
</table>
</div>   
</div>
<div class='shareButtons' style="border:1px solid black; border-radius:5px;width:75%;margin:5px auto;background:#FBFBEF">
<h4>
مشاركة دليل الدواء الجديد مع اصدقائك
</h4>
<a href='' id='fbLink' target='_blank'> <i class="fab fa-facebook"></i></a>
<a href='' id='waLink' target='_blank'><i class='fab fa-whatsapp'></i></a>
<a href='' id='twLink' target='_blank'><i class='fab fa-twitter'></i></a>
</div>

<div style="visibility:hidden;height:200px;">
    
    <img height="150" width="300" src="https://i.imgur.com/y6LOusj.png" />
    
</div>

<script>
   document.getElementById("fbLink").href = "https://www.facebook.com/sharer/sharer.php?u="+ window.location.href;
   document.getElementById("waLink").href = "whatsapp://send?text="+ window.location.href.replace(" ","+");
   document.getElementById("twLink").href = "https://twitter.com/share?url="+ window.location.href;
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
      "<tr><td><a class='track' href='" + "<?php if((isset( $_SESSION['email']) && $_SESSION['usergroup'] == 3)){echo "/medrg/edit";}else{echo "drg";}?>" + ".php?id="+results[i].id+"' target='_blank'>"+
      "<span  style='font-size:18px;font-weight:bold;color:#0404B4'>"+results[i].name.charAt(0).toUpperCase() + results[i].name.slice(1)+"</span><br>"+
      "<span  style='font-size:15px;color:#000'>"+results[i].arabic+"</span><br>"+
      "<span style='font-size:11px'>"+results[i].id+ "|"  +results[i].visits   + "V|" +results[i].active.slice(0,15)+ ".. - ..</span></a></td>"+
      "<td style='width:20%'><a href='/drg.php?id="+results[i].id+"'><span style='font-size:20px;font-weight:bold;color:#FF0000'>"+results[i].price+"</span> L.E.</a></td></tr>"   

       } 
      }

  	});		
  	
   }else{
       $('#responseDiv').html("");
   }
  });

});
</script>

<?php 
include 'footer.php'; 
?>
</html>