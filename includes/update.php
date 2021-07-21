<!DOCTYPE html>

<?php include 'db.php'; 

  $id = (int)$_GET['id'];

  $sql = "SELECT * FROM task_table WHERE id='$id'";

  $rows = $db->query($sql);

  // Outputs an associative array and grabs the specific row.
  $row = $rows->fetch_assoc();

  echo "<br /><br />";
  var_dump($row);
  echo "<br /><br />";

  if(isset($_POST['send'])){
    // htmlspecialchars() prevents any sql injection
    $task = htmlspecialchars(($_POST['task']));

    $sql2 = "UPDATE task_table SET name='$task' WHERE id='$id'";

    $db->query($sql2);

    header('location: ../index.php');
  }

  

?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="center-block">
          <h1>Update Task List</h1>
        </div>
        
        <table class="table"> 

          <form method="POST">
            <div class="form-group">
              <label>Task Name</label>
              <input type="text" required name="task" class="form-control" value="<?php echo $row['name']; ?>"/>
            </div>
            <input type="submit" name="send" value="Update Task" class="btn btn-success" />
          </form>
                
          
      </div>
    </div><!-- End of row -->
  </div><!-- End of container -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>