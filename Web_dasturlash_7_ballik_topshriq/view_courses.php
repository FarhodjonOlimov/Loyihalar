<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'student') {
    header("Location: login.php");
    exit();
}

$courses = $conn->query("SELECT * FROM courses");

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Kurslar ro‘yxati</h2>
    <ul class="list-group">
        <?php while ($row = $courses->fetch_assoc()): ?>
            <li class="list-group-item">
                <strong><?= htmlspecialchars($row['title']) ?></strong><br>
                <?= htmlspecialchars($row['description']) ?>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<?php include("templates/footer.php"); ?>
