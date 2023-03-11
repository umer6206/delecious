<?php
$link = mysqli_connect("localhost", "root", "", "restaurent") or die("db connection failed");
$delid = $_GET['delid'];

$deletequery = "DELETE FROM `admin` WHERE id = {$delid}";
$result = mysqli_query($link,$deletequery) or die("query failed to run");

if($result){
    ?>
    <script>
        alert("deleted successfully");
        window.location.href = 'admin.php';
    </script>
    <?php
}else{
    ?>
    <script>
        alert(" not deleted");
    </script>
    <?php
}


?>