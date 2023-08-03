<?php
$SERVER = 'localhost';
$USERNAME ='root';
$PASSWORD ='';
$DBNAME='cozashop_db_2';

$connect = new mysqli($SERVER,$USERNAME,$PASSWORD,$DBNAME);
if($connect->connect_error){
    die("Error");
}
$connect->set_charset('utf8')

?>