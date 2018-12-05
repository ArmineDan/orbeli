<?php 

$servarname = 'localhost';
$user = 'user';
$password = '#1orbeli2018';
$db_name = 'orbeli_db';

$con = mysqli_connect($servarname,$user,$password,$db_name);

if(!$con){
    die("Sxal tvyalner ".mysqli_connect_error());
}else{
    //echo "a";
}

?>