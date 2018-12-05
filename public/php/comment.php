<?php 
require "con1.php";
mysqli_set_charset($con,"utf8");

$y = mysqli_real_escape_string($con, $_POST['offset']);
$id = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT * FROM comments  WHERE approved=1  and commentable_id='$id' LIMIT 5 OFFSET $y";

$ardyunq = mysqli_query($con, $sql);

while($tox = mysqli_fetch_assoc($ardyunq)){
    echo "
        <div class='col-md-12 col-sm-12 col-xs-12 no-padding'>
            <ul class='blog-comment'>
            <li> 
                <div class='display-table width-100'>                                               
                    <div class='padding-40px-left display-table-cell vertical-align-top last-paragraph-no-margin xs-no-padding-left xs-display-block'>
                    <span class='text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small'>".$tox['c_name']."</span>
                    <div class='text-small text-medium-gray text-uppercase margin-10px-bottom'>".date('Y-m-d', strtotime($tox['created_at']))."</div>
                    <p style='font-size:12px'>".$tox['body']."</p>   
                    <hr>                   
                </div>
            </li>
            </ul>
        </div>";
}

?>