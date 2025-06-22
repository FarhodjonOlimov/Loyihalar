<?php
session_start();
include("config.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: login.php");
    exit();
}

$teacher_id = intval($_SESSION['user_id']);

// Bahoni yangilash
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_score'])) {
    $result_id = intval($_POST['result_id']);
    $score = intval($_POST['score']);
    $feedback = trim($_POST['feedback']);

    if ($score >= 0 && $score <= 100) {
        $stmt = $conn->prepare("UPDATE results SET teacher_score = ?, teacher_feedback = ? WHERE id = ?");
        $stmt->bind_param("isi", $score, $feedback, $result_id);
        $stmt->execute();
    }
    header("Location: review_results.php");
    exit();
}

// Natijani o‘chirish
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM results WHERE id = $delete_id");
    header("Location: review_results.php");
    exit();
}

// Barcha natijalarni olish
$query = "
    SELECT r.id, r.student_id, r.course_id, r.score, r.teacher_score, r.teacher_feedback, r.created_at,
           u.name AS student_name,
           c.title AS course_title
    FROM results r
    JOIN users u ON r.student_id = u.id
    JOIN courses c ON r.course_id = c.id
    WHERE c.teacher_id = $teacher_id
    ORDER BY r.created_at DESC
";
$results = $conn->query($query);

include("templates/header.php");
?>

<div class="container mt-5">
    <h2>Testlarni Baholash</h2>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Talaba</th>
                <th>Kurs</th>
                <th>Joriy Ball</th>
                <th>Baholangan Ball</th>
                <th>Fikr</th>
                <th>Vaqt</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($results && $results->num_rows > 0): ?>
            <?php while ($row = $results->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['student_name']) ?></td>
                    <td><?= htmlspecialchars($row['course_title']) ?></td>
                    <td><?= $row['score'] ?? '-' ?></td>
                    <td><?= $row['teacher_score'] ?? '-' ?></td>
                    <td><?= htmlspecialchars($row['teacher_feedback']) ?? '-' ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <!-- Baholash -->
                        <form method="POST" class="d-inline-block">
                            <input type="hidden" name="result_id" value="<?= $row['id'] ?>">
                            <input type="number" name="score" value="<?= $row['teacher_score'] ?>" min="0" max="100" class="form-control mb-1" style="width: 80px;" required>
                            <textarea name="feedback" class="form-control mb-1" placeholder="Fikr..."><?= htmlspecialchars($row['teacher_feedback']) ?></textarea>
                            <button class="btn btn-success btn-sm w-100" name="update_score">✅ Saqlash</button>
                        </form>

                        <!-- O‘chirish -->
                        <a href="review_results.php?delete_id=<?= $row['id'] ?>" class="btn btn-danger btn-sm w-100 mt-1" onclick="return confirm('Natijani o‘chirishga ishonchingiz komilmi?')">🗑️ O‘chirish</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7" class="text-center">Hech qanday test natijasi topilmadi.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include("templates/footer.php"); ?>
