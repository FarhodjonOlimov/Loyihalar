<?php
session_start();
include("config.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
  
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["role"] = $role;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Parol noto‘g‘ri.";
        }
    } else {
        $error = "Email topilmadi.";
    }
}
?>

<?php include("templates/header.php"); ?>
<div class="container mt-5">
    <h2>Tizimga kirish</h2>
    <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Parol</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <a  href="register.php">Ro'yxatdan o'tish</a>
        <br><br>
        <button type="submit" class="btn btn-primary">Kirish</button>
    </form>
    <br>
</div>
<?php include("templates/footer.php"); ?>
