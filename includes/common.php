<?php
$con = mysqli_connect("db", "ecommerce_user", "password", "ecommerce");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
