<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Akademik Platforma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Akademik</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['role'])): ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Chiqish</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Kirish</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
