<?php
// Fayl: admin_questions.php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Savol o'chirish
if (isset($_GET['delete'])) {
    $delete_id = (int)$_GET['delete'];
    $conn->query("DELETE FROM questions WHERE id = $delete_id");
    header("Location: admin_questions.php");
    exit();
}

// Barcha savollarni olish
$questions = $conn->query("SELECT questions.*, courses.title AS course_title FROM questions JOIN courses ON questions.course_id = courses.id");
include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Barcha test savollari</h2>
    <a href="question_create.php" class="btn btn-primary mb-3">➕ Yangi savol qo‘shish</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Savol</th>
                <th>Kurs</th>
                <th>To‘g‘ri javob</th>
                <th>Amal</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($q = $questions->fetch_assoc()): ?>
            <tr>
                <td><?= $q['id'] ?></td>
                <td><?= htmlspecialchars($q['question']) ?></td>
                <td><?= htmlspecialchars($q['course_title']) ?></td>
                <td><?= htmlspecialchars($q['option' . $q['correct_option']]) ?></td>
                <td>
                    <a href="?delete=<?= $q['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ushbu savolni o‘chirmoqchimisiz?')">🗑 O‘chirish</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>
