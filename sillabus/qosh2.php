<?php
include 'baza3.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Foydalanuvchidan kiritilgan ma'lumotlar
    $id = $_POST['id'];
    $umumiy_mazmun = $_POST['umumiy_mazmun'];

    $stmt = $conn->prepare("INSERT INTO fan_maqsadi (id,umumiy_mazmun) VALUES (?,?)");
    $stmt->bind_param("is",$id,$umumiy_mazmun);  

    if ($stmt->execute()) {
        echo " Ma'lumotlar muvaffaqiyatli qo'shildi!";
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
        <h1>Ma'lumotlar Qo'shish</h1>
        <form method="post" action="">
            <label for="id">ID</label>
            <input type="number" name="id" required><hr>
            <label for="umumiy_mazmun">Umumiy mazmun</label>
            <textarea name="umumiy_mazmun" required rows="30" cols="50"></textarea>
            <!------------<input type="text" name="umumiy_mazmun" required>------------>
            <hr>
            <input type="submit" value="Qo'shish">
             <br>
            <button style="display: inline-block; border: 10px ; color:  #007bff; border-radius: 20px; background: #007bff; margin: -54px 0px 0px 85px;  padding: 11px 9px 11px 9px;">
            <a href="index.php" style="color: white; text-decoration: none;">Ortga qaytish</a></button>
        </form>
    </div>


