<?php 
include('dbcon.php');
if(isset($_POST['register']))
{
    $username=$_POST['uname'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $con=mysqli_connect('localhost','root','','shezer');

    $qry1="SELECT * FROM `customer` WHERE `uname`='$username';";

    $run1=mysqli_query($con,$qry1);
    $row=mysqli_num_rows($run1);

    if($row)
    {
    $msg="Username Already exists";
    }
    else
    {
    $msg="Congratulations! You are registered.";
    $qry="INSERT INTO `customer`(`uname`, `upass`, `address`, `email`) VALUES ('$username','$password','$address','$email')";
    $run=mysqli_query($con,$qry);
    } 
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
            <!-- Tip: use bg-* and text-* utilities to style the card -->
            <center>
            <div class="line1"> </div>
                <div class="card transb text-dark">
                    <div class="card-body">
                        <div class="login">
                            <h3><?php echo $msg; ?></h3>
                            <br>
                            <a  href="register.php">
                            <button type="button" class="btn btn-success" >Not a User ? register here</button>
                           </a>
                           <p>or</p>
                           <a  href="login.php">
                           <button type="button" class="btn btn-success" >Already a User ? login here</button>
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

<!-- js  -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

