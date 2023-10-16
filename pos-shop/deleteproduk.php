<?php
    include('../db/connect.php');
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        $sql2 = "SELECT * FROM products WHERE id=$id";
        $result2 = mysqli_query($con,$sql2);
        $data = mysqli_fetch_assoc($result2);

        unlink("../assets/images/pos-shop/".$data['image']);

        $sql = "DELETE FROM products where id=$id";
        $result = mysqli_query($con,$sql);

        if ($result) {
            header("location:produk.php");
        }else {
            die(mysqli_error($con));
        }
    }
?>