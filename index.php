<?php

include "action.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medicine</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <style media="screen">
    body{
      background: #24292e;
      color: white;
    }
    h1{
      text-align: center;
      color: #18c3bd !important;
      letter-spacing: 7px;
      font-weight: 500;
    }
    input{
      margin-top: 14px;
    }
  </style>
  <body>
    <div class="container-fluid">
      <div class="jumbotron">
        <h1>Hussaini Medical Store</h1>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div id="msg">

          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Enter The Details here!</div>
            <div class="panel-body">
              <form class="" action="action.php" method="post">
                <input type="text" class="form-control" name="name" placeholder="Enter the medicine name">
                <input type="text" class="form-control" name="quantity" placeholder="Enter the Quantity">
                <input type="submit" class="btn btn-primary pull-right" name="submit" value="Store">
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th>#</th>
                <th>Medicine Name</th>
                <th>Avaialble Stock</th>
                <th><span class="fa fa-pencil"></span></th>
                <th><span class="fa fa-trash"></span></th>
              </tr>
              <tr>
                <?php
                  $myrow = $obj->fetch("medicines");
                  foreach ($myrow as $row) {
                  //breaking point
                ?>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["medicine_name"]; ?></td>
                <td><b><?php echo $row["quantity"]; ?></b></td>
                <td><a href="#" class="btn btn-warning">Edit</a></td>
                <td><a href="#" class="btn btn-danger">Delete</a></td>
              </tr>
              <?php
                }
              ?>
            </table>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  <script src="app.js"></script>
  </body>
</html>
