<!DOCTYPE html>

<?php include 'includes/db.php'; 

  // Create pagination
  // Check if the page is set.  If not set it to 1 
  $page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

  // Check if per page exists in the url query and also check if per-page is equal to less than or equal to 50
  // Otherwise, set per-page to 5
  $perPage = (isset($_GET['per-page']) && (int)($_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);


  // Set a limit to how many records to show
  $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

  // Grab all data from task table
  $sql = "SELECT * FROM task_table LIMIT ".$start.", ".$perPage." ";

  // Check how many records in the database
 $total = $db->query("SELECT * FROM task_table")->num_rows;

//  echo "<br /><br />";
//  echo $total;
//  echo "<br /><br />";
//  var_dump($total);
//  echo "<br /><br />";

 $pages = ceil($total / $perPage);




  // Perform a query against the database
  $rows = $db->query($sql);
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
        
        <table class="table"> 
          <button type="button" class="btn btn-success" data-target="#addModal" data-toggle="modal">Add Task</button>
          <button type="button" class="btn btn-default pull-right">Print</button>
          <hr /><br />
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

        <ul class="pagination">
          <?php for($i = 1; $i <= $pages; $i++): ?>
          <li><a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
        </ul>
      </div>
    </div><!-- End of row -->
  </div><!-- End of container -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>