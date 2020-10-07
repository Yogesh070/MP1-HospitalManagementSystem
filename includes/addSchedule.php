<?php


session_start();
$name = '';
$from_date = '';
$from_time = '';
$to_date = '';
$to_time = '';
$min_hrs='';

$mysqli=new mysqli('localhost','root','','hms_data') or die(mysqli_error($mysqli));


if (isset($_POST['add-schedule'])) {
    $name = $_POST['name'];
    $desc=$_POST['description'];
    $from_date = $_POST['from_date'];
    $from_time = $_POST['from_time'];
    $to_date = $_POST['to_date'];
    $to_time = $_POST['to_time'];
    $min_hrs=$_POST['minimum_hrs'];
    $rec_shift=$_POST['recurring_shift'];
    $mysqli->query("INSERT INTO Schedule (Name,Description,Shift_from_day,Shift_to_day,Shift_from_time,Shift_to_time,Minimum_hours,Recurring) VALUES ('$name','$desc','$from_date','$to_date','$from_time','$to_time','$min_hrs','$rec_shift')") or die($mysqli->error);

    $_SESSION['message']="Schedule has been added Successfully!";
    $_SESSION['msg_type']="success";
    header("location: schedule.php");
}
