<?php
$link = mysqli_connect("localhost","root","","restaurent");

if($link)
{
    echo "submitted your queries successfully";
}

$name2 = $_POST['name2'];
$email2 = $_POST['email2'];
$subject2 = $_POST['subject2'];
$message2 = $_POST['message2'];


$query = "insert into MessageBox values('$name2','$email2','$subject2','$message2')";

$run = mysqli_query($link,$query);

?>
