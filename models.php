<?php

class Contacts {

  static public function select($where = null) {
    $conn = new PDO("mysql:host=localhost;dbname=database_name", "username", "password");
    $sql = "SELECT * FROM contacts";
    if ($where) {
      $sql .= " WHERE $where";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $results;
  }

  static public function create($data) {
    $conn = new PDO("mysql:host=localhost;dbname=database_name", "username", "password");
    $keys = implode(",", array_keys($data));
    $values = implode("','", array_values($data));
    $sql = "INSERT INTO contacts ($keys) VALUES ('$values')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    return true;
  }

  static public function read($id) {
    $conn = new PDO("mysql:host=localhost;dbname=database_name", "username", "password");
    $sql = "SELECT * FROM contacts WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
  }

  static public function update($id, $data) {
    $conn = new PDO("mysql:host=localhost;dbname=database_name", "username", "password");
    $updates = array();
    foreach ($data as $key => $value) {
      $updates[] = "$key = '$value'";
    }
    $updates = implode(",", $updates);
    $sql = "UPDATE contacts SET $updates WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $conn = null;
    return true;
  }

  static public function delete($id) {
    $conn = new PDO("mysql:host=localhost;dbname=database_name", "username", "password");
    $sql = "DELETE FROM contacts WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $conn = null;
    return true;
  }
}
