<?php 

require "con1.php";
mysqli_set_charset($con,"utf8");

$mail = mysqli_real_escape_string($con, $_POST['mail']);
/*$checkmail = filter_var($mail, FILTER_VALIDATE_EMAIL);

var_dump($checkmail);
die; 

if(!$checkmail)
{
	echo "Please, insert correct emial address"; 	
}*/

$name = mysqli_real_escape_string($con, $_POST['name']);
$opinion = mysqli_real_escape_string($con, $_POST['opinion']);
$id = mysqli_real_escape_string($con, $_POST['id']);
$type = mysqli_real_escape_string($con, $_POST['type']);
// $type = $_POST['type'];
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
	$tp=quotemeta("App\Post");
}
elseif($type=='video'){
	$tp=quotemeta('App\Video');
}
elseif($type=='news'){
	$tp=quotemeta('App\News');
}
elseif($type=='opinion'){
	$tp=quotemeta('App\Opinion');
}
elseif($type=='announcement'){
	$tp=quotemeta('App\Announcement');
}



$sql = "INSERT INTO comments(c_name,c_email,body,approved,lang_id,commentable_id,commentable_type) VALUES ('$name','$mail','$opinion',0,'$ln','$id','$tp')";

if(mysqli_query($con, $sql)){
    echo "OK";
}else{
    echo "Sxal ".mysqli_error($con);
}

?>