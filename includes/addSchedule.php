<?php


session_start();
$name = '';
$from_date = '';
$from_time = '';
$to_date = '';
$to_time = '';
// $min_hrs='';

$mysqli=new mysqli('localhost','root','','hospital_management_system') or die(mysqli_error($mysqli));


if (isset($_POST['add-schedule'])) {
    $name = $_POST['name'];
    $desc=$_POST['description'];
    $from_date = $_POST['from_date'];
    $from_time = $_POST['from_time'];
    $to_date = $_POST['to_date'];
    $to_time = $_POST['to_time'];
    // $min_hrs=$_POST['minimum_hrs'];
    $rec_shift=$_POST['recurring_shift'];
    // $mysqli->query("INSERT INTO schedule (name,description,Shift_from_day,Shift_to_day,Shift_from_time,Shift_to_time,Recurring) VALUES ('$name','$desc','$from_date','$to_date','$from_time','$to_time','$rec_shift')") or die($mysqli->error);
    $mysqli->query("INSERT INTO schedule (name,description,shift_from_day,shift_to_day,shift_from_time,shift_to_time,recurring) VALUES ('$name','$desc','$from_date','$to_date','$from_time','$to_time','$rec_shift')") or die($mysqli->error);

    // $mysqli->query("INSERT INTO schedule (name,description,from_day,to_day,from_time,to_time,recurring) VALUES ('$name','$desc','$from_date','$to_date','$from_time','$to_time','$rec_shift')") or die($mysqli->error);

    // name	description	from_date	from_time	to_date	to_time	recurring_shift
    $_SESSION['message']="Schedule has been added Successfully!";
    $_SESSION['msg_type']="success";
    header("location: ../schedule.php");
}
