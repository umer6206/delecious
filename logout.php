<?php
session_start();
session_destroy();
setcookie('emailcookie','',time()-86400);
setcookie('passwordcookie','',time()-86400);
?>
<script>
    alert("logout successfully");
    window.location.href='../home.php';
</script>
<?php
?>

