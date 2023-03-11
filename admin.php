<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == 0) {
?>
    <script>
        window.location.href = '../admincreate/adminlogin.php';
    </script>

<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>admin</title>
</head>
<style>
    .main_divv{
        background: white;
        display:flex;
        width: 100%;
        height: 100vh;
        align-items: center;
        justify-content: center;
        position: fixed;
        z-index: 99999;
    }
    .loader {
        
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid blue;
        border-right: 16px solid green;
        border-bottom: 16px solid red;
        border-left: 16px solid pink;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<body onload="myfunction()">
    <div class="main_divv" id="preload">
        <div class="loader"></div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                </ul>
                <form class="d-flex" action="../admincreate/admincreate.php" method="POST">
                    <button class="btn btn-outline-danger mx-2" type="submit">Add Admin</button>
                </form>
                <form class="d-flex" action="../admincreate/logout.php" method="POST">
                    <button class="btn btn-outline-success mx-2" type="submit">log out</button>
                </form>
                <div>
                    <a href="show_admin.php" class="btn btn-outline-warning">admin</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="text-center">
        <h3>
            Welcome <span class="text-warning"><?php echo $_SESSION['db_name'];  ?></span> 
        </h3>
    </div>
    <table class="table mt-5 container bg-dark text-white">
        <thead class="text-center">
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Full Name</th>
                <th scope="col">phone</th>
                <th scope="col">Address</th>
                <th scope="col">payment_mod</th>
                <th scope="col">Orders</th>

            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $link = mysqli_connect("localhost", "root", "", "restaurent");
            $query = "SELECT * FROM `manage_order`";
            $user_result = mysqli_query($link, $query);

            while ($user_array = mysqli_fetch_array($user_result)) {
                echo "
                <tr>
                  <td>$user_array[order_id]</td>
                  <td>$user_array[full_name]</td>
                  <td>$user_array[phone]</td>
                  <td>$user_array[address]</td>
                  <td>$user_array[payment_mod]</td>
                  <td>
                    <table class='table container bg-dark text-white'>
                        <thead class='text-center'>
                            <tr>
                                <th scope='col'>Item Name</th>
                                <th scope='col'>Price</th>
                                <th scope='col'>Quantity</th>
                            </tr>
                        </thead>
                            <tbody class='text-center'>
                            ";
                $query2 = "SELECT * FROM `user-orders` where order_id ='$user_array[order_id]'";
                $user_query = mysqli_query($link, $query2);
                while ($user_fetch = mysqli_fetch_array($user_query)) {
                    echo "
                                      <tr>
                                         <td>$user_fetch[item_name]</td>
                                         <td>$user_fetch[phone]</td>
                                         <td>$user_fetch[quantity]</td>
                                      </tr>
                                    ";
                }
                echo "
                            </tbody>
                        </table>
                  </td>
               </tr>
                ";
            }

            ?>

        </tbody>
    </table>

    <script>
        var preloader = document.getElementById('preload');

        function myfunction(){
            preloader.style.display='none';
        }
    </script>
</body>

</html>