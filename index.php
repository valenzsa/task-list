<!DOCTYPE html>
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
                  <form>
                    <div class="form-group">
                      <label>Task Name</label>
                      <input type="text" required name="task" class="form-control" />
                    </div>
                    <input type="submit" name="send" value="Send" class="btn btn-success" />
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
              <th>No.</th> 
              <th>Task</th> 
            </tr> 
          </thead> 
          <tbody> 
            <tr> 
              <td>1</td> 
              <td>Mark</td> 
            </tr> 
          </tbody> 
        </table>
      </div>
    </div><!-- End of row -->
  </div><!-- End of container -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>