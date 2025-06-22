<?php
// Fayl: issued_certificates.php
session_start();
include("config.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Sertifikat berilgan foydalanuvchilar
$query = "SELECT sc.id, u.name, u.email, c.title AS course_title, sc.issued_at 
          FROM student_certificates sc
          JOIN users u ON sc.student_id = u.id
          JOIN courses c ON sc.course_id = c.id
          ORDER BY sc.issued_at DESC";

$certs = $conn->query($query);

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Berilgan sertifikatlar</h2>
    <table class="table table-striped">
        <thead><tr><th>Ism</th><th>Email</th><th>Kurs</th><th>Berilgan sana</th></tr></thead>
        <tbody>
            <?php while ($row = $certs->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['course_title']) ?></td>
                    <td><?= $row['issued_at'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>
