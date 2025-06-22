<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

switch ($_SESSION["role"]) {
    case "admin":
        header("Location: admin_panel.php");
        break;
    case "teacher":
        header("Location: teacher_panel.php");
        break;
    case "student":
        header("Location: student_dashboard.php");
        break;
    default:
        echo "Noma'lum rol.";
}
?>
