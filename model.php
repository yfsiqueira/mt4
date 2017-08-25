<?php
include_once('db.php');
/**
*
*/
class ModelContacts extends DataBase
{
  public function insert($contact){
    $conn = $this->connect();

    $this->connect();

    $stmt = $conn->prepare("INSERT INTO contacts
      (name, personal_email, work_email, home_phone, cell_phone, work_phone)
      VALUES (?, ?, ?, ?, ?, ?)");

      $stmt->bind_param("ssssss",
      $contact->name, $contact->p_email, $contact->w_email,
      $contact->h_phone, $contact->c_phone, $contact->w_phone);

      $stmt->execute();

      $stmt->close();
      $this->close();
    }

    public function selectAll($mode){
      $conn = $this->connect();

      $this->connect();

      //$sql = "SELECT * FROM contacts";
      $stmt = $conn->query("SELECT * FROM contacts");

      $result = array();
      $i = 0;
      while($row = $stmt->fetch_assoc()){
        $result[$i] = $row;
        $i++;
      }

      $this->close();

      if ($mode == 'json'){
        echo json_encode($result);
      }
      else {
        return $result;
      }
    }

    public function selectLike($value){
      $conn = $this->connect();

      $this->connect();

      $param = "%" . $value . "%";
      $stmt = $conn->prepare("SELECT * FROM contacts WHERE name LIKE ?");
      $stmt->bind_param("s", $param);
      $stmt->execute();

      $getResult = $stmt->get_result();

      $result = array();
      $i = 0;
      while($row = $getResult->fetch_assoc()){
        $result[$i] = $row;
        $i++;
      }

      $stmt->close();
      $this->close();

      return $result;
    }

    public function selectWhere($value){
      $conn = $this->connect();

      $this->connect();

      $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
      $stmt->bind_param("s", $value);
      $stmt->execute();

      $getResult = $stmt->get_result();

      $result = array();
      $i = 0;
      while($row = $getResult->fetch_assoc()){
        $result[$i] = $row;
        $i++;
      }

      $stmt->close();
      $this->close();

      return $result;
    }

    public function update($contact,$id){
      $conn = $this->connect();

      $this->connect();

      $stmt = $conn->prepare("UPDATE contacts SET
        name = ?, personal_email = ?, work_email = ?, home_phone = ?, cell_phone = ?,
        work_phone = ? WHERE id = ?");

        $stmt->bind_param("sssssss",
        $contact->name, $contact->p_email, $contact->w_email,
        $contact->h_phone, $contact->c_phone, $contact->w_phone, $id);

        $stmt->execute();

        $stmt->close();
        $this->close();
      }

      public function delete($id){
        $conn = $this->connect();

        $this->connect();

        $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");

        $stmt->bind_param("s", $id);

        $stmt->execute();

        $stmt->close();
        $this->close();
      }
    }
    ?>
