<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'teacher') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$user = $conn->query("SELECT * FROM users WHERE id = $user_id")->fetch_assoc();

include("templates/header.php");
?>

<div class="container mt-5">
    <h2>Profilim</h2>
    <div class="text-center">
        <img src="<?= $user['avatar'] ? $user['avatar'] : 'default_avatar.png' ?>" width="150" class="rounded-circle mb-3">
        <h4><?= htmlspecialchars($user['name']) ?></h4>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
    </div>

    <hr>
    <h4>Avatarni yangilash</h4>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Yangi avatar yuklash:</label>
            <input type="file" name="avatar" class="form-control" required>
        </div>
        <button class="btn btn-primary">Yuklash</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["avatar"])) {
        $upload_dir = "uploads/";
        $filename = basename($_FILES["avatar"]["name"]);
        $target = $upload_dir . time() . "_" . $filename;

        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target)) {
            $conn->query("UPDATE users SET avatar = '$target' WHERE id = $user_id");
            echo "<div class='alert alert-success mt-3'>Avatar muvaffaqiyatli yangilandi. <a href='teacher_profile.php'>Qayta yuklang</a></div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Yuklashda xatolik yuz berdi.</div>";
        }
    }
    ?>
</div>

<?php include("templates/footer.php"); ?>
