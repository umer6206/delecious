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
    <title>admin details</title>
    <style>
        td,th {
            border-left: 1px solid white;
        }

        .fa {
            cursor: pointer;
            color: white;
        }

        .fa-trash:hover {
            color: red;
        }

        .fa-edit:hover {
            color: greenyellow;
        }
    </style>
</head>

<body>
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
    <table class="table mt-5 container bg-dark text-white">
        <thead class="text-center">
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>password</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $link = mysqli_connect("localhost", "root", "", "restaurent");
            $query = "SELECT * FROM `admin`";
            $user_result = mysqli_query($link, $query);

            while ($user_array = mysqli_fetch_array($user_result)) {
            ?>
                <tr>
                    <td><?php echo $user_array['name'] ?></td>
                    <td><?php echo $user_array['email'] ?></td>
                    <td><?php echo $user_array['password'] ?></td>
                    <td><a href='update.php? upid=<?php echo $user_array['id'];?>'><i class='fa fa-edit' title="edit"></i></a></td>
                    <td><a href='delete.php? delid=<?php echo $user_array['id'];?>'><i class='fa fa-trash' title="delete"></i></a></td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</body>

</html>