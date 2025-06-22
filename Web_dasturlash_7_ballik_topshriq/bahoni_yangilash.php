<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result_id = intval($_POST['result_id']);
    $score = intval($_POST['score']);

    if ($score < 0 || $score > 100) {
        die("Xato: Ball 0 va 100 orasida bo‘lishi kerak.");
    }

    $stmt = $conn->prepare("UPDATE results SET score = ? WHERE id = ?");
    $stmt->bind_param("ii", $score, $result_id);
    if ($stmt->execute()) {
        header("Location: review_results.php?success=1");
        exit();
    } else {
        die("Bahoni yangilashda xatolik: " . $conn->error);
    }
} else {
    header("Location: review_results.php");
    exit();
}
