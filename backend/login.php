<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // Save session data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['course'] = $user['course'];
            $_SESSION['year_level'] = $user['year_level'];
            $_SESSION['semester'] = "1st Semester 2025-2026";

            header("Location: ../frontend/dashboard.php");
            exit();
        } else {
            header("Location: ../frontend/login.html?error=Invalid password");
            exit();
        }
    } else {
        header("Location: ../frontend/login.html?error=Email not found");
        exit();
    }
}
?>
