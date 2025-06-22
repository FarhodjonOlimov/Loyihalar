<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'teacher') {
    header("Location: login.php");
    exit();
}

$success = "";
$courses = $conn->query("SELECT * FROM courses WHERE teacher_id = " . $_SESSION["user_id"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $course_id = $_POST["course_id"];
    $question = $_POST["question"];
    $option1 = $_POST["option1"];
    $option2 = $_POST["option2"];
    $option3 = $_POST["option3"];
    $option4 = $_POST["option4"];
    $correct_option = $_POST["correct_option"];

    $stmt = $conn->prepare("INSERT INTO questions (course_id, question, option1, option2, option3, option4, correct_option) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssi", $course_id, $question, $option1, $option2, $option3, $option4, $correct_option);
    $stmt->execute();

    $success = "Savol muvaffaqiyatli qo‘shildi!";
}
?>

<?php include("templates/header.php"); ?>
<div class="container mt-5">
    <h2>Test savoli qo‘shish</h2>
    <?php if ($success): ?><div class="alert alert-success"><?= $success ?></div><?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Kursni tanlang:</label>
            <select name="course_id" class="form-control" required>
                <?php while ($c = $courses->fetch_assoc()): ?>
                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['title']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Savol matni:</label>
            <input type="text" name="question" class="form-control" required>
        </div>
        <?php for ($i = 1; $i <= 4; $i++): ?>
            <div class="mb-3">
                <label>Variant <?= $i ?>:</label>
                <input type="text" name="option<?= $i ?>" class="form-control" required>
            </div>
        <?php endfor; ?>
        <div class="mb-3">
            <label>To‘g‘ri javob (1-4):</label>
            <input type="number" name="correct_option" min="1" max="4" class="form-control" required>
        </div>
        <button class="btn btn-success">Qo‘shish</button>
    </form>
</div>
<?php include("templates/footer.php"); ?>
