<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="insert.html">CADASTRAR</a></li>
        <li><a href="search.php">EDITAR/EXCUIR</a></li>
        <li><a href="report.html">RELATÓRIO</a></li>
      </ul>
    </div>
  </nav>
  <?php

  include_once "model.php";

  $mc = new ModelContacts();

  //$values = array();

  $values = $mc->selectWhere($_GET['id']);

  $id = $values[0]['id'];
  $name = $values[0]['name'];
  $personal_email = $values[0]['personal_email'];
  $work_email = $values[0]['work_email'];
  $cell_phone = $values[0]['cell_phone'];
  $home_phone = $values[0]['home_phone'];
  $work_phone = $values[0]['work_phone'];

  echo"<form class=\"col-xs-3\" action=\"Controller.php\" method=\"post\">";
  echo"<input type=\"hidden\" name=\"action\" value=\"alterar\">";
  echo"<input type=\"hidden\" name=\"id\" value=\"$id\">";
  echo"<input type=\"text\" class=\"form-control\" value=\"$name\" name=\"name\" placeholder=\"Nome\">";
  echo"<br>";
  echo"<input type=\"text\" class=\"form-control\" value=\"$personal_email\" name=\"p_email\" placeholder=\"Email Pessoal\">";
  echo"<br>";
  echo"<input type=\"text\" class=\"form-control\" value=\"$work_email\" name=\"w_email\" placeholder=\"Email Profissional\">";
  echo"<br>";
  echo"<input type=\"text\" class=\"form-control\" value=\"$home_phone\" name=\"h_phone\" placeholder=\"Tel Casa\">";
  echo"<br>";
  echo"<input type=\"text\" class=\"form-control\" value=\"$cell_phone\" name=\"c_phone\" placeholder=\"Celular\">";
  echo"<br>";
  echo"<input type=\"text\" class=\"form-control\" value=\"$work_phone\" name=\"w_phone\" placeholder=\"Tel Trabalho\">";
  echo"<br>";
  echo"<input type=\"submit\" class=\"btn btn-default\" value=\"Editar\">";
  echo"</form>";
  ?>
</body>
</html>
