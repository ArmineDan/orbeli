
<?php 
$serverianun = 'localhost';
$ogtagorcox = 'root';
$gaxtnabar = '';
$bazaianun = 'orbeli_db';
$con = mysqli_connect($serverianun,$ogtagorcox, $gaxtnabar, $bazaianun);
if(!$con){
	die("error".mysqli_connect_error());
}

mysqli_set_charset($con,"utf8");

	if(isset($_POST['id'])){
		$id=$_POST['id'];			
		$sql="SELECT email FROM  authors where id='$id'";		
        $ardyunq= mysqli_query($con, $sql);   
     while($row=mysqli_fetch_assoc($ardyunq)){
	echo $row["email"];
								 }
	}
	else{
		
		echo "error".mysqli_error();
	}

?>