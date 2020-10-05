<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Customer Registration : Shezer</title>
</head>



<div class="center">
    <h1>Registration</h1>
    <form action="registered.php" method="POST">
        <div class="txt_field">
            <input type="text" name="uname" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            <span></span>
            <label>Username</label>
        </div>

        <div class="txt_field">
            <input type="password" name="password" mclass="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" required>
            <span></span>
            <label>Password</label>
        </div>


        <div class="txt_field">
            <input type="text" name="email" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            <span></span>
            <label>email</label>
        </div>

        <div class="txt_field">
            <input type="text" name="address" required class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            <span></span>
            <label>Address</label>
        </div>


        <button type="submit" name="register" value="Register" required>Signup</button>
        <div class="signup_link">
            <p><a href="login.php">Login</a></p>
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

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>