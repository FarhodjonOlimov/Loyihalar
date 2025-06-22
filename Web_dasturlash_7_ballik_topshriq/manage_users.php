<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Agar forma yuborilgan bo‘lsa
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["user_id"], $_POST["new_role"])) {
    $user_id = intval($_POST["user_id"]);
    $new_role = $_POST["new_role"];

    if (in_array($new_role, ['admin', 'teacher', 'student'])) {
        $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
        $stmt->bind_param("si", $new_role, $user_id);
        $stmt->execute();
    }
}

// Barcha foydalanuvchilarni olish
$users = $conn->query("SELECT id, name, email, role FROM users");

include("templates/header.php");
?>

<div class="container mt-5">
    <h2>Foydalanuvchilarni boshqarish</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ism</th>
                <th>Email</th>
                <th>Roli</th>
                <th>Yangi rolni tanlash</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $users->fetch_assoc()): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                    <td>
                        <form method="POST" class="d-flex">
                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                            <select name="new_role" class="form-select me-2">
                                <option value="student" <?= $user['role'] === 'student' ? 'selected' : '' ?>>Talaba</option>
                                <option value="teacher" <?= $user['role'] === 'teacher' ? 'selected' : '' ?>>O‘qituvchi</option>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Administrator</option>
                            </select>
                            <button class="btn btn-sm btn-success">Saqlash</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include("templates/footer.php"); ?>
