<?php

$servername = 'localhost';
$dbname = 'users';
$username='root';
$password='';
$port=3366;


$conne = new mysqli($servername,$username , $password,$dbname, $port);

if($conne -> connect_error ){
    die('CONNECTION FAILED:' .$conne -> connect_error);
}
echo "CONNECTION SUCCESSFUL👍👌❤️😍";

?>