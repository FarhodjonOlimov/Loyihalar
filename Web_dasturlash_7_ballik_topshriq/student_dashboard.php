<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'student') {
    header("Location: login.php");
    exit();
}

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Talaba Paneli</h2>
    <p>Xush kelibsiz! Siz kurslarga yozilishingiz, test ishlashingiz va natijalaringizni ko‘rishingiz mumkin.</p>

    <ul>
        <li><a href="view_courses.php">Kurslar ro‘yxati</a></li>
        <li><a href="quiz.php">Test ishlash</a></li>
        <li><a href="my_results.php">Natijalarni ko‘rish</a></li>
    </ul>
</div>
<?php include("templates/footer.php"); ?>
