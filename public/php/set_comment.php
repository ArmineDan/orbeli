<?php 

require "con1.php";
mysqli_set_charset($con,"utf8");

$name = mysqli_real_escape_string($con, $_POST['name']);
$mail = mysqli_real_escape_string($con, $_POST['mail']);
$opinion = mysqli_real_escape_string($con, $_POST['opinion']);
$id = mysqli_real_escape_string($con, $_POST['id']);
$type = mysqli_real_escape_string($con, $_POST['type']);
$lng = mysqli_real_escape_string($con, $_POST['lang']);
   if($lng=='en'){
	$ln=1;
}
else{
			if($type=='ru'){
				$ln=2;
			}
			else{
				$ln=3;
					}
	}
	
if($type=='post'){
	$tp='App/Post';
}
elseif($type=='video'){
	$tp='App/Video';
}
elseif($type=='news'){
	$tp='App/News';
}
elseif($type=='opinion'){
	$tp='App/Opinion';
	}
	elseif($type=='announcement'){
	$tp='App/Announcement';
}



$sql = "INSERT INTO comments(c_name,c_email,body,approved,lang_id,commentable_id,commentable_type) VALUES ('$name','$mail','$opinion',0,'$ln','$id','$tp')";

if(mysqli_query($con, $sql)){
    echo "OK";
}else{
    echo "Sxal ".mysqli_error($con);
}

?>