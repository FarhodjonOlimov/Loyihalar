<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'teacher') {
    header("Location: login.php");
    exit();
}

$success = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $teacher_id = $_SESSION["user_id"];

    $stmt = $conn->prepare("INSERT INTO courses (title, description, teacher_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $description, $teacher_id);
    $stmt->execute();

    $success = "Kurs muvaffaqiyatli yaratildi!";
}
?>

<?php include("templates/header.php"); ?>
<div class="container mt-5">
    <h2>Yangi kurs yaratish</h2>
    <?php if ($success): ?><div class="alert alert-success"><?= $success ?></div><?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Kurs nomi</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tavsif</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button class="btn btn-primary">Yaratish</button>
    </form>
</div>
<?php include("templates/footer.php"); ?>
