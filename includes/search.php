<!DOCTYPE html>

<?php include 'db.php'; 

  if(isset($_POST['search'])){

    $name = htmlspecialchars($_POST['search']);

    // Grab all data from task table
    $sql = "SELECT * FROM task_table WHERE name like '%$name%'";

    // Perform a query against the database
    $rows = $db->query($sql);
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
          <h1>Task List</h1>
        </div>

        <button type="button" class="btn btn-success" data-target="#addModal" data-toggle="modal">Add Task</button>
        <button type="button" class="btn btn-default pull-right" onclick="print()">Print</button>
        <hr /><br />
        
        <div class="col-md-12 text-center">
          <p>Search</p>
          <form action="search.php" method="POST" class="form-group">
            <input type="text" placeholder="Search" class="form-control" name="search" />
          </form>
        </div>

        <?php if(mysqli_num_rows($rows) < 1): ?>

          <!-- IF THERE NO RESULT -->
          <h2 class="text-center text-danger">Nothing Found</h2>
          <a href="../index.php" class="btn btn-warning">Back</a>

        <?php else: ?>

        <table class="table table-hover"> 
          <div id="addModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Task</h4>
                </div>
                <div class="modal-body">
                  <form action="includes/create.php" method="POST">
                    <div class="form-group">
                      <label>Task Name</label>
                      <input type="text" required name="task" class="form-control" />
                    </div>
                    <input type="submit" name="send" value="Add Task" class="btn btn-success" />
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <thead> 
            <tr> 
              <th>Id.</th> 
              <th>Task</th> 
            </tr> 
          </thead> 
          <tbody> 
             
            <?php while ($row = $rows->fetch_assoc()): ?>

              
              <tr>
                <td><?php echo $row['id']; ?></td> 
                <td class="col-md-10"><?php echo $row['name']; ?></td> 
                <td><a href="includes/update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
                <td><a href="includes/delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
              </tr>
            <?php endwhile; ?>
            </tr> 
          </tbody> 
        </table>
        <?php endif; ?>
        

      </div>
    </div><!-- End of row -->
  </div><!-- End of container -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>