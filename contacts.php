<?php

/**
*
*/
class Contacts
{
  private $name;
  private $p_email;
  private $w_email;
  private $h_phone;
  private $c_phone;
  private $w_phone;

  public function __set($prop, $value){
    $this->$prop = $value;
  }

  public function __get($prop){
    return $this->$prop;
  }

}


?>
