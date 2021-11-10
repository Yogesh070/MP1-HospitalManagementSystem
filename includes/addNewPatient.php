<?php
session_start();
$name='';
$gender='';
$dob='';
$update=false;
$id=0;
$address='';
$table_name='patient';

$mysqli=new mysqli('localhost','root','','hospital_management_system') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address=$_POST['address'];
    $mysqli->query("INSERT INTO patient (id,name, gender, dob,address) VALUES ('$id','$name','$gender','$dob','$address')") or die($mysqli->error);

    $_SESSION['message']="Record has been added Successfully!";
    $_SESSION['msg_type']="success";

    header("location: ../patient.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM patient WHERE id=$id") or die($mysqli->error);

    $_SESSION['message']="Record has been deleted Successfully!";
    $_SESSION['msg_type']="danger";

    header("location: ../patient.php");
}
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $r=$mysqli->query("SELECT * FROM patient WHERE id=$id Limit 1") or die($mysqli->error);
    $result=$r->fetch_assoc();
    $name=$result['name'];
    $gender=$result['gender'];
    $dob=$result['dob'];
    $address=$result['address'];
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address=$_POST['address'];
    $mysqli->query("UPDATE patient SET name='$name', gender='$gender', dob='$dob', address='$address' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message']="Record has been updated Successfully";
    $_SESSION['msg_type']="warning";

    header("location: ../patient.php");

}