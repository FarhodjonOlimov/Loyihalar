<?php
// Fayl: resurs_create.php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'teacher') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file = $_FILES['file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/resources/';
        $filename = basename($file['name']);
        $target = $upload_dir . time() . "_" . $filename;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        move_uploaded_file($file['tmp_name'], $target);

        $stmt = $conn->prepare("INSERT INTO resources (teacher_id, title, description, file_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $_SESSION['user_id'], $title, $description, $target);
        $stmt->execute();

        echo "<script>alert('Resurs muvaffaqiyatli yuklandi!'); window.location='dashboard.php';</script>";
        exit();
    } else {
        echo "<script>alert('Fayl yuklashda xatolik.');</script>";
    }
}

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Resurs yuklash</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Sarlavha</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Tavsif</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Fayl</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Yuklash</button>
    </form>
</div>
<?php include("templates/footer.php"); ?>