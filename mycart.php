<?php
include 'links.php';
// session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my cart</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center border bg-light rounded ">MY ORDERS</h1>
            </div>
            <div class="col-lg-9">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">serial no</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                                echo "
                                    <tr>
                                    <td>$sr</td>
                                    <td>$value[item_name]</td>
                                    <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
                                    <td>
                                    <form action='manage_cart.php' method='POST' >
                                       <input type='number' class='text-center iquantity' name='mod_quantity' onchange='this.form.submit()' value='$value[quantity]' min='1' max='10'>
                                       <input type='hidden' name='item_name' value='$value[item_name]'>
                                       </form>
                                       </td>
                                    <td class='itotal'></td>
                                    <td>
                                    <form action='manage_cart.php' method='POST' >
                                        <button name='remove_cart' class='btn btn-sm btn-outline-danger'>REMOVE</button></td>
                                        <input type='hidden' name='item_name' value='$value[item_name]'>
                                    </form>
                                    </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">
                    <h4>Grand Total</h4>
                    <h4 class="text-center" id="gtotal"></h4>
                    <br><br>
                    <?php
                    if (isset($_SESSION['cart'])  && count($_SESSION['cart']) > 0) {


                    ?>
                        <form action="purchase.php" method="POST">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" value="COD" name="mod" id="flexRadioDefault1" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cash on delivery
                                </label>
                            </div>
                            <br>

                            <button class="btn btn-primary btn-block" name="purchase">Make purchase</button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var grand_total = document.getElementById('gtotal');

        function subtotal() {
            gt = 0;
            for (i = 0; i < iquantity.length; i++) {

                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }
            grand_total.innerText = gt;
        }
        subtotal();
    </script>
</body>

</html>