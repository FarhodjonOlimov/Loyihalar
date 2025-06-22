<?php
session_start();
include("config.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password_raw = $_POST["password"];
    
    if (strlen($password_raw) < 8) {
        $error = "Parol kamida 8 ta belgidan iborat bo‘lishi kerak.";
    } else {
        $password = password_hash($password_raw, PASSWORD_DEFAULT);
        $role = "admin";

        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $role);

        if ($stmt->execute()) {
            $_SESSION["user_id"] = $stmt->insert_id;
            $_SESSION["role"] = $role;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Ro‘yxatdan o‘tishda xatolik: Email band bo‘lishi mumkin.";
        }
    }
}
?>

<?php include("templates/header.php"); ?>
<div class="container mt-5">
    <h2>Administrator sifatida ro‘yxatdan o‘tish</h2>
    <?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Ism</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Parol (kamida 8 ta belgi)</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', this)">👁</button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ro‘yxatdan o‘tish</button>
    </form>
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

<?php include("templates/footer.php"); ?>
