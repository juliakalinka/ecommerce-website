<?php
require("includes/common.php");
session_start();

// Перевірка, чи передані дані з форми
if (!isset($_POST['lemail']) || !isset($_POST['lpassword'])) {
    $m = "Please enter both E-mail and Password.";
    header('location: index.php?errorl=' . urlencode($m));
    exit();
}

// Очищення введених даних
$email = mysqli_real_escape_string($con, $_POST['lemail']);
$password = mysqli_real_escape_string($con, $_POST['lpassword']);
$password = md5($password); // Хешування пароля MD5

// SQL-запит для перевірки користувача
$query = "SELECT id, email_id FROM users WHERE email_id = '$email' AND password = '$password'";
$result = mysqli_query($con, $query);

// Перевірка виконання SQL-запиту
if (!$result) {
    die("Database query failed: " . mysqli_error($con));
}

// Перевірка, чи знайдений користувач
if (mysqli_num_rows($result) === 0) {
    $m = "Please enter correct E-mail id and Password.";
    header('location: index.php?errorl=' . urlencode($m));
    exit();
}

// Отримання даних користувача
$row = mysqli_fetch_array($result);
$_SESSION['email'] = $row['email_id'];
$_SESSION['user_id'] = $row['id'];

// Перенаправлення на сторінку з продуктами
header('location: products.php');
exit();
?>
