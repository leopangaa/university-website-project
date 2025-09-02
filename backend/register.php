<?php
session_start();
require "db.php";

mysqli_set_charset($conn, "utf8mb4");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $course = trim($_POST['course']);
    $year_level = isset($_POST['year']) ? intval($_POST['year']) : 0;

    if (empty($name) || empty($email) || empty($password) || empty($course) || $year_level <= 0) {
        header("Location: ../frontend/register.html?error=Please fill all fields correctly");
        exit();
    }

    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        header("Location: ../frontend/register.html?error=Email already registered");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, course, year_level, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssi", $name, $email, $hashedPassword, $course, $year_level);

    if ($stmt->execute()) {
        header("Location: ../frontend/login.html?success=Account created, please login");
        exit();
    } else {
        header("Location: ../frontend/register.html?error=Something went wrong, try again");
        exit();
    }
}
?>
