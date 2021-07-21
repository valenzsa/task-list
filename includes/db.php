<?php
  $db = new Mysqli;

  $db->connect('localhost', 'root', '', 'task_db');

  if($db) {
    echo "Connection successful";
  }
?>