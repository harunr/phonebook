<?php 

require_once('constant.php');

$host = HOST;
$user = USER;
$pass = PASS;
$dbname = DBNAME;

$con = mysqli_connect($host,$user,$pass,$dbname);

/*if($con){
    echo "connected";
}*/

?>