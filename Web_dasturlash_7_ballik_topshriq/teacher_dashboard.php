<?php
// sessiya va config.php allaqachon bor deb hisoblaymiz
$user_id = $_SESSION["user_id"];
$me = $conn->query("SELECT name, avatar FROM users WHERE id = $user_id")->fetch_assoc();
?>

<div class="d-flex align-items-center">
    <img src="<?= $me['avatar'] ? $me['avatar'] : 'default_avatar.png' ?>" width="40" class="rounded-circle me-2">
    <strong><?= htmlspecialchars($me['name']) ?></strong>
    <a href="teacher_profile.php" class="ms-3 btn btn-sm btn-outline-secondary">Profilim</a>
</div>
