<?php
include 'conn.php';
if (isset($_POST['search'])) {
   $searchq    = $_POST['searchq'];
   $splitted   = explode(" ", $searchq);
   if(count($splitted) < 2){
	$q1 = mysqli_query($db, "SELECT * FROM drugs
	                                          WHERE
	                                          ( name LIKE  '$searchq%'
	                                           OR
	                                           arabic LIKE '$searchq%'
	                                           
	                                           
	                                           OR
	                                           id LIKE '$searchq')
	                                          ORDER BY name ASC
	                                            LIMIT 100");
	$data1 = array();
	while ($row1 = mysqli_fetch_assoc($q1)) {
		$data1[] = $row1;
	}
	print  json_encode($data1, JSON_UNESCAPED_UNICODE);
   }else {
   $st = strlen($splitted[0])+1;
    $q = mysqli_query($db, "SELECT * FROM drugs 
                                                    WHERE
                                                    (name  LIKE  '$splitted[0]%'
                                                    AND
                                                    SUBSTRING(name, (POSITION('$splitted[0]' IN name)+$st), LENGTH(name))  LIKE  '%$splitted[1]%')
                                                    OR
                                                    (name  LIKE  '$splitted[0]%'
                                                    AND
                                                    SUBSTRING(name, (POSITION('$splitted[0]' IN name)+$st), LENGTH(name))  LIKE  '%$splitted[1]%')
                                                    OR
                                                    (arabic LIKE '$searchq%')
                                                    ORDER BY name ASC
                                                    LIMIT 150");
	$data = array();
	while ($row = mysqli_fetch_assoc($q)) {
		$data[] = $row;
	}
	print  json_encode($data, JSON_UNESCAPED_UNICODE);
   }
   }
  
if (isset($_POST['searchterm'])) {
$searchterm = $_POST['searchterm'];
$ip         =   $_POST['ip'];
$new_time = date("Y-m-d H:i:s", strtotime('+2 hours')); 
    
$sqlGetIp   = "SELECT * FROM searches WHERE ip ='$ip'";
$sqli       = mysqli_query($db, $sqlGetIp);
$rowcount   = mysqli_num_rows($sqli);
if($rowcount > 0 ){
$sqlupdate = "UPDATE searches SET term = CONCAT(term, ',', '$searchterm'), date = '$new_time' WHERE ip='$ip'";
mysqli_query($db, $sqlupdate);
}else{
$sql = "INSERT INTO searches (term,ip,date)  VALUES  ('$searchterm','$ip','$new_time')";
mysqli_query($db, $sql);
}
}  
 ?>