<?php
  include('db.php');

  $id = $_GET['id'];

  $sql = "DELETE FROM task_table WHERE id='$id'";

  $db->query($sql);

  header('location: ../index.php');
?>