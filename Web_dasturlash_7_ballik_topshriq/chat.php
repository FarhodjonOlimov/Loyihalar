<?php
// Fayl: chat.php
session_start();
include("config.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty(trim($_POST['message']))) {
    $msg = trim($_POST['message']);
    $uid = $_SESSION['user_id'];
    $role = $_SESSION['role'];
    $recipient_ids = $_POST['recipient_ids'] ?? [];

    if (empty($recipient_ids)) {
        $stmt = $conn->prepare("INSERT INTO chat (user_id, recipient_id, message, role, created_at) VALUES (?, NULL, ?, ?, NOW())");
        $stmt->bind_param("iss", $uid, $msg, $role);
        $stmt->execute();
    } else {
        foreach ($recipient_ids as $rid) {
            $stmt = $conn->prepare("INSERT INTO chat (user_id, recipient_id, message, role, created_at) VALUES (?, ?, ?, ?, NOW())");
            $stmt->bind_param("iiss", $uid, $rid, $msg, $role);
            $stmt->execute();
        }
    }
}

$uid = intval($_SESSION['user_id']);
$users = $conn->query("SELECT id, name FROM users WHERE id != $uid");
$msgs = $conn->query("SELECT c.*, u.name, r.name AS recipient_name FROM chat c 
                      JOIN users u ON c.user_id = u.id 
                      LEFT JOIN users r ON c.recipient_id = r.id 
                      ORDER BY c.created_at DESC LIMIT 50");

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Muloqot - Chat</h2>
    <form method="POST">
        <div class="mb-3">
            <textarea name="message" class="form-control" required placeholder="Xabar yozing..."></textarea>
        </div>
        <div class="mb-3">
            <label>Qabul qiluvchilarni tanlang (bir nechta):</label>
            <input type="text" class="form-control mb-2" id="searchInput" placeholder="Ism bo‘yicha qidiring...">
            <div class="border p-2" style="max-height: 200px; overflow-y: auto;" id="userList">
                <?php while ($user = $users->fetch_assoc()): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="recipient_ids[]" value="<?= $user['id'] ?>" id="user<?= $user['id'] ?>">
                        <label class="form-check-label" for="user<?= $user['id'] ?>"> <?= htmlspecialchars($user['name']) ?> </label>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="form-text">Agar hech kim tanlanmasa, xabar barchaga yuboriladi.</div>
        </div>
        <button class="btn btn-primary">Yuborish</button>
    </form>
    <hr>
    <div>
        <?php while ($m = $msgs->fetch_assoc()): ?>
            <p><strong><?= htmlspecialchars($m['name']) ?> (<?= htmlspecialchars($m['role']) ?>)
                <?php if ($m['recipient_id']): ?> → <?= htmlspecialchars($m['recipient_name']) ?><?php else: ?> → <i>Barchaga</i><?php endif; ?>
                :</strong> <?= htmlspecialchars($m['message']) ?> <br><small><i><?= $m['created_at'] ?></i></small></p>
        <?php endwhile; ?>
    </div>
</div>
<script>
    const searchInput = document.getElementById('searchInput');
    const userList = document.getElementById('userList');

    searchInput.addEventListener('input', function () {
        const filter = this.value.toLowerCase();
        const items = userList.querySelectorAll('.form-check');
        items.forEach(function (item) {
            const label = item.querySelector('label').textContent.toLowerCase();
            item.style.display = label.includes(filter) ? '' : 'none';
        });
    });
</script>
<?php include("templates/footer.php"); ?>