<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

include("templates/header.php");
?>

<div class="container mt-5">
    <h2 class="mb-4 text-primary">🎛 Administrator Paneli</h2>
    <p class="lead">Xush kelibsiz, administrator! Quyidagi funksiyalar orqali tizimni boshqarishingiz mumkin:</p>

    <div class="row g-4">
        <!-- Foydalanuvchilarni boshqarish -->
        <div class="col-md-6">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">👥 Foydalanuvchilarni boshqarish</h5>
                    <ul class="list-unstyled">
                        <li><a href="create_student.php" class="text-decoration-none">➕ Yangi foydalanuvchi qo‘shish</a></li>
                        <li><a href="foydalanuvchi_edit.php" class="text-decoration-none">✏️ Tahrirlash yoki o‘chirish</a></li>
                        <li><a href="manage_users.php" class="text-decoration-none">🔁 Rollarni o‘zgartirish</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Statistikalar -->
        <div class="col-md-6">
            <div class="card border-success shadow">
                <div class="card-body">
                    <h5 class="card-title">📊 Tizim statistikasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="view_stastistics.php" class="text-decoration-none">👤 Foydalanuvchilar soni</a></li>
                        <li><a href="view_stastistics.php" class="text-decoration-none">📚 Kurslar va testlar statistikasi</a></li>
                        <li><a href="view_stastistics.php" class="text-decoration-none">📝 Baholangan testlar statistikasi</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Kurslar va savollar -->
        <div class="col-md-6">
            <div class="card border-warning shadow">
                <div class="card-body">
                    <h5 class="card-title">📚 Kurslar va savollar</h5>
                    <ul class="list-unstyled">
                        <li><a href="admin_courses.php" class="text-decoration-none">➕ Kurs yaratish</a></li>
                        <li><a href="assign_course.php" class="text-decoration-none">🔗 Kursni biriktirish</a></li>
                        <li><a href="admin_questions.php" class="text-decoration-none">❌ Savollarni ko‘rish/o‘chirish</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Xavfsizlik -->
        <div class="col-md-6">
            <div class="card border-danger shadow">
                <div class="card-body">
                    <h5 class="card-title">🔐 Xavfsizlik nazorati</h5>
                    <ul class="list-unstyled">
                        <li><a href="login_logs.php" class="text-decoration-none">🕵️ Kirish tarixini ko‘rish</a></li>
                        <li><a href="reset_password.php" class="text-decoration-none">🔁 Parollarni qayta tiklash</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sertifikatlar -->
        <div class="col-md-6">
            <div class="card border-info shadow">
                <div class="card-body">
                    <h5 class="card-title">🧾 Sertifikatlar nazorati</h5>
                    <ul class="list-unstyled">
                        <li><a href="sertifikat1.php" class="text-decoration-none">✅ Sertifikatga loyiq foydalanuvchilar</a></li>
                        <li><a href="sertifikat2.php" class="text-decoration-none">📄 Berilgan sertifikatlar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("templates/footer.php"); ?>
