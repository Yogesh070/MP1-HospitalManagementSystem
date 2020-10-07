<?php
$mysqli=new mysqli('localhost','root','','Login') or die(mysqli_error($mysqli));

if(isset($_POST['login'])){
    $role=$_POST['role'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $result=$mysqli->query("SELECT * FROM login-system WHERE email='".$email."'AND pass='".$pass."'") or die($mysqli->error);
    if(count($result)==1){
        echo "logged in";
        header("location ../index.php");
        // $row=$result->fetch_array();
        // $name=$row['Name'];
        // $gender=$row['Gender'];
        // $dob=$row['DOB'];
    }
    else {
        echo "error";
    }
}