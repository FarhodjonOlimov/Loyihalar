<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'student') {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['user_id'];

if (!isset($_GET['course_id']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    $courses = $conn->query("SELECT DISTINCT c.id, c.title FROM courses c 
                             JOIN questions q ON c.id = q.course_id");

    include("templates/header.php");
    echo '<div class="container mt-5">';
    echo '<h2>Test kursini tanlang</h2><ul>';
    while ($row = $courses->fetch_assoc()) {
        echo '<li><a href="?course_id=' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</a></li>';
    }
    echo '</ul></div>';
    include("templates/footer.php");
    exit();
}

$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : (int)$_POST['course_id'];
$course = $conn->query("SELECT * FROM courses WHERE id = $course_id")->fetch_assoc();
$questions = $conn->query("SELECT * FROM questions WHERE course_id = $course_id");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    $total = 0;
    $results_detail = [];
    while ($q = $questions->fetch_assoc()) {
        $qid = $q['id'];
        $correct = $q['correct_option'];
        $given = isset($_POST["question_$qid"]) ? $_POST["question_$qid"] : null;
        if ($given == $correct) {
            $score++;
        }
        $results_detail[] = [
            'question_id' => $qid,
            'given_answer' => $given
        ];
        $total++;
    }

    $stmt = $conn->prepare("INSERT INTO results (student_id, course_id, score) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $student_id, $course_id, $score);
    $stmt->execute();
    $result_id = $stmt->insert_id;

    // Agar siz detal yozuvlar jadvali yaratgan bo‘lsangiz, u yerga yozishingiz mumkin
    // foreach ($results_detail as $detail) { ... insert ... }

    include("templates/header.php");
    echo "<div class='container mt-5 alert alert-info'>Sizning natijangiz: <strong>$score / $total</strong></div>";
    include("templates/footer.php");
    exit();
}

include("templates/header.php");
?>
<div class="container mt-5">
    <h2><?= htmlspecialchars($course['title']) ?> kursi uchun test</h2>
    <div class="alert alert-warning"><strong>Taymer: <span id="timer"></span></strong></div>
    <form method="POST" id="testForm">
        <input type="hidden" name="course_id" value="<?= $course_id ?>">
        <?php
        $questions = $conn->query("SELECT * FROM questions WHERE course_id = $course_id");
        while ($q = $questions->fetch_assoc()): ?>
            <div class="mb-4">
                <p><strong><?= htmlspecialchars($q['question']) ?></strong></p>
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="form-check">
                        <input type="radio" name="question_<?= $q['id'] ?>" value="<?= $i ?>" class="form-check-input" required>
                        <label class="form-check-label"><?= htmlspecialchars($q['option'.$i]) ?></label>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endwhile; ?>
        <button type="submit" class="btn btn-primary">Testni yakunlash</button>
    </form>
</div>

<script>
let time = 40 * 60;
const timerDisplay = document.getElementById('timer');
const interval = setInterval(() => {
    const minutes = Math.floor(time / 60);
    const seconds = time % 60;
    document.title = `⏳ ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    if (--time < 0) {
        clearInterval(interval);
        document.getElementById('testForm').submit();
    }
}, 1000);
</script>

<?php include("templates/footer.php"); ?>
