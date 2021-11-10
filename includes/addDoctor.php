<?php
session_start();
$name='';
$gender='';
$dob='';
$address='';
$phoneno='';
$dept='';
$update=false;
$id=0;
$table_name='doctor';

$mysqli=new mysqli('localhost','root','','hospital_management_system') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phoneno=$_POST['phoneno'];
    $address=$_POST['address'];
    $dept=$_POST['department'];
    $mysqli->query("INSERT INTO doctor(id,name,gender,address,dob,phoneno,department) VALUES (UUID(),'$name','$gender','$address','$dob','$phoneno','$dept')") or die($mysqli->error);

    $_SESSION['message']="Record has been added Successfully!";
    $_SESSION['msg_type']="success";

    header("location: ../doctor.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM $table_name WHERE id=$id") or die($mysqli->error);

    $_SESSION['message']="Record has been deleted Successfully!";
    $_SESSION['msg_type']="danger";

    header("location: ../doctor.php");
}
if(isset($_GET['edit'])){
    $id=$_GET["edit"];
    $update=true;
    $r=$mysqli->query("SELECT * FROM $table_name WHERE id=$id") or die($mysqli->error);
    $result=$r->fetch_assoc();
    $name=$result['name'];
    $gender=$result['gender'];
    $dob=$result['dob'];
    $phoneno=$result['phoneno'];
    $dept=$result['department'];
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mysqli->query("UPDATE $table_name SET name='$name', gender='$gender', dob='$dob' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message']="Record has been updated Successfully";
    $_SESSION['msg_type']="warning";

    header("location: ../doctor.php");

}