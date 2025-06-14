<?php
include 'baza2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Foydalanuvchidan kiritilgan ma'lumotlar
    $id = trim($_POST['id']);
    $ism = trim($_POST['ism']);
    $Parol = trim($_POST['Parol']);
    $familyasi = trim($_POST['familyasi']);
    $email_pochta = trim($_POST['email_pochta']);
    $telefon = trim($_POST['telefon']);

    // Bo'sh maydonlarni tekshirish
    if (empty($ism) || empty($familyasi) || empty($email_pochta) || empty($telefon)) {
        echo "Xatolik! Barcha maydonlarni to'liq to'ldiring!";
        exit();
    }

    // Minimal uzunlik tekshiruvi
    if (strlen($ism) < 2 || strlen($familyasi) < 2) {
        echo "Xatolik! Ism va familya kamida 2 ta belgidan iborat bo‘lishi kerak!";
        exit();
    }
    // Ma'lumotlarni bazaga yozish
    $stmt = $conn->prepare("INSERT INTO royxatdan_otganlar (ism, familyasi, email_pochta, telefon, Parol, id) VALUES (?, ?, ?, ?,?,?)");
    $stmt->bind_param("sssssi", $ism, $familyasi, $email_pochta, $telefon, $Parol,$id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Xatolik: " . $stmt->error;
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ro'yxatdan o'tish</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            text-align: center;
        }
        input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            border-radius: 15px;
        } 
        button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 30px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ro'yhatdan o'tish</h1>
        <form action="login.php" method="POST">
            <label for="email_pochta">Email pochta</label>
            <input type="email" id="email_pochta" name="email_pochta" placeholder="olimovfarhodjon347@gmail.com">

            <label for="Parol">Parolingizni kiriting</label>
            <input type="password" id="Parol" name="Parol" placeholder="***********">

            <label for="telefon">Telefon raqam</label>
            <input type="tel" id="telefon" name="telefon" placeholder="+998 (90) 055-46-25">

            <label for="ism">Ism</label>
            <input type="text" id="ism" name="ism" placeholder="Ismingizni kiriting">

            <label for="familyasi">Familiya</label>
            <input type="text" id="familyasi" name="familyasi" placeholder="Familiyangizni kiriting">
            <br>
            <button type="submit">Ro'yhatdan o'tish</button>
            <br>
            <button style="background-color: red;" type="reset">O'chirish</button>
        </form>
    </div>
</body>
</html>
