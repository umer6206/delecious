<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin logIn</title>
</head>
<body>
    <?php
   
      $link = mysqli_connect("localhost","root","","restaurent");
      $_SESSION['login']=0;
      if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($link,$_POST['email']);
        $password = mysqli_real_escape_string($link,$_POST['password']);
        $select_data = "SELECT * FROM `admin` WHERE email = '$email'";
        $query = mysqli_query($link,$select_data);
        $email_count = mysqli_num_rows($query);
        if($email_count){
            $db_data = mysqli_fetch_assoc($query);
            $db_password = $db_data['password'];
            $_SESSION['db_name']=$db_data['name'];
            if($password===$db_password){
              setcookie('emailcookie',$email,time()+86400);
              setcookie('passwordcookie',$password,time()+86400);
              $_SESSION['login']=1;
              header('location:../admin/admin.php');
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
                alert("invalid email...");
            </script>
           <?php
        }
      }

   ?>
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../assets/img/img1.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" method="POST">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fa fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">K2 Restaurent</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example17" value="<?php if(isset($_COOKIE['emailcookie'])) echo $_COOKIE['emailcookie']?>" class="form-control form-control-lg" required />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" value="<?php if(isset($_COOKIE['passwordcookie'])) echo $_COOKIE['passwordcookie']?>" id="form2Example27" class="form-control form-control-lg" required />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" name="submit" type="submit">Login</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>