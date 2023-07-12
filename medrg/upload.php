<?php
if($_FILES["file"]["name"] != '')
{
	$file = $_FILES['file']['tmp_name'];
	if($_FILES['file']['type']=='image/jpeg'){
		$source=imagecreatefromjpeg($file);
		$file_name=time().'.jpg';
		imagejpeg($source,'upload/'.$file_name,30);
	}elseif($_FILES['file']['type']=='image/png'){
		$source=imagecreatefrompng($file);
		$file_name=time().'.png';
		imagepng($source,'upload/'.$file_name,9);
	}elseif($_FILES['file']['type']=='image/gif'){
		$source=imagecreatefromgif($file);
		$file_name=time().'.gif';
		imagegif($source,'upload/'.$file_name,30);
	}else{
		echo "Please select only jpg, png and gif image";
	}
}
if(isset($file_name)){
	echo "<img id='newImg' style='width:200px; height:200px; object-fit: contain;' src='upload/$file_name'/>";
}


if (isset($_POST['medName'])) {
$db = mysqli_connect("localhost","ahmedahmed","+8duou3xOjXM","medicationz");
$db->set_charset('utf8');    
$medName   = $_POST['medName'];
$sqlinser  = "INSERT INTO drugs (name) VALUES ('$medName')";
if (mysqli_query($db, $sqlinser)) {
$last_id   = mysqli_insert_id($db);
echo "<br><a href='edit.php?id=".$last_id."' ><button class='btn btn-danger'>تعديل هذا الدواء الجديد</button></a><br>";
}
}




// IMAGE UPLOAD SCRIPT

if(isset($_POST["image_url"]))
{
 $message = '';
 $image = '';
 if(filter_var($_POST["image_url"], FILTER_VALIDATE_URL))
 {
  $allowed_extension = array("jpg", "png", "jpeg", "gif");
  $url_array = explode("/", $_POST["image_url"]);
  $image_name = end($url_array);
  $image_array = explode(".", $image_name);
  $extension = end($image_array);
  if(in_array($extension, $allowed_extension))
  {
   $image_data = file_get_contents($_POST["image_url"]);
   $new_image_path = "upload/" . rand() . "." . $extension;
   file_put_contents($new_image_path, $image_data);
   $message = 'Image Uploaded';
   $image = '<img id="uploadedFromUrlImg" src="'.$new_image_path.'" class="img-responsive img-thumbnail"  />';
  }
  else
  {
   $message = "Image not found";
  }
 }
 else
 {
  $message = 'Invalid Url';
 }
 $output = array(
  'message' => $message,
  'image'  => $image
 );
 echo json_encode($output);
}


?>


