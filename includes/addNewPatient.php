<?php
session_start();

$mysqli=new mysqli('localhost','root','','patientinfo') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mysqli->query("INSERT INTO patientdata (Name, Gender, DOB) VALUES ('$name','$gender','$dob')") or die($mysqli->error);

    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="success";

    header("location: ../patient.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM patientdata WHERE ID=$id") or die($mysqli->error);

    $_SESSION['message']="Record has been deleted";
    $_SESSION['msg_type']="danger";

    header("location: ../patient.php");
}