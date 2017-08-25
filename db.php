<?php

/**
*
*/
class DataBase
{
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $db = 'agenda';

  public function connect(){
    $strcon = new mysqli($this->host, $this->user,
    $this->password, $this->db);
    /*or die ('Erro de conexão!');*/

    //print_r($strcon);
    //die();
    return $strcon;
  }

  public function close(){
    $connection = $this -> connect();
    //if($connection == true){
    return $connection -> close();
    //}
  }

}


?>
