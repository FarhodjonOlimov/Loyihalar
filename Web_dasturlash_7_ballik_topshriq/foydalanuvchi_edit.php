<?php
// Fayl: foydalanuvchi_edit.php (tahrirlash va o‘chirish birlashtirilgan)
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $id = (int)$_POST['edit_id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $email, $role, $id);
    $stmt->execute();
    header("Location: manage_users.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM users WHERE id = $id");
    header("Location: manage_users.php");
    exit();
}

$users = $conn->query("SELECT * FROM users");

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Foydalanuvchilar Ro‘yxati</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ism</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Amallar</th>
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
                        <a href="?edit=<?= $user['id'] ?>" class="btn btn-sm btn-info">Tahrirlash</a>
                        <a href="?delete=<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">O‘chirish</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php if (isset($_GET['edit'])):
    $edit_id = (int)$_GET['edit'];
    $edit_result = $conn->query("SELECT * FROM users WHERE id = $edit_id");
    $edit_user = $edit_result->fetch_assoc();
?>
<div class="container mt-3">
    <h3>Foydalanuvchini Tahrirlash</h3>
    <form method="POST">
        <input type="hidden" name="edit_id" value="<?= $edit_user['id'] ?>">
        <div class="mb-3">
            <label>Ism:</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($edit_user['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($edit_user['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Rol:</label>
            <select name="role" class="form-control">
                <option value="student" <?= $edit_user['role'] == 'student' ? 'selected' : '' ?>>Talaba</option>
                <option value="teacher" <?= $edit_user['role'] == 'teacher' ? 'selected' : '' ?>>O'qituvchi</option>
                <option value="admin" <?= $edit_user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>
        <button class="btn btn-success">Yangilash</button>
    </form>
</div>
<?php endif; ?>
<?php include("templates/footer.php"); ?>
