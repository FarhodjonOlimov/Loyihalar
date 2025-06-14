<?php
include 'baza.php';
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasturlash Asoslari Fani Bo'yicha Sillabus</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .header, .footer {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .content {
            margin: 20px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            text-align: center;
            width: 80%;
        }
        .content h2 {
            text-align: center;
        }
        .section-content {
            display: none;
            margin-top: 20px;
        }
        button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin: 10px 0;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        input[type="submit"] {
            background-color: #000000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
         body {
            font-family: Arial, sans-serif;
            margin: 40px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
        }
        .date {
            margin-top: 30px;
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 60%;
            margin: auto;
        }
        .section {
            margin-bottom: 20px;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
        }
        .signature {
            text-align: center;
            margin-top: 40px;
        }
          table {
            border-collapse: collapse;
            width: 60%;
            height: 100;
            border: 1px solid black;
        }
        th{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <script>
        function toggleSection(sectionId) {
            var sections = document.getElementsByClassName('section-content');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
            var section = document.getElementById(sectionId);
            if (section.style.display === 'none') {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <div class="header">
        <h1>Kokand University</h1>
        <nav>
            <a href="sillabus.php" style="color: white; text-decoration: none; margin: 0 10px;">Sillabus</a>
            <a href="index.php" style="color: white; text-decoration: none; margin: 0 10px;">Ma'lumot qo'shish</a>
            <a href="login.php" style="color: white; text-decoration: none; margin: 0 10px;">Chiqish</a>
        </nav>
    </div>
    <br><br><br>
    <div style="margin: 0px 0px 0px -769px;">
        <img src="logo/logo.jpg" width="310px">
    </div> 
       <div style="direction: right; background: #f5f5f5;; text-align: center; margin: -102px -39% 0px 0px;"> 
        <h2 text-align="right">"TASDIQLAYMAN"</h2> 
    <p><b>Akademik ishlar bo‘yicha prorektor J.Kambarov</b></p>
        <p>___________________________________________</p>
        <p>(imzo)</p>
        <p>2024 - yil "____" _______</p>
    </div>
    <hr>
    <br>
    <h1>Dasturlash Asoslari Fani Bo'yicha Sillabus</h1>
                <h2>1 Umumiy ma’lumotlar </h2>
              <table>
        <thead>
            <tr>
                <th>Akademik daraja</th>
                <th>Ta'lim yo'nalishi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($malumotlar as $malumot): ?>
                <tr>
                    <td><?= $malumot['akademik_daraja'] ?></td>
                    <td><?= $malumot['talim_yonalishi'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <thead>
            <tr>
                <th>O'qish davomiyligi (yil)</th>
                <th>Semestr</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($malumotlar as $malumot): ?>
                <tr>
                    <td><?= $malumot['oqish_davomiyligi'] ?></td>
                    <td><?= $malumot['semestr'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <thead>
            <tr>
                <th>Fan nomi</th>
                <th>Fan kodi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($malumotlar as $malumot): ?>
                <tr>
                    <td><?= $malumot['fan_nomi'] ?></td>
                    <td><?= $malumot['fan_kodi'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <thead>
            <tr>
                <th>Ta'lim shakli</th>
                <th>Fan turi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($malumotlar as $malumot): ?>
                <tr>
                    <td><?= $malumot['talim_shakli'] ?></td>
                    <td><?= $malumot['fan_turi'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <thead>
            <tr>
                <th>Fan tili</th>
                <th>Modulning davomiyligi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($malumotlar as $malumot): ?>
                <tr>
                    <td><?= $malumot['fan_tili'] ?></td>
                    <td><?= $malumot['modulning_davomiyligi'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <thead>
            <tr>
                <th>Fanga ajratilgan kredit</th>
                <th>Baholash shakli</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($malumotlar as $malumot): ?>
                <tr>
                    <td><?= $malumot['fanga_ajratilgan_kredit'] ?></td>
                    <td><?= $malumot['baholash_shakli'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <thead>
            <tr>
                <th>Ajratilgan akademik soat hajmi</th>
                <th>Auditoriya soatlari taqsimoti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($malumotlar as $malumot): ?>
                <td>
                    <?= $malumot['jami'] ?> 
                </td>
                 <td>
                    maruza amaliy
                </td>
                <tr>
                    <td rowspan="2"><?= $malumot['ajratilgan_akademik_soat_hajmi_aud'] ?> aud <?= $malumot['ajratilgan_akademik_soat_hajmi_must'] ?> must</td>
                    <td rowspan="2" colspan="2"><?= $malumot['auditoriya_soatlari_taqsimoti_maruza'] ?> <?= $malumot['auditoriya_soatlari_taqsimoti_amaliy'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
  </table>
  
<br>
<br>
<br>
<!--------fan maqsadini bo'limi---------->
                <h1>2 Fan maqsadi</h1>
                          <table border="0"> 
       <thead width="370px" height="100"> 
            <h3>Umumiy mazmun</h3>
            <?php foreach ($fanlar as $fan): ?> 
                     <td> <?= $fan['umumiy_mazmun'] ?> </td>
            <?php endforeach; ?> 
        </thead>  
    </table> 
<!--------fan maqsadini bo'limi-tamomlash--------->
<br>
<br>
<br>
                <h2>3 Fanni o'zlashtrish uchun zarur boshlang'ich bilimlar</h2>
                          <table border="5" > 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Fan nomi</th>
            </tr>         </thead> 
         <tbody> 
            <?php foreach ($Uzbek as $uzb): ?> 
                <tr> 
                    <td><?= $uzb['id'] ?></td> 
                    <td><?= $uzb['fan_nomi'] ?></td> 
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table> 

<br>
<br>
<br>
                <h2>4 Ta'lim natijalari</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Bilimlar jihatidan</th>
            </tr>  
        </thead> 
        <tbody> 
            <?php foreach ($dildora as $dildor): ?> 
                <tr>  
                    <td><?= $dildor['bilimlar_jihatidan'] ?></td> 
                </tr> 
                <tr> 
             <tr> 
            <th>Ko'nikmalar jihatidan</th>
            </tr>
                    <td><?= $dildor['konikmalar_jihatidan'] ?></td> 
                </tr>

            <?php endforeach; ?> 
        </tbody> 
    </table> 

<br>
<br>
<br>
                <h2>5 Fan mazmuni</h2>
                          <table border="5"> 
                     <h3>Maruza mashg'ulotlar mazmuni</h3>       
       <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Mavzu rejasi</th>
            <th>Soat hajmi</th>
            </tr>
        </thead> 
        <tbody> 
            <?php foreach ($muattarr as $muattar): ?> 
                <tr> 
                    <td><?= $muattar['id'] ?></td> 
                    <td><?= $muattar['mavzu_rejasi'] ?></td>
                    <td><?= $muattar['soat_hajmi'] ?></td> 
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table> 


<br>
<br>
<br>
                
                <h2>6 Mustaqil ta’lim soatlarining taqsimoti</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Vazifalar</th>
            <th>Bajarish soati</th>
            <th>Jami</th>
            </tr>   
        </thead> 
        <tbody> 
            <?php foreach ($maftunaa as $maftuna): ?> 
                <tr> 
                    <td><?= $maftuna['id'] ?></td> 
                    <td><?= $maftuna['vaziflar'] ?></td>
                    <td><?= $maftuna['bajarish_soati'] ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table> 

<br>
<br>
<br>
                <h2>7 Asosiy adabiyotlar</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Nomi</th>
            <th>Id Sillabus</th>
            <th>Ro'yxatga olish vaqti</th>
            </tr>
        </thead>
         <tbody> 
            <?php foreach ($rohilaxon as $rohila): ?> 
                <tr> 
                    <td><?= $rohila['id'] ?></td> 
                    <td><?= $rohila['nomi'] ?></td>
                    <td><?= $rohila['id_sillabus'] ?></td>
                    <td><?= $rohila['royxatga_olish_vaqti'] ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table> 

<br>
<br>
<br>
                <h2>8 Qo'shimcha adabiyotlar</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Nomi</th>
            <th>Id Sillabus</th>
            <th>Ro'yxatga olish vaqti</th>
            </tr>  
        </thead> 
        <tbody> 
            <?php foreach ($Farhodjon as $farhod): ?> 
                <tr> 
                    <td><?= $farhod['id'] ?></td> 
                    <td><?= $farhod['nomi'] ?></td>
                    <td><?= $farhod['id_sillabus'] ?></td>
                    <td><?= $farhod['royxatga_olish_vaqti'] ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table> 

<br>
<br>
<br>
                <h2>9 Axborot manbalari</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Nomi</th>
            <th>Id Sillabus</th>
            <th>Ro'yxatga olish vaqti</th>
            </tr>  
        </thead> 
        <tbody> 
            <?php foreach ($Oqibatxon as $oqibat): ?> 
                <tr> 
                    <td><?= $oqibat['id'] ?></td> 
                    <td><?= $oqibat['nomi'] ?></td>
                    <td><?= $oqibat['id_sillabus'] ?></td>
                    <td><?= $oqibat['royxatga_olish_vaqti'] ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table> 
    <br>
<br>
<br>
    <h2>10 Fanni baholash mezoni va rejasi</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <h3>Talabalar bilimini baholash turlari</h3>
            <th>Joriy baholash</th>
            <th>Workshop</th>
            <th>Loyiha ishi</th>
            <th>Vazifa topshiriqlar</th>
            <th>Davomat</th>
            <th>Oraliq  imtihon</th>
            <th>Yakuniy imtihon</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($kompyuter as $laptop): ?> 
                <tr> 
                    <td><?= $laptop['id'] ?></td> 
                    <?= $laptop['talabalar_bilimini_baholash_turlari'] ?>
                    <br>
                    <td><?= $laptop['joriy_baholash'] ?></td>
                    <td><?= $laptop['workshop'] ?></td> 
                    <td><?= $laptop['loyiha_ishi'] ?></td>
                    <td><?= $laptop['vazifa_topshiriqlar'] ?></td> 
                    <td><?= $laptop['davomat'] ?></td>
                    <td><?= $laptop['oraqliq_imtihon'] ?></td>
                    <td><?= $laptop['yakuniy_imtihon'] ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table>  
    <br>
    <br>
    <br>
    <h2>11 Talabalarni baholash mezoni</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Nazorat turlari</th>
            <th>Izoh</th>
            <th>Ball</th>
            <th>O'tkazilish vaqti</th>
            <th>Baholash</th>
            </tr>
        </thead> 
        <tbody> 
            <?php foreach ($muxlisa as $muxlis): ?> 
                <tr> 
                    <td><?= $muxlis['id'] ?></td> 
                    <td><?= $muxlis['nazoart_turlari'] ?></td>
                    <td><?= $muxlis['izoh'] ?></td>
                    <td><?= $muxlis['ball'] ?></td> 
                    <td><?= $muxlis['otkazilish_vaqti'] ?></td>
                    <td><?= $muxlis['baholash'] ?></td> 
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table>   
<br>
<br>
<br>
<h2>12 Qo'qon universitetida baholash tizimi</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Baho</th>
            <th>Foiz</th>
            <th>Gpa</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($kamola as $kamol): ?> 
                <tr> 
                    <td><?= $kamol['id'] ?></td> 
                    <td><?= $kamol['baho'] ?></td>
                    <td><?= $kamol['foiz'] ?></td>
                    <td><?= $kamol['gpa'] ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table>  
<br>
<br>
<br>
<h2>13 Izoh</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th align-text="center">Izoh</th>
            </tr> 
        </thead> 
         <tbody> 
            <?php foreach ($aka as $uka): ?> 
                <tr> 
                    <td><?= $uka['id'] ?></td> 
                    <td><?= $uka['izoh'] ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table>  
<br>
<br>
<br>
<h2>14 Baholash_darajalari</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Alo</th>
            <th>Yaxshi</th>
            <th>Qoniqarli</th>
            <th>Qoniqarsiz</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($ota as $ona): ?> 
                <tr> 
                    <td><?= $ona['id'] ?></td> 
                    <td><?= $ona['alo'] ?></td>
                    <td><?= $ona['yaxshi'] ?></td>
                    <td><?= $ona['qoniqarli'] ?></td> 
                    <td><?= $ona['qoniqarsiz'] ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table>  
<br>
<br>
<br>
<h2>15 Imtihonga qoyilgan talab korsatmalar</h2>
                          <table border="5"> 
        <thead width="370px" height="70"> 
            <tr> 
            <th>Id</th>
            <th>Tafsiyalar</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($oqituvchi as $ustoz): ?> 
                <tr> 
                    <td><?= $ustoz['id'] ?></td> 
                    <td><?= $ustoz['tafsiyalar'] ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table>  
<br>
<br>
<br>
<br>
                            
 <div class="container">
        <div class="section">
            <h2>Fan o‘qituvchisi to‘g‘risida ma’lumot</h2>
            <p><strong>Muallif:</strong> Botirov Muzaffarjon Mansurovich</p>
            <p><strong>E-mail:</strong> botirovmuzaffarjonmansurovich@gmail.com</p>
            <p><strong>Tashkilot va kafedra:</strong> Qo‘qon universiteti, Raqamli texnologiyalar va matematika kafedrasi</p>
        </div>
        <div class="section">
            <h2>Taqrizchilar</h2>
            <p>Texnika fanlari bo‘yicha falsafa doktori (PhD), Sh.S. Xaxarov QDPI, Fizika-matematika fanlari nomzodi, I.M.Siddiqov</p>
        </div>
        <div class="section">
            <h2>Talabalarni erkin qabul qilish kuni</h2>
            <p>Seshanba-chorshanba, soat 15.00 – 17.00, B 305-xona</p>
        </div>
        <div class="section">
            <h2>Sillabus</h2>
            <p>Universitet Kengashining 2024-yil __ avgustdagi __-sonli yig‘ilish bayoni bilan tasdiqlangan.</p>
            <p>“Raqamli texnologiyalar va matematika” kafedrasining 2024-yil __ avgustdagi __-sonli yig‘ilish bayoni bilan ma’qullangan.</p>
        </div>
        <div class="signatures">
            <div class="signature">
                <p>_______</p>
                <p>(imzo)</p>
                <p>X.Gafurov</p>
                <p>Akademik ishlar departamenti boshlig‘i</p>
            </div>
            <div class="signature">
                <p>_______</p>
                <p>(imzo)</p>
                <p>J.Turg‘unov</p>
                <p>Fakultet dekani</p>
            </div>
            <div class="signature">
                <p>_______</p>
                <p>(imzo)</p>
                <p>Sh.Qaxarov</p>
                <p>Kafedra mudiri</p>
            </div>
            <div class="signature">
                <p>_______</p>
                <p>(imzo)</p>
                <p>M.Botirov</p>
                <p>Fan o‘qituvchisi</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2025 Kokand University</p>
    </div>
</body>
</html>
