<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login customer: Shezer</title>
</head>


<div class="center">
    <h1>Login</h1>
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
            <p><a href="register.php">Signup</a></p>
        </div>
    </form>
</div>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;
        background: linear-gradient(120deg, #2980b9, #8e44ad);
        height: 100vh;
        overflow: hidden;
    }

    .center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: white;
        border-radius: 10px;
    }

    .center h1 {
        text-align: center;
        padding: 0 0 20px 0;
        border-bottom: 1px solid silver;
    }

    .center form {
        padding: 0 40px;
        box-sizing: border-box;
    }

    form .txt_field {
        position: relative;
        border-bottom: 2px solid #adadad;
        margin: 30px 0;
    }

    form .txt_field input {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
    }

    .txt_field label {
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: .5s;
    }

    .txt_field span::before {
        content: '';
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #2691d9;
        transition: .5s;
    }

    .txt_field input:focus~label,
    .txt_field input:valid~label {
        top: -5px;
        color: #2691d9;
    }

    .txt_field input:focus~span::before,
    .txt_field input:valid~span::before {
        width: 100%;
    }

    .pass {
        margin: -5px 0 20px 5px;
        color: #a6a6a6;
        cursor: pointer;
    }

    .pass:hover {
        text-decoration: underline;
    }

    form button {
        width: 100%;
        height: 50px;
        background: #2691d9;
        border: 1px solid;
        border-radius: 25px;
        font-size: 18px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;
    }

    form button:hover {
        border-color: #2691d9;
        transition: .5s;
    }

    .signup_link {
        margin: 30px 0;
        text-align: center;
        font-size: 16px;
        color: #666666;
    }

    .signup_link a {
        text-decoration: none;
        color: #2691d9;
    }

    .signup_link a:hover {
        text-decoration: underline;
    }
</style>


<!-- js  -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</body>

</html>
<?php
include('dbcon.php');
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['password'];

    // $qry="SELECT * FROM `admin` WHERE `username`=`$username` AND `password`=`$password`;";
    $qry = "SELECT * FROM `customer` WHERE `upass`='$password' AND `uname`='$username';";

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

        header("location:/shezer/customer/index.php");
    }
}

?>

<?php
if (isset($_SESSION['id'])) {
    header("location:/shezer/customer/index.php");
}
?>