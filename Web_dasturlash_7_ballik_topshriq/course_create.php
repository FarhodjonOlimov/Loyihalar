<?php
// Fayl: course_manage.php
session_start();
include("config.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Kurs ma'lumotlari
$edit_mode = false;
$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($course_id) {
    $edit_mode = true;
    $course = $conn->query("SELECT * FROM courses WHERE id = $course_id")->fetch_assoc();
    if (!$course) {
        echo "Kurs topilmadi.";
        exit();
    }
}

// POST orqali saqlash
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $teacher_id = (int)$_POST['teacher_id'];

    if ($edit_mode) {
        $stmt = $conn->prepare("UPDATE courses SET title = ?, description = ?, teacher_id = ? WHERE id = ?");
        $stmt->bind_param("ssii", $title, $description, $teacher_id, $course_id);
    } else {
        $stmt = $conn->prepare("INSERT INTO courses (title, description, teacher_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $title, $description, $teacher_id);
    }
    $stmt->execute();
    header("Location: admin_courses.php");
    exit();
}

$teachers = $conn->query("SELECT id, name FROM users WHERE role = 'teacher'");

include("templates/header.php");
?>
<div class="container mt-5">
    <h2><?= $edit_mode ? 'Kursni tahrirlash' : 'Yangi kurs qo‘shish' ?></h2>
    <form method="POST">
        <div class="mb-3">
            <label>Kurs nomi:</label>
            <input type="text" name="title" class="form-control" required value="<?= $edit_mode ? htmlspecialchars($course['title']) : '' ?>">
        </div>
        <div class="mb-3">
            <label>Ta'rifi:</label>
            <textarea name="description" class="form-control" required><?= $edit_mode ? htmlspecialchars($course['description']) : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label>O'qituvchini tanlang:</label>
            <select name="teacher_id" class="form-control" required>
                <?php while ($t = $teachers->fetch_assoc()): ?>
                    <option value="<?= $t['id'] ?>" <?= $edit_mode && $t['id'] == $course['teacher_id'] ? 'selected' : '' ?>><?= htmlspecialchars($t['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button class="btn btn-primary"><?= $edit_mode ? 'Yangilash' : 'Saqlash' ?></button>
    </form>
</div>
<?php include("templates/footer.php"); ?>
