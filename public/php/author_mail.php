<?php 

require "con1.php";

$id = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT email FROM authors WHERE id=$id";

$result = mysqli_query($con, $sql);

$tox = mysqli_fetch_assoc($result);

echo "<a href=mailto:".$tox['email'].">".$tox['email']."</a>";

?>