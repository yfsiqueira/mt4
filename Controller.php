<?php

include_once('model.php');
include_once('db.php');
include_once('contacts.php');

$mc = new modelContacts();
$contact = new Contacts();

if($_POST['action']=='inserir'){

  foreach ($_POST as $key => $value) {
    $contact->$key = $value;
  }

  $mc -> insert($contact);
  echo"<script>window.location.href = 'insert.html';</script>";
}

else if($_POST['action']=='alterar'){
  foreach ($_POST as $key => $value) {
    $contact->$key = $value;
  }

  $mc -> update($contact, $_POST['id']);
  echo"<script>window.location.href = 'search.php';</script>";
}
?>
