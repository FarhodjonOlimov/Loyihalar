<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'student') {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION["user_id"];

$results = $conn->query("
    SELECT r.*, c.title AS course_title
    FROM results r
    JOIN courses c ON r.course_id = c.id
    WHERE r.student_id = $student_id AND r.teacher_score IS NOT NULL
    ORDER BY r.created_at DESC
");

include("templates/header.php");
?>

<div class="container mt-5">
    <h2>Baholangan Test Natijalari</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kurs</th>
                <th>Avtomatik Ball</th>
                <th>O'qituvchi Balli</th>
                <th>Izoh</th>
                <th>Sana</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($results->num_rows > 0): ?>
                <?php while ($row = $results->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['course_title']) ?></td>
                        <td><?= $row['score'] ?> / <?= $row['total_questions'] ?></td>
                        <td><?= $row['teacher_score'] ?> / 100</td>
                        <td><?= nl2br(htmlspecialchars($row['teacher_feedback'])) ?></td>
                        <td><?= date("Y-m-d H:i", strtotime($row['created_at'])) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">Hozircha baholangan test natijalari yo‘q.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include("templates/footer.php"); ?>
