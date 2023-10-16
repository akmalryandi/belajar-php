<?php
    $con=new mysqli("localhost","root","","pos_shop");

    if (!$con) {
        die(mysqli_error($con));
    }
?>