<?php
// Fayl: assign_course.php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Kurs biriktirish
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = (int)$_POST['course_id'];
    $teacher_id = (int)$_POST['teacher_id'];

    $stmt = $conn->prepare("UPDATE courses SET teacher_id = ? WHERE id = ?");
    $stmt->bind_param("ii", $teacher_id, $course_id);
    $stmt->execute();
    $success = "Kurs muvaffaqiyatli biriktirildi.";
}

// Ma'lumotlar
$courses = $conn->query("SELECT id, title FROM courses");
$teachers = $conn->query("SELECT id, name FROM users WHERE role = 'teacher'");

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Kursni o‘qituvchiga biriktirish</h2>
    <?php if (!empty($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Kurs:</label>
            <select name="course_id" class="form-control" required>
                <?php while ($c = $courses->fetch_assoc()): ?>
                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['title']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>O‘qituvchi:</label>
            <select name="teacher_id" class="form-control" required>
                <?php while ($t = $teachers->fetch_assoc()): ?>
                    <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button class="btn btn-primary">Biriktirish</button>
    </form>
</div>
<?php include("templates/footer.php"); ?>
