<?php 
        include('dbcon.php');
        $id = $_POST['id'];
        echo $id;

        $sql = "SELECT * FROM `customer` WHERE `id` = $id";
        $run = mysqli_query($con, $sql);
        $data = mysqli_fetch_assoc($run);


        $uname = $data['uname'];
        $upass = $data['upass'];
        $address = $data['address'];
        $email = $data['email'];
        $project_path = $data['project_path'];
        $status = $data['status'];

        $qry = "UPDATE `customer` SET `id` = '$id', `uname` = '$uname',`upass` = '$upass', `address` = '$address' ,`email` = '$email', `project_path` = '$project_path', `status` = '2'  WHERE `id` = '$id '";

        $run1 = mysqli_query($con, $qry);
        if($run1){
            $msg = "Project file rejected";
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

    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Login User : Shezer</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;
        background: linear-gradient(120deg, #2980b9, #8e44ad);
        height: 100vh;
        overflow: hidden;
    }

    </style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <br>
            <center>
            <div class="line1"> </div>
                <div class="card transb text-dark">
                    <div class="card-body">
                        <div class="login">
                            <h3><?php echo $msg; ?></h3>
                            <br>
                           <a  href="index.php">
                           <button type="button" class="btn btn-success" >Back to Employee Pannel</button>
                           </a>
                        </div>
                    </div>
                </div>
            </center>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>

</body>

</html>

