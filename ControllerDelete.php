<?php

include_once('model.php');

$mc = new modelContacts();

$mc->delete($_GET['id']);

echo "<script>location.href='search.php';</script>";

?>
