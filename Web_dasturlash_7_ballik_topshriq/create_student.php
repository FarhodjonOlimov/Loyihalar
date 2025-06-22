<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Parol tekshiruvi
    if (strlen($password) < 8) {
        $errors[] = "Parol kamida 8 ta belgidan iborat bo‘lishi kerak.";
    }
    if ($password !== $confirm) {
        $errors[] = "Parollar mos emas!";
    }

    if (empty($errors)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $hashed, $role);
        $stmt->execute();
        header("Location: manage_users.php");
        exit();
    }
}

include("templates/header.php");
?>

<div class="container mt-5">
    <h2>Foydalanuvchi qo‘shish</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Ism:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
    <label>Parol:</label>
    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control" required>
        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', this)">
            👁
        </button>
    </div>
</div>

<div class="mb-3">
    <label>Parolni tasdiqlang:</label>
    <div class="input-group">
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('confirm_password', this)">
            👁
        </button>
    </div>
</div>
<script>
function togglePassword(id, btn) {
    const input = document.getElementById(id);
    if (input.type === "password") {
        input.type = "text";
        btn.innerText = "🙈";
    } else {
        input.type = "password";
        btn.innerText = "👁";
    }
}
</script>

        <div class="mb-3">
            <label>Rolni tanlang:</label>
            <select name="role" class="form-control" required>
                <option value="student">Talaba</option>
                <option value="teacher">O‘qituvchi</option>
                <option value="admin">Administrator</option>
            </select>
        </div>
        <button class="btn btn-primary">Qo‘shish</button>
    </form>
</div>

<?php include("templates/footer.php"); ?>
