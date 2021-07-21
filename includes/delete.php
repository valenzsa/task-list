<?php
  include('db.php');

  $id = (int)$_GET['id'];

  $sql = "DELETE FROM task_table WHERE id='$id'";

  $db->query($sql);

  header('location: ../index.php');
?>