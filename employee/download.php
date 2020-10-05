<?php
include('dbcon.php');
$id = $_POST['id'];
echo $id;

$sql = "SELECT * FROM `customer` WHERE `id` = $id";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);

$project_path = $data['project_path'];
$file = $project_path;

$filetype = filetype($file);

$filename = basename($file);

header("Content-Type: " . $filetype);

header("Content-Length: " . filesize($file));

header("Content-Disposition: attachment; filename=" . $filename);

readfile($file);
