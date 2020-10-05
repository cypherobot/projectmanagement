<?php
session_start();
if (isset($_SESSION['id'])) {
  // echo "";
  include('dbcon.php');
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM `customer` WHERE `id` = $id";
  $run = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($run);
} else {

  header("location:/shezer/customer/login.php");
}
?>

<?php

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Login User : Shezer</title>
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
      <a href="/shezer/customer/logout.php" <button class="btn my-2 my-sm-0 btn-outline-danger" type="submit">Logout</button></a>
    </form>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <br>
      <center>
        <div class="line1"> </div>
      </center>
    </div>
  </div>
</div>
<br>
<br>


<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div>
        <div class="card text-center">
          <div class="card-header">
            Project Submission
          </div>
          <!-- File upload form -->
          <form id="uploadForm" enctype="multipart/form-data">
            <center>
              <label for="fileInput" class="btn">
                <i class="fa fa-upload" style="font-size:100px;"></i></label>
              <input type="file" name="file" id="fileInput" class="file">

              <input type="submit" name="submit" value="UPLOAD" class="sub" />
            </center>

            <!-- <input  style="visibility:hidden;" type="file"> -->
          </form>

          <style>
            input[type=file] {
              background-color: rgb(64, 32, 248);
              color: honeydew;
              width: 80%;
              padding: 2px 20px;
              margin: 8px 0;
              box-sizing: border-box;
            }

            input[type=file]:hover {
              background-color: rgb(62, 34, 219);
              color: honeydew;
              width: 80%;
              padding: 2px 20px;
              margin: 8px 0;
              box-sizing: border-box;
            }

            input[type=submit] {
              background-color: rgb(64, 32, 248);
              color: honeydew;
              width: 80%;
              padding: 12px 20px;
              margin: 8px 0;
              border: none;
              box-sizing: border-box;
            }

            input[type=submit]:hover {
              background-color: rgb(62, 34, 219);
              color: honeydew;
              width: 80%;
              padding: 12px 20px;
              margin: 8px 0;
              border: none;
              box-sizing: border-box;

            }

            .fa-upload {
              background-color: rgb(62, 34, 219);
              color: honeydew;
              width: 100%;
              padding: 20px 30px;
              margin: 8px 0;
              border: none;
              box-sizing: border-box;
            }

            .fa-upload:hover {
              background-color: #b0ff8f;
              color: rgb(62, 34, 219);
              width: 100%;
              padding: 20px 30px;
              margin: 8px 0;
              border: none;
              box-sizing: border-box;
            }

            body,   html {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    background: linear-gradient(120deg, #2980b9, #8e44ad);
    height: 100vh;
    overflow: hidden;
}
          </style>

          <!-- Progress bar -->
          <div class="progress">
            <div class="progress-bar"></div>
          </div>

          <!-- Display upload status -->
          <div id="uploadStatus" class="uploadStatus"></div>
        </div>
      </div>
    </div>

    <br>
    <br>

    <div class="col-md-6">
      <div>
        <div class="card text-center">
          <div class="card-header">
            Project Status
          </div>
          <div class="card-header">
            Customer Name: <a href="#" class="btn btn-outline-primary"><?php echo $data['uname'] ?></a>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
                <table align="center" width="90%" border="1" style="margin-top:10px;">
                  <tr style="background-color:rgb(64, 32, 248); color:white">
                    <th>Project</th>
                    <th>status</th>
                  </tr>

                  <tr style="background-color:#FFF; color:#000">
                    <td><?php echo $data['project_path']; ?> </td>
                    <td>
                     <?php if ($data['project_path'] == null) 
                     {
                      echo "Not Uploaded";}
                      else{
                    
                    
                    if($data['status'] == 0)
                            { echo "Pending";} 
                         elseif ($data['status'] == 1)
                            { echo "Approved";}
                            elseif ($data['status'] == 2)
                            { echo "Rejected";}
                      }
                            ?>  
                            
                            </td>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>





<!-- JavaScript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<script>
  $(document).ready(function() {
    // File upload via Ajax
    $("#uploadForm").on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
              var percentComplete = Math.round((evt.loaded / evt.total) * 100);
              $(".progress-bar").width(percentComplete + '%');
              $(".progress-bar").html(percentComplete + '%');
            }
          }, false);
          return xhr;
        },
        type: 'POST',
        url: 'upload.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $(".progress-bar").width('0%');
          $('#uploadStatus').html('');
        },
        error: function() {
          $('#uploadStatus').html('<div class="alert alert-danger" role="alert">File upload failed, please try again.</div>');
        },
        success: function(resp) {
          if (resp == 'ok') {
            $('#uploadForm')[0].reset();
            $('#uploadStatus').html('<div class="alert alert-success" role="alert">Project file uploaded successfully</div>');

          } else if (resp == 'err') {
            $('#uploadStatus').html('<div class="alert alert-danger" role="alert">Please select a valid file to upload.</div>');
          }
        }
      });
    });

    // File type validation
    $("#fileInput").change(function() {
      var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
      var file = this.files[0];
      var fileType = file.type;
      if (!allowedTypes.includes(fileType)) {
        alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
        $("#fileInput").val('');
        return false;
      }
    });
  });
</script>

<!-- js  -->

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>