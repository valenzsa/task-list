<?php
  include('db.php');

  if(isset($_POST['send'])) {
    //if isset
    $name = $_POST['task'];

    $sql = "INSERT INTO task_table (name) VALUES ('$name')";

    $db->query($sql);

    if($db) {
      header('location: ../index.php');
    }
  }
?>