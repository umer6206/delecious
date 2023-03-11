<?php include 'links.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order menu</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/matankarahi.jpg" height="280px" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Matan Karahi</h5>
                            <p class="card-text">Price Rs 450</p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                            <input type="hidden" name="item_name" value="Matan karahi">
                            <input type="hidden" name="price" value="450">
                        </div>
                    </div>
                </form>
            </div> 
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/biryani.jpg"  class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Chicken Biryani</h5>
                            <p class="card-text">Price Rs 200</p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                            <input type="hidden" name="item_name" value="biryani">
                            <input type="hidden" name="price" value="200">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/chapalakabab.jpg" height="280px" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Chapapal kabab</h5>
                            <p class="card-text">Price Rs 200</p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                            <input type="hidden" name="item_name" value="chappal kabab">
                            <input type="hidden" name="price" value="150">
                        </div>
                    </div>
                </form>
            </div>  
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/sajji.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Balochi sajji</h5>
                            <p class="card-text">Price Rs 600</p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                            <input type="hidden" name="item_name" value="balochi sajji">
                            <input type="hidden" name="price" value="600">
                        </div>
                    </div>
                </form>
            </div>  
        </div>
        <div class="row mt-5">
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/karahi.jpg" height="200px" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">chicken Karahi</h5>
                            <p class="card-text">Price Rs 1200</p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                            <input type="hidden" name="item_name" value="chicken karahi">
                            <input type="hidden" name="price" value="1200">
                        </div>
                    </div>
                </form>
            </div> 
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/bun kabab.jpg" height="200px" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bun kabab</h5>
                            <p class="card-text">Price Rs 200</p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                            <input type="hidden" name="item_name" value="bun kabab">
                            <input type="hidden" name="price" value="200">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/nihari.jpg" height="200px" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Nihari</h5>
                            <p class="card-text">Price Rs 180</p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                            <input type="hidden" name="item_name" value="nihari">
                            <input type="hidden" name="price" value="180">
                        </div>
                    </div>
                </form>
            </div>  
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/qemawalanan.jpg" height="200px" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Qeemawala nan</h5>
                            <p class="card-text">Price Rs 100</p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                            <input type="hidden" name="item_name" value="Qeemawala nan">
                            <input type="hidden" name="price" value="100">
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</body>

</html>