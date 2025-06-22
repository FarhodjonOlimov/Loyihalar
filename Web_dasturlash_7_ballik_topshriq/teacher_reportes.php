<?php
// Fayl: teacher_reports.php
session_start();
include("config.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: login.php");
    exit();
}

$teacher_id = $_SESSION['user_id'];
$results = $conn->query("SELECT r.*, u.name AS student_name, c.title AS course_title FROM results r JOIN users u ON r.student_id = u.id JOIN courses c ON r.course_id = c.id WHERE c.teacher_id = $teacher_id ORDER BY r.id DESC");
include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Talaba natijalari hisobotlari</h2>
    <table class="table table-bordered">
        <thead>
            <tr><th>Talaba</th><th>Kurs</th><th>Ball</th><th>Vaqt</th></tr>
        </thead>
        <tbody>
            <?php while ($row = $results->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['student_name']) ?></td>
                    <td><?= htmlspecialchars($row['course_title']) ?></td>
                    <td><?= $row['score'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>