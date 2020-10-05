<?php
session_start();
if (isset($_SESSION['id'])) {


  // $data = mysqli_fetch_assoc($run);
  // $data = mysqli_fetch_all($run); 
} else {

  header("location:/shezer/employee/login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- bootstrap css  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- css  -->
  <link rel="stylesheet" href="style.css">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <title>Shezer</title>
</head>

<!-- navbar    -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand logo-1" href="#">Shezer</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="logout.php" <button class="btn my-2 my-sm-0 btn-outline-danger" type="submit">Logout</button></a>
    </form>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <br>
      <center>
        <div class="line1"></div><br>
        <div class="card text-center">
          <div class="card-header">
            Employee Pannel
          </div>
          <div class="card-body">

            <table align="center" width="90%" border="1" style="margin-top:10px;">
              <tr style="background-color:teal; color:white">
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>download</th>
                <th>status</th>
                <th>Actions</th>
                <th></th>
              </tr>
              <?php
              include('dbcon.php');
              $sql = "SELECT * FROM `customer`";
              $run = mysqli_query($con, $sql);
              if (mysqli_num_rows($run) < 1) {
                echo "<tr><td> no record <tr><td>";
              } else {
                $count = 0;
                while ($data = mysqli_fetch_assoc($run)) {
                  $count++;
              ?>
                  <tr style="background-color:#FFF; color:#000">
                    <td><?php echo $data['id']; ?> </td>
                    <td><?php echo $data['uname']; ?> </td>
                    <td><?php echo $data['email']; ?> </td>
                    <td>
                    <?php if ($data['project_path'] == null) {
                          echo "No File";}
                          else{
                            ?>
                      <form action="/shezer/employee/download.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <input type="submit" value="Download">
                      </form>
                          <?php } ?>

                    </td>
                    <td>
                    <?php if ($data['project_path'] == null) {
                          echo "Not Uploaded";}
                          else{
                            ?>
                      <?php if ($data['status'] == 0) {
                          echo "Pending";
                        } elseif ($data['status'] == 1) {
                          echo "Approved";
                        } elseif ($data['status'] == 2) {
                          echo "Rejected";
                        }
                        ?> <?php } ?></td>
                    <td>
                    <?php if ($data['project_path'] == null) {
                          echo "";}
                          else{
                            ?>
                      <form action="/shezer/employee/accept.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <input type="submit" value="Accept" class="accept">
                      </form>
                      <?php } ?>
                    </td>
                    <td>
                    <?php if ($data['project_path'] == null) {
                          echo "";}
                          else{
                            ?>
                      <form action="/shezer/employee/reject.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <input type="submit" value="Reject" class="reject">
                      </form>
                      <?php } ?>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>
          </div>
        </div>
    </div>

  </div>
</div>

</div>

<div class="card-footer text-muted">
</div>


</div>
</center>

<style>
  input[type=submit] {
    background-color: rgb(64, 32, 248);
    color: honeydew;
    width: 80%;
    padding: 2px 2px;
    margin: 3px 0;
    border: none;
    box-sizing: border-box;
  }

  input[type=submit]:hover {
    background-color: rgb(62, 34, 219);
    color: honeydew;
    width: 80%;
    padding: 2px 2px;
    margin: 3px 0;
    border: none;
    box-sizing: border-box;
  }
</style>



<!-- js  -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>