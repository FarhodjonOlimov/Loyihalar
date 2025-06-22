<?php
// Fayl: reset_password.php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST['user_id'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $new_password, $user_id);
    $stmt->execute();
    header("Location: manage_users.php");
    exit();
}

$users = $conn->query("SELECT id, name FROM users");

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Parolni Tiklash</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Foydalanuvchini tanlang:</label>
            <select name="user_id" class="form-control" required>
                <?php while ($user = $users->fetch_assoc()): ?>
                    <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Yangi Parol:</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <button class="btn btn-warning">Parolni Yangilash</button>
    </form>
</div>
<?php include("templates/footer.php"); ?>
