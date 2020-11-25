<?php
session_start();
$name='';
$gender='';
$dob='';
$update=false;
$id=0;

$mysqli=new mysqli('localhost','root','','hms_data') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mysqli->query("INSERT INTO patientdata (Name, Gender, DOB) VALUES ('$name','$gender','$dob')") or die($mysqli->error);

    $_SESSION['message']="Record has been added Successfully!";
    $_SESSION['msg_type']="success";

    header("location: ../patient.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM patientdata WHERE ID=$id") or die($mysqli->error);

    $_SESSION['message']="Record has been deleted Successfully!";
    $_SESSION['msg_type']="danger";

    header("location: ../patient.php");
}
if(isset($_GET['edit'])){
    $id=$_GET["edit"];
    $update=true;
    $result=$mysqli->query("SELECT * FROM patientdata WHERE ID=$id") or die($mysqli->error);
    if(count($result)==1){
        $row=$result->fetch_array();
        $name=$row['Name'];
        $gender=$row['Gender'];
        $dob=$row['DOB'];
    }
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mysqli->query("UPDATE patientdata SET Name='$name', Gender='$gender', DOB='$dob' WHERE ID=$id") or die($mysqli->error);

    $_SESSION['message']="Record has been updated Successfully";
    $_SESSION['msg_type']="warning";

    header("location: ../patient.php");

}