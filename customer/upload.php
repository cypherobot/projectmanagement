<?php
$upload = 'err';
if (!empty($_FILES['file'])) {

    // File upload configuration 
    $targetDir = "uploads/";
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif');

    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir . $fileName;

    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    if (in_array($fileType, $allowTypes)) {
        // Upload file to the server 
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {

            $upload = 'ok';

            // $query = "UPDATE customer(project_path) SET('$targetFilePath')";
            // mysqli_query($conn, $query);


            session_start();
            include('dbcon.php');
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM `customer` WHERE `id` = $id";
            $run = mysqli_query($con, $sql);
            $data = mysqli_fetch_assoc($run);


            $uname = $data['uname'];
            $upass = $data['upass'];
            $address = $data['address'];
            $email = $data['email'];
            $project_path = $data['project_path'];
            $status = $data['status'];

            $qry = "UPDATE `customer` SET `id` = '$id', `uname` = '$uname',`upass` = '$upass', `address` = '$address' ,`email` = '$email', `project_path` = '$targetFilePath', `status` = '$status'  WHERE `id` = '$id'";

            $run1 = mysqli_query($con, $qry);



        }
    }
}
echo $upload;
