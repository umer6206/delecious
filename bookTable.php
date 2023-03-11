<?php
$link = mysqli_connect("localhost","root","","restaurent");

if($link)
{
    echo "submitted your queries successfully";
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$people = $_POST['people'];
$message = $_POST['message'];


$query = "insert into booktable values('$name','$email','$phone','$date','$time','$people','$message')";
$run = mysqli_query($link,$query);

?>
