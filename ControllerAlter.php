<?php

include_once "model.php";

$mc = new ModelContacts();

//$values = array();

$values = $mc->selectWhere($_GET['id']);

$name = $values[0]['name'];
$personal_email = $values[0]['personal_email'];
$work_email = $values[0]['work_email'];
$cell_phone = $values[0]['cell_phone'];
$home_phone = $values[0]['home_phone'];
$work_phone = $values[0]['work_phone'];

if ($_GET['id'] != ""){
echo "<script>location.href='edit.php';</script>";
}
?>
