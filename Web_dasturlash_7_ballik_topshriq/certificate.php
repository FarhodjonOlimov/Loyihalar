<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'student') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$result = $conn->query("SELECT * FROM results WHERE user_id = $user_id AND status = 'graded' AND score >= 3 ORDER BY id DESC LIMIT 1")->fetch_assoc();

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>Sertifikat</h2>
    <?php if ($result): ?>
        <div class="alert alert-success">
            Tabriklaymiz! Siz testdan <strong><?= $result['score'] ?>/5</strong> baho oldingiz va sertifikatga loyiqsiz.
        </div>
        <a href="#" class="btn btn-primary">PDF sertifikatni yuklab olish</a>
    <?php else: ?>
        <div class="alert alert-warning">Sertifikat olish uchun kamida 3 ball olishingiz kerak.</div>
    <?php endif; ?>
</div>
<?php include("templates/footer.php"); ?>
