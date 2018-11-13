<?php 

$servarname = 'localhost';
$user = 'root';
$password = '';
$db_name = 'sql6';

$con = mysqli_connect($servarname,$user,$password,$db_name);

if(!$con){
    die("Sxal tvyalner ".mysqli_connect_error());
}

?>