<?php
include 'baza3.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nazoart_turlari = $_POST['nazoart_turlari'];
    $izoh = $_POST['izoh'];
    $ball = $_POST['ball'];
    $otkazilish_vaqti = $_POST['otkazilish_vaqti'];
    $baholash = $_POST['baholash'];
    
    
    $stmt = $conn->prepare("UPDATE talabalarni_baholash_mezoni SET nazoart_turlari = ?,izoh = ?,ball = ?,otkazilish_vaqti = ?,baholash = ?");
    $stmt->bind_param("isssss",$id,$nazoart_turlari,$izoh,$ball,$otkazilish_vaqti,$baholash);
    
    if ($stmt->execute()) {
        echo " Ma'lumotlar muvaffaqiyatli yangilandi!";
    } else {
        echo " Xatolik: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma'lumotlar Qo'shish</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            width: 50%;
            margin-top: 50px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        label {
            margin: 5px 0;
        }
        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin: 5px 0 15px 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ma'lumotlar yangilash</h1>
        <form method="post" action="">
            <label for="id">ID</label>
            <input type="number" name="id" required><hr>
            <label for="nazoart_turlari">Nazorat turlari</label>
            <input type="text" name="nazoart_turlari" required><hr>
            <label for="izoh">Izoh</label>
            <input type="text" name="izoh" required><hr>
            <label for="ball">Ball</label>
            <input type="text" name="ball" required><hr>
            <label for="otkazilish_vaqti">O'tkazilish_vaqti</label>
            <input type="text" name="otkazilish_vaqti" required><hr>
            <label for="baholash">Baholash</label>
            <input type="text" name="baholash" required><hr>
            <input type="submit" value="Yangilash">
             <br>
            <button style="display: inline-block; border: 10px ; color:  #007bff; border-radius: 20px; background: #007bff; margin: -54px 0px 0px 85px;  padding: 11px 9px 11px 9px;">
            <a href="index.php" style="color: white; text-decoration: none;">Ortga qaytish</a></button>
        </form>
    </div>

