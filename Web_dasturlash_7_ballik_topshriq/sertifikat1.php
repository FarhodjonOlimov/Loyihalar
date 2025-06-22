<?php
// Fayl: eligible_certificates.php
session_start();
include("config.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Misol uchun: kursni 80% dan yuqori baho bilan tugatgan foydalanuvchilar
$query = "SELECT u.name, u.email, c.title AS course_title, r.score
          FROM results r
          JOIN users u ON r.student_id = u.id
          JOIN courses c ON r.course_id = c.id
          WHERE r.score >= 80";

$eligible = $conn->query($query);

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Sertifikatga loyiq foydalanuvchilar</h2>
    <table class="table table-bordered">
        <thead><tr><th>Ism</th><th>Email</th><th>Kurs</th><th>Ball</th></tr></thead>
        <tbody>
            <?php while ($row = $eligible->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['course_title']) ?></td>
                    <td><?= $row['score'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>
