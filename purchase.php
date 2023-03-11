<?php
session_start();
 $link = mysqli_connect("localhost","root","","restaurent");

 if($link)
 {
     if(isset($_POST['purchase'])){
         $uname = $_POST['name'];
         $phone = $_POST['phone'];
         $address = $_POST['address'];
         $mod = $_POST['mod'];
         $query1 = "insert into manage_order (full_name,phone,address,payment_mod) values('$uname','$phone','$address','$mod')";
         $run = mysqli_query($link,$query1);
         if($run){
             $order_id = mysqli_insert_id($link);
             $query2 =  "INSERT INTO `user-orders`(`order_id`, `item_name`, `phone`, `quantity`) VALUES (?,?,?,?)";
             $stmt = mysqli_prepare($link,$query2);
             if($stmt){
                 mysqli_stmt_bind_param($stmt,"isii",$order_id,$item_name,$price,$quantity);
                 foreach($_SESSION['cart'] as $key=>$values){
                     $item_name=$values['item_name'];
                     $price = $values['price'];
                     $quantity = $values['quantity'];
                     mysqli_stmt_execute($stmt);
                 }
                 unset($_SESSION['cart']);
                 echo "<script>
                    alert('order placed succcessfully');
                    window.location.href='ordermenu.php';
                    </script>";
             }else{
                 echo "<script>
                    alert('sql prepare error');
                    window.location.href='mycart.php';
                    </script>";

             }
         }
     }
 }else{
     echo "error in connecting database";
 }
?>