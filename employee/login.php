<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- css  -->
    <link rel="stylesheet" href="log.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Employee Admin : Shezer</title>
</head>

<div class="center">
    <h1>Employee</h1>
    <form action="login.php" method="POST">
        <div class="txt_field">
            <input type="text" name="uname" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            <span></span>
            <label>Username</label>
        </div>

        <div class="txt_field">
            <input type="password" name="password" mclass="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1"required>
            <span></span>
            <label>Password</label>
        </div>

        <button type="submit" name="login" value="Login" required>Login</button>
        <div class="signup_link">
            <p></p>
        </div>
    </form>
</div>


<!-- js  -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
<?php
include('dbcon.php');
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['password'];

    // $qry="SELECT * FROM `admin` WHERE `username`=`$username` AND `password`=`$password`;";
    $qry = "SELECT * FROM `employee` WHERE `password`='$password' AND `username`='$username';";

    $run = mysqli_query($con, $qry);
    $row = mysqli_num_rows($run);

    if ($row < 1) {
?>
        <script>
            alert('username or password does not match');
            window.open('login.php', '_SELF');
        </script>
<?php
    } else {

        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];

        session_start();

        $_SESSION['id'] = $id;

        header("location:/shezer/employee/index.php");
    }
}

?>

<?php
session_start();
if (isset($_SESSION['id'])) {
    header("location:/shezer/employee/index.php");
}
?>