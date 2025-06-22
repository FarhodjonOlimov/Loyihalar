<?php
// Fayl: view_statistics.php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || ($_SESSION["role"] !== 'admin' && $_SESSION["role"] !== 'teacher')) {
    header("Location: login.php");
    exit();
}

// Statistika ma'lumotlari
$user_count = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$student_count = $conn->query("SELECT COUNT(*) AS total FROM users WHERE role = 'student'")->fetch_assoc()['total'];
$teacher_count = $conn->query("SELECT COUNT(*) AS total FROM users WHERE role = 'teacher'")->fetch_assoc()['total'];
$course_count = $conn->query("SELECT COUNT(*) AS total FROM courses")->fetch_assoc()['total'];
$test_count = $conn->query("SELECT COUNT(*) AS total FROM questions")->fetch_assoc()['total'];
$submitted_tests = $conn->query("SELECT COUNT(*) AS total FROM results")->fetch_assoc()['total'];
$avg_score = $conn->query("SELECT AVG(score) AS avg FROM results")->fetch_assoc()['avg'];

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Statistik Ma'lumotlar</h2>
    <ul class="list-group">
        <li class="list-group-item">Foydalanuvchilar soni: <strong><?= $user_count ?></strong></li>
        <li class="list-group-item">Talabalar soni: <strong><?= $student_count ?></strong></li>
        <li class="list-group-item">O'qituvchilar soni: <strong><?= $teacher_count ?></strong></li>
        <li class="list-group-item">Kurslar soni: <strong><?= $course_count ?></strong></li>
        <li class="list-group-item">Umumiy test savollari: <strong><?= $test_count ?></strong></li>
        <li class="list-group-item">Yuborilgan testlar soni: <strong><?= $submitted_tests ?></strong></li>
        <li class="list-group-item">O'rtacha ball: <strong><?= round($avg_score, 2) ?></strong></li>
    </ul>
</div>
<?php include("templates/footer.php"); ?>
