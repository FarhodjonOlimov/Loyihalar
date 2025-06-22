<?php
// Fayl: my_courses.php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'teacher') {
    header("Location: login.php");
    exit();
}

$teacher_id = $_SESSION["user_id"];
$courses = $conn->query("SELECT * FROM courses WHERE teacher_id = $teacher_id");

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Mening Kurslarim</h2>
    <table class="table">
        <thead>
            <tr><th>ID</th><th>Nomi</th><th>Ta'rif</th></tr>
        </thead>
        <tbody>
            <?php while ($c = $courses->fetch_assoc()): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= htmlspecialchars($c['title']) ?></td>
                    <td><?= htmlspecialchars($c['description']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>
