<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'teacher') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$error = "";

// Avatar yuklash
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["avatar"])) {
    $file = $_FILES["avatar"];
    $targetDir = "uploads/avatars/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
    $filename = "teacher_" . $user_id . "_" . time() . "." . $ext;
    $targetFile = $targetDir . $filename;

    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array(strtolower($ext), $allowed)) {
        $error = "Faqat JPG, PNG, JPEG yoki GIF fayllar yuklash mumkin!";
    } elseif ($file["size"] > 2 * 1024 * 1024) {
        $error = "Rasm hajmi 2MB dan oshmasligi kerak.";
    } elseif (move_uploaded_file($file["tmp_name"], $targetFile)) {
        $conn->query("UPDATE users SET avatar = '$targetFile' WHERE id = $user_id");
        header("Location: teacher_panel.php");
        exit();
    } else {
        $error = "Rasmni yuklashda xatolik yuz berdi.";
    }
}

// Avatar o‘chirish
if (isset($_GET['delete_avatar']) && $_GET['delete_avatar'] == '1') {
    $user = $conn->query("SELECT avatar FROM users WHERE id = $user_id")->fetch_assoc();
    if (!empty($user['avatar']) && file_exists($user['avatar'])) {
        unlink($user['avatar']);
    }
    $conn->query("UPDATE users SET avatar = NULL WHERE id = $user_id");
    header("Location: teacher_panel.php");
    exit();
}

$user = $conn->query("SELECT name, avatar FROM users WHERE id = $user_id")->fetch_assoc();

include("templates/header.php");
?>

<div class="container mt-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-4 text-center">
            <img src="<?= $user['avatar'] ? htmlspecialchars($user['avatar']) : 'default_avatar.png' ?>" width="200" height="200" class="rounded-circle shadow-sm border border-3 border-primary">
        </div>
        <div class="col-md-8">
            <h3 class="mb-3 text-primary"><?= htmlspecialchars($user['name']) ?> <small class="text-muted">– O‘qituvchi</small></h3>

            <?php if (!$user['avatar']): ?>
                <form method="POST" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
                    <input type="file" name="avatar" accept="image/*" class="form-control" style="max-width: 300px;" required>
                    <button class="btn btn-primary btn-sm">Rasmni yuklash</button>
                </form>
            <?php else: ?>
                <a href="?delete_avatar=1" class="btn btn-outline-danger btn-sm">Rasmni o‘chirish</a>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">🛠 O‘qituvchi Paneli</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="my_course.php" class="text-decoration-none">📘 Biriktirilgan kurslar</a></li>
            <li class="list-group-item"><a href="create_question.php" class="text-decoration-none">➕ Test savollari qo‘shish</a></li>
            <li class="list-group-item"><a href="review_results.php" class="text-decoration-none">✅ Testlarni baholash</a></li>
            <li class="list-group-item"><a href="resurs_create.php" class="text-decoration-none">📤 Resurslarni yuklash</a></li>
            <li class="list-group-item"><a href="hisobot.php" class="text-decoration-none">📊 Hisobotlar</a></li>
            <li class="list-group-item"><a href="chat.php" class="text-decoration-none">💬 Chat</a></li>
            <li class="list-group-item"><a href="teacher_reportes.php" class="text-decoration-none">📄 Hisobotlarni ko‘rish</a></li>
        </ul>
    </div>
</div>

<?php include("templates/footer.php"); ?>
