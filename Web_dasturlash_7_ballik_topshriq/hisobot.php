<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'teacher') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Kurslar va testlar sonini olish
$course_query = $conn->query("SELECT COUNT(*) AS total_courses FROM courses WHERE teacher_id = $user_id");
$course_data = $course_query->fetch_assoc();

$test_query = $conn->query("SELECT COUNT(*) AS total_tests FROM questions WHERE teacher_id = $user_id");
$test_data = $test_query->fetch_assoc();

// Talabalar baholagan testlar soni
$graded_query = $conn->query("SELECT COUNT(*) AS graded FROM test_results WHERE teacher_id = $user_id");
$graded_data = $graded_query->fetch_assoc();

include("templates/header.php");
?>
<div class="container mt-5">
    <h2>O'qituvchi Hisobotlari</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Yaratilgan kurslar</h5>
                    <p class="card-text display-6"><?= $course_data['total_courses'] ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Yaratilgan testlar</h5>
                    <p class="card-text display-6"><?= $test_data['total_tests'] ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Baholangan testlar</h5>
                    <p class="card-text display-6"><?= $graded_data['graded'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("templates/footer.php"); ?>
