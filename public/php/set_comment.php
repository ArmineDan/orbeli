<?php 

require "con1.php";
mysqli_set_charset($con,"utf8");

$name = mysqli_real_escape_string($con, $_POST['name']);
$mail = mysqli_real_escape_string($con, $_POST['mail']);
$opinion = mysqli_real_escape_string($con, $_POST['opinion']);
$id = mysqli_real_escape_string($con, $_POST['id']);

$sql = "INSERT INTO comments(c_name,c_email,body,approved,lang_id,commentable_id,commentable_type) VALUES ('$name','$mail','$opinion',0,1,$id,'App\Post')";

if(mysqli_query($con, $sql)){
    echo "OK";
}else{
    echo "Sxal ".mysqli_error($con);
}

?>