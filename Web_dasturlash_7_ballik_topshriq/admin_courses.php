<?php
// Fayl: admin_courses.php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Kurs o'chirish
if (isset($_GET['delete'])) {
    $delete_id = (int)$_GET['delete'];
    $conn->query("DELETE FROM courses WHERE id = $delete_id");
    header("Location: admin_courses.php");
    exit();
}

// Kurslar ro'yxati
$courses = $conn->query("SELECT courses.*, users.name AS teacher FROM courses JOIN users ON courses.teacher_id = users.id");

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Barcha kurslar</h2>
    <a href="course_create.php" class="btn btn-success mb-3">➕ Yangi kurs qo‘shish</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomi</th>
                <th>Ta'rif</th>
                <th>O'qituvchi</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($c = $courses->fetch_assoc()): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= htmlspecialchars($c['title']) ?></td>
                <td><?= htmlspecialchars($c['description']) ?></td>
                <td><?= htmlspecialchars($c['teacher']) ?></td>
                <td>
                    <a href="course_edit.php?id=<?= $c['id'] ?>" class="btn btn-warning btn-sm">✏ Tahrirlash</a>
                    <a href="?delete=<?= $c['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Kursni o‘chirmoqchimisiz?')">🗑 O‘chirish</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>
