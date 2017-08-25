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

  <form class="" action="search.php" method="post">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Digite sua pesquisa">
        <span class="input-group-btn">
          <input type="submit" class="btn btn-default" value="Pesquisar">
        </span>
      </div>
    </div>
  </form>

  <?php
  include_once"model.php";

  $mc = new ModelContacts();
  if ($_POST['search'] == "") {
    $result = $mc->selectAll();

    echo"<table class=\"table\">
    <thead>
    <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>E-mail Pessoal</th>
    <th>E-mail Profissional</th>
    <th>Tel Residencial</th>
    <th>Celular</th>
    <th>Tel Trabalho</th>
    <th></th>
    </tr>
    </thead>
    <tbody>";

    foreach ($result as $key => $value) {
      echo "<tr>";
      foreach ($result[$key] as $info) {
        echo "<td>";
        echo $info;
        echo "</td>";
      }
      echo "<td>";
      echo "<a class=\"btn btn-default btn-xs\" href=edit.php?id=".$result[$key]['id'].">Edit</a>";
      echo "<a class=\"btn btn-default btn-xs\" href=ControllerDelete.php?id=".$result[$key]['id'].">Delete</a>";
      echo "</td>";
      echo "</tr>";
    }

    echo"</tbody>
    </table>";

  }
  else{

    //$search = $POST['search'];
    $result = $mc->selectLike($_POST['search']);
    //$result = $mc->select("SELECT * FROM contacts");

    echo"<table class=\"table\">
    <thead>
    <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>E-mail Pessoal</th>
    <th>E-mail Profissional</th>
    <th>Tel Residencial</th>
    <th>Celular</th>
    <th>Tel Trabalho</th>
    <th></th>
    </tr>
    </thead>
    <tbody>";



    foreach ($result as $key => $value) {
      echo "<tr>";
      foreach ($result[$key] as $info) {
        echo "<td>";
        echo $info;
        echo "</td>";
      }
      echo "<td>";
      echo "<a class=\"btn btn-default btn-xs\" href=edit.php?id=".$result[$key]['id'].">Edit</a>";
      echo "<a class=\"btn btn-default btn-xs\" href=ControllerDelete.php?id=".$result[$key]['id'].">Delete</a>";
      echo "</td>";
      echo "</tr>";
    }
    echo"</tbody>
    </table>";
  }
  ?>
</body>
</html>
