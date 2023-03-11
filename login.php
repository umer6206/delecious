<?php
  session_start();

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <?php
    include 'dbconnection.php';
    $_SESSION['login']='no';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email_search = " select* from registration where email='$email'";
        $query = mysqli_query($con,$email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count){
            $email_password = mysqli_fetch_assoc($query);//this fetch all the coloumn realated to variable $query
            $dbpassword = $email_password['password'];

            $_SESSION['username']=$email_password['name'];

            $pass_decode = password_verify($password,$dbpassword);
            if($pass_decode){
                if(isset($_POST['remember'])){
                    setcookie('emailcookie',$email,time()+86400);
                    setcookie('passwordcookie',$password,time()+86400);
                }
                ?>
                <script>
                    alert("log in successfully to <?php echo $_SESSION['username'] ?>");
                  
                </script>
                  <?php
                    $_SESSION['login']='yes';
                    header('location:admin.php');
                    ?>
                <?php
            }else{
                ?>
                <script>
                    alert("incorrect password");
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("invalid email");
                </script>
                <?php
            
        }
    }
    ?>
    <div class=" mx-auto mt-5">
        <div class="text-center">
            <h3 class="pt-4 text-capitalize">create account</h3>
            <p>Get started with your free account</p>
        </div>
        <div class="container-fluid">
        <div class="input-group mb-3 mx-auto input-group-sm ">
                <a href="" class="btn btn-danger rounded py-2 text-bold form-control"><i class="fa fa-google mr-2"></i>login
                    with Gmail</a>
            </div>
            <div class="input-group mb-3 mx-auto input-group-sm">
                <a href="" class="btn btn-primary rounded py-2 form-control"><i class="fa fa-facebook"></i>login with Facebook</a>
            </div>

            <div class="divider-text">
                <span class="bg-light">OR</span>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <div class="input-group mb-3 mx-auto input-group-sm">
                    <span class="input-group-text py-2 "><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <input type="text" name="email" placeholder="Email ID" 
                           class="form-control py-2" value="<?php if(isset($_COOKIE['emailcookie'])){
                               echo $_COOKIE['emailcookie'];
                           } ?>" autocomplete="off" required>
                </div>
               

                <div class="input-group mb-3 mx-auto input-group-sm">
                    <span class="input-group-text py-2 "><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input type="password" name="password" placeholder="Enter password"
                    value="<?php if(isset($_COOKIE['passwordcookie'])){
                               echo $_COOKIE['passwordcookie'];
                           } ?>"
                      class="form-control py-2" autocomplete="off" required>
                </div>

                <div class=" mb-3 input-group-sm">
                    <input type="checkbox" class="mx-2" name="remember">Remember Me
                </div>

                <div class="input-group mb-3 mx-auto input-group-sm">
                    <input type="submit" name="submit" value="Login Now" class="btn rounded btn-primary mb-2 p-2 form-control">
                </div>
                <div>
                    <p class="text-center h5"><a style="text-decoration: none;" href=""><span class="h5">forgot password?</span></a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>