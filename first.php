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
    include "dbconnection.php";
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($con, $_POST['user']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $emailquery = " select* from registration where email='$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
    ?>
            <script>
                alert("email already exist");
            </script>
            <?php
        } else {
            if ($password === $cpassword) {
                $insertquery = "insert into registration(name, email, phone, password, cpassword)
                                   values('$username','$email','$phone','$pass','$cpass')";
                $iquery = mysqli_query($con, $insertquery);
                if ($iquery) {
            ?>
                    <script>
                        alert("admin created successfully");
                    </script>
                <?php
                header('location:login.php');
                } else {
                ?>
                    <script>
                        alert("not inserted");
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("password not matching");
                </script>
    <?php
            }
        }
    }

    ?>

    <div class=" mx-auto mt-1">
        <div class="text-center">
            <h3 class="pt-3 text-capitalize">create account</h3>
            <p>Get started with your free account</p>
        </div>
        <div class="container-fluid ">
            <div class="input-group mb-3 mx-auto input-group-sm ">
                <a href="" class="btn btn-danger rounded py-2 h5 form-control"><i class="fa fa-google mr-2"></i>login
                    with Gmail</a>
            </div>
            <div class="input-group mb-3 mx-auto input-group-sm">
                <a href="" class="btn btn-primary rounded py-2 form-control"><i class="fa fa-facebook"></i>login with Facebook</a>
            </div>

            <div class="divider-text">
                <span class="bg-light">OR</span>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="input-group mb-1 mx-auto input-group-sm">
                    <span class="input-group-text py-2 "><i class="fa fa-user"></i></span>
                    <input type="text" name="user" placeholder="Enter your Name" class="form-control py-2" required>
                </div>
                <div class="input-group mb-1 mx-auto input-group-sm">
                    <span class="input-group-text py-2 "><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <input type="text" name="email" placeholder="Enter your email " class="form-control py-2" autocomplete="off" required>
                </div>
                <div class="input-group mb-1 mx-auto input-group-sm">
                    <span class="input-group-text py-2 "><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <input type="number" name="phone" placeholder="Enter your phone" class="form-control py-2" required>
                </div>
                <div class="input-group mb-1 mx-auto input-group-sm">
                    <span class="input-group-text py-2 "><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input type="password" name="password" placeholder="Enter your password" class="form-control py-2" autocomplete="off" required>
                </div>
                <div class="input-group mb-1 mx-auto input-group-sm">
                    <span class="input-group-text py-2 "><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input type="password" name="cpassword" placeholder="confirm password " class="form-control py-2" autocomplete="off" required>
                </div>
                <div class="input-group mb-3 mx-auto input-group-sm">
                    <input type="submit" name="submit" value="Create Account" class="btn rounded btn-primary mb-2 p-2 form-control">
                </div>
                <div>
                    <p class="text-center h5 pb-4">Have an account?<a style="text-decoration: none;" href="login.php"><span class="h4">log in</span></a></p>
                </div>
            </form>
        </div>
    </div>


</body>

</html>