<?php
$SERVER = 'localhost';
$USERNAME ='root';
$PASSWORD ='';
$DBNAME='coza_shop_db';

$connect = new mysqli($SERVER,$USERNAME,$PASSWORD,$DBNAME);
if($connect->connect_error){
    die("Error");
}
$connect->set_charset('utf8')

?>