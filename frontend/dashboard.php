<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.html?error=Please login first");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard - Southridge University</title>
  <link rel="stylesheet" href="css/styles.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(rgba(0, 38, 68, 0.85), rgba(0, 38, 68, 0.85)),
        url('images/campus.jpg') no-repeat center center/cover;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .form-section {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 90vh;
      padding: 1.5rem;
      box-sizing: border-box;
    }

    .form-card {
      background: #fff;
      padding: 2rem 2.5rem;
      border-radius: 12px;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 420px;
      animation: fadeInUp 0.6s ease;
      text-align: center;
    }

    .profile-pic {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 1rem;
      border: 3px solid #004080;
    }

    .enrolled-mark {
      display: inline-block;
      margin: 1rem 0;
      padding: 0.5rem 1.3rem;
      background: #28a745;
      color: #fff;
      font-weight: bold;
      border-radius: 20px;
      font-size: 0.95rem;
    }

    .student-info {
      text-align: left;
      margin-top: 1.5rem;
      font-size: 1rem;
    }

    .student-info p {
      margin: 0.6rem 0;
      padding: 0.6rem;
      border-bottom: 1px solid #eee;
    }

    .student-info strong {
      color: #004080;
      width: 150px;
      display: inline-block;
    }

    @media (max-width: 768px) {
      .form-card {
        max-width: 100%;
        margin: 0 1rem;
        padding: 1.8rem;
      }

      .profile-pic {
        width: 90px;
        height: 90px;
      }

      .student-info {
        font-size: 0.95rem;
      }

      .student-info strong {
        display: block;
        margin-bottom: 0.3rem;
        width: auto;
      }

      .student-info p {
        font-size: 0.9rem;
        padding: 0.4rem;
      }
    }

    @media (max-width: 480px) {
      .form-card {
        padding: 1.5rem;
        border-radius: 10px;
      }

      .enrolled-mark {
        font-size: 0.8rem;
        padding: 0.4rem 1rem;
      }

      h2 {
        font-size: 1.2rem;
      }

      p {
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <div class="logo-container">
      <a href="index.html" class="home-link">
        <img src="images/logo.png" alt="Southridge University Logo" class="logo">
        <h2>Southridge University</h2>
      </a>
    </div>

    <div class="hamburger">☰</div>

    <ul class="nav-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="../backend/logout.php">Logout</a></li>
    </ul>
  </nav>

  <section class="form-section">
    <div class="form-card">
      <img src="images/profile.jpg" alt="Default Profile" class="profile-pic">

      <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
      <p style="color: gray;">Student Dashboard</p>

      <span class="enrolled-mark">✔ Enrolled</span>

      <div class="student-info">
        <p><strong>Student ID:</strong> 2025-<?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <p><strong>Course:</strong> <?php echo isset($_SESSION['course']) ? htmlspecialchars($_SESSION['course']) : "Not set"; ?></p>
        <p><strong>Year Level:</strong> <?php echo isset($_SESSION['year_level']) ? htmlspecialchars($_SESSION['year_level']) : "Not set"; ?></p>
        <p><strong>Semester:</strong> <?php echo isset($_SESSION['semester']) ? htmlspecialchars($_SESSION['semester']) : "Not set"; ?></p>
      </div>
    </div>
  </section>

  <script src="js/messages.js"></script>
</body>
</html>
