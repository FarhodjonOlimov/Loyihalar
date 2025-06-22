<?php
// Fayl: teacher_ca.php
session_start();
include("config.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: login.php");
    exit();
}

$teacher_id = $_SESSION['user_id'];
$cas = $conn->query("SELECT ca.*, u.name AS student_name, c.title AS course_title FROM ca LEFT JOIN users u ON ca.student_id = u.id LEFT JOIN courses c ON ca.course_id = c.id WHERE ca.teacher_id = $teacher_id ORDER BY ca.id DESC");
include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Oraliq Nazorat Natijalari</h2>
    <table class="table table-bordered">
        <thead>
            <tr><th>Talaba</th><th>Kurs</th><th>Ball</th><th>Izoh</th><th>Sana</th></tr>
        </thead>
        <tbody>
            <?php while ($row = $cas->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['student_name']) ?></td>
                    <td><?= htmlspecialchars($row['course_title']) ?></td>
                    <td><?= $row['score'] ?></td>
                    <td><?= htmlspecialchars($row['comment']) ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>
