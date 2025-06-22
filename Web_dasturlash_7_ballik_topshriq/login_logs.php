<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Login loglarini bazadan olish
$logs = $conn->query("
    SELECT l.*, u.name, u.role 
    FROM login_logs l 
    JOIN users u ON l.user_id = u.id 
    ORDER BY l.login_time DESC
");

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>📜 Kirish tarixlari (Login loglari)</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Foydalanuvchi</th>
                <th>Rol</th>
                <th>IP manzil</th>
                <th>Kirish vaqti</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($log = $logs->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($log['name']) ?></td>
                    <td><?= htmlspecialchars($log['role']) ?></td>
                    <td><?= htmlspecialchars($log['ip_address']) ?></td>
                    <td><?= $log['login_time'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>
