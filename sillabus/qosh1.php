<?php
include 'baza3.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Foydalanuvchidan kiritilgan ma'lumotlar
    $id = $_POST['id'];
    $akademik_daraja = $_POST['akademik_daraja'];
    $oqish_davomiyligi = $_POST['oqish_davomiyligi'];
    $fan_nomi = $_POST['fan_nomi'];
    $talim_shakli = $_POST['talim_shakli'];
    $fan_tili = $_POST['fan_tili'];
    $fanga_ajratilgan_kredit = $_POST['fanga_ajratilgan_kredit'];
    $ajratilgan_akademik_soat_hajmi_aud = $_POST['ajratilgan_akademik_soat_hajmi_aud'];
    $ajratilgan_akademik_soat_hajmi_must = $_POST['ajratilgan_akademik_soat_hajmi_must'];
    $talim_yonalishi = $_POST['talim_yonalishi'];
    $semestr = $_POST['semestr'];
    $fan_kodi = $_POST['fan_kodi'];
    $fan_turi = $_POST['fan_turi'];
    $modulning_davomiyligi = $_POST['modulning_davomiyligi'];
    $baholash_shakli = $_POST['baholash_shakli'];
    $auditoriya_soatlari_taqsimoti_maruza = $_POST['auditoriya_soatlari_taqsimoti_maruza'];
    $auditoriya_soatlari_taqsimoti_amaliy = $_POST['auditoriya_soatlari_taqsimoti_amaliy'];
    $jami =  $ajratilgan_akademik_soat_hajmi_aud + $ajratilgan_akademik_soat_hajmi_must;

    $stmt = $conn->prepare("INSERT INTO umumiy_malumotlar (id,akademik_daraja,oqish_davomiyligi,fan_nomi,talim_shakli,fan_tili,fanga_ajratilgan_kredit,ajratilgan_akademik_soat_hajmi_aud,ajratilgan_akademik_soat_hajmi_must,talim_yonalishi,semestr,fan_kodi,fan_turi,modulning_davomiyligi,baholash_shakli,auditoriya_soatlari_taqsimoti_maruza,auditoriya_soatlari_taqsimoti_amaliy,jami) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("issssssssssssssssi",$id,$akademik_daraja,$oqish_davomiyligi,$fan_nomi,$talim_shakli,$fan_tili,$fanga_ajratilgan_kredit,$ajratilgan_akademik_soat_hajmi_aud,$ajratilgan_akademik_soat_hajmi_must,
        $talim_yonalishi,$semestr,$fan_kodi,$fan_turi,$modulning_davomiyligi,$baholash_shakli,$auditoriya_soatlari_taqsimoti_maruza,$auditoriya_soatlari_taqsimoti_amaliy,$jami);  

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
            border-radius: 15px;
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
            <label for="akademik_daraja">Akademik Daraja</label>
            <input type="text" name="akademik_daraja" required><hr>
            <label for="oqish_davomiyligi">O'qish Davomiyligi</label>
            <input type="text" name="oqish_davomiyligi" required><hr>
            <label for="fan_nomi">Fan Nomi</label>
            <input type="text" name="fan_nomi" required><hr>
            <label for="talim_shakli">Ta'lim Shakli</label>
            <input type="text" name="talim_shakli" required><hr>
            <label for="fan_tili">Fan Tili</label>
            <input type="text" name="fan_tili" required><hr>
            <label for="fanga_ajratilgan_kredit">Fanga Ajratilgan Kredit</label>
            <input type="text" name="fanga_ajratilgan_kredit" required><hr>
            <label for="ajratilgan_akademik_soat_hajmi_aud">Ajratilgan Akademik Soat Hajmi (Auditoriya)</label>
            <input type="text" name="ajratilgan_akademik_soat_hajmi_aud" required><hr>
            <label for="ajratilgan_akademik_soat_hajmi_must">Ajratilgan Akademik Soat Hajmi (Mustaqil)</label>
            <input type="text" name="ajratilgan_akademik_soat_hajmi_must" required><hr>
            <label for="talim_yonalishi">Ta'lim Yo'nalishi</label>
            <input type="text" name="talim_yonalishi" required><hr>
            <label for="semestr">Semestr</label>
            <input type="text" name="semestr" required><hr>
            <label for="fan_kodi">Fan Kodi</label>
            <input type="text" name="fan_kodi" required><hr>
            <label for="fan_turi">Fan Turi</label>
            <input type="text" name="fan_turi" required><hr>
            <label for="modulning_davomiyligi">Modulning Davomiyligi</label>
            <input type="text" name="modulning_davomiyligi" required><hr>
            <label for="baholash_shakli">Baholash Shakli</label>
            <textarea name="baholash_shakli" required rows="30" cols="50"></textarea>
            <label for="auditoriya_soatlari_taqsimoti_maruza">Auditoriya Soatlari Taqsimoti (Ma'ruza)</label>
            <input type="text" name="auditoriya_soatlari_taqsimoti_maruza" required><hr>
            <label for="auditoriya_soatlari_taqsimoti_amaliy">Auditoriya Soatlari Taqsimoti (Amaliy)</label>
            <input type="text" name="auditoriya_soatlari_taqsimoti_amaliy" required><hr>
            <input type="submit" value="Qo'shish">
            <br>
            <button style="display: inline-block; border: 10px ; color:  #007bff; border-radius: 20px; background: #007bff; margin: -54px 0px 0px 85px;  padding: 11px 9px 11px 9px;">
            <a href="index.php" style="color: white; text-decoration: none;">Ortga qaytish</a></button>
        </form>
    </div>


