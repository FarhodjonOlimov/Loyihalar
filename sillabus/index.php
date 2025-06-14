<?php
include 'baza.php';
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasturlash Asoslari Fani Bo'yicha Sillabus</title>
    <link rel="stylesheet" type="text/css" href="index.css">
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
            <a href="sillabus.php"  style="color: white; text-decoration: none; margin: 0 10px;">Sillabus</a>
            <a href="index.php" style="color: white; text-decoration: none; margin: 0 10px;">Ma'lumot qo'shish</a>
            <a href="login.php" style="color: white; text-decoration: none; margin: 0 10px;">Chiqish</a>
        </nav>
    </div>
    <div class="content">
        <h2>Dasturlash Asoslari Fani Bo'yicha Sillabus Yaratish</h2>
        <div>
            <button onclick="toggleSection('section1')">1-bo'lim </button>
            <div id="section1" class="section-content">
                <h2>1 Umumiy ma’lumotlar </h2>
          <table border="5">
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
    </form>
</form>
<br><br>
<form method="$_POST" action="qosh1.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<form method="$_POST" action="yangila1.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<form method="$_POST" action="ochir1.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
<br><br>
            </div>
        </div>
        <div>
            <button onclick="toggleSection('section2')">2-bo'lim </button>
            <div id="section2" class="section-content">
                <h2>2 Fan maqsadi</h2>
                          <table border="5"> 
       <thead width="700px"> 
            <tr> 
            <th>Id</th>
            <th>Umumiy mazmun</th>
            </tr> 
        </thead> 
          <tbody> 
            <?php foreach ($fanlar as $fan): ?> 
                <tr> 
                    <td><?= $fan['id'] ?></td> 
                    <td><?= $fan['umumiy_mazmun'] ?></td> 
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table> 
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh2.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila2.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir2.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
            </div>
        </div>
        <div>
            <button onclick="toggleSection('section3')">3-bo'lim </button>
            <div id="section3" class="section-content">
                <h2>3 Fanni o'zlashtrish uchun zarur boshlang'ich bilimlar</h2>
                          <table border="5"> 
        <thead width="700px"> 
            <tr> 
            <th>Id</th>
            <th>Fan nomi</th>
            </tr> 
        </thead>
        <tbody> 
            <?php foreach ($Uzbek as $uzb): ?> 
                <tr> 
                    <td><?= $uzb['id'] ?></td> 
                    <td><?= $uzb['fan_nomi'] ?></td> 
                </tr> 
            <?php endforeach; ?> 
        </tbody>  
    </table> 
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh3.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila3.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir3.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
            </div>
        </div>
        <div>
            <button onclick="toggleSection('section4')">4-bo'lim </button>
            <div id="section4" class="section-content">
                <h2>4 Ta'lim natijalari</h2>
                          <table border="5"> 
        <thead width="700px"> 
            <tr> 
            <th>Id</th>
            <th>Bilimlar jihatidan</th>
            <th>Ko'nikmalar jihatidan</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($dildora as $dildor): ?> 
                <tr> 
                    <td><?= $dildor['id'] ?></td> 
                    <td><?= $dildor['bilimlar_jihatidan'] ?></td>
                    <td><?= $dildor['konikmalar_jihatidan'] ?></td> 
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table> 
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh4.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila4.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir4.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
            </div>
        </div>
        <div>
            <button onclick="toggleSection('section5')">5-bo'lim </button>
            <div id="section5" class="section-content">
                <h2>5 Fan mazmuni</h2>
                          <table border="5"> 
       <thead width="700px"> 
            <tr> 
            <th>Id</th>
            <th>Mavzu rejasi</th>
            <th>Soat hajmi</th>
            <th>Shakli</th>
            <th>Ro'yxatga olish</th>
            <th>Id Sillabus</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($muattarr as $muattar): ?> 
                <tr> 
                    <td><?= $muattar['id'] ?></td> 
                    <td><?= $muattar['mavzu_rejasi'] ?></td>
                    <td><?= $muattar['soat_hajmi'] ?></td>
                    <td><?= $muattar['shakli'] ?></td> 
                    <td><?= $muattar['royxatga_olish'] ?></td>
                    <td><?= $muattar['id_sillabus'] ?></td> 
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table> 
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh5.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila5.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir5.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
            </div>
        </div>
        <div>
            <button onclick="toggleSection('section6')">6-bo'lim </button>
            <div id="section6" class="section-content">
                <h2>6 Mustaqil ta’lim soatlarining taqsimoti</h2>
                          <table border="5"> 
        <thead width="700px"> 
            <tr> 
            <th>Id</th>
            <th>Vazifalar</th>
            <th>Bajarish soati</th>
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh6.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila6.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir6.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
            </div>
        </div>
        <div>
            <button onclick="toggleSection('section7')">7-bo'lim </button>
            <div id="section7" class="section-content">
                <h2>7 Asosiy adabiyotlar</h2>
                          <table border="5"> 
        <thead width="700px"> 
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh7.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila7.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir7.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
            </div>
        </div>
        <div>
            <button onclick="toggleSection('section8')">8-bo'lim </button>
            <div id="section8" class="section-content">
                <h2>8 Qo'shimcha adabiyotlari</h2>
                          <table border="5"> 
        <thead width="700px"> 
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh8.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila8.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir8.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
            </div>
        </div>
        <div>
            <button onclick="toggleSection('section9')">9-bo'lim </button>
            <div id="section9" class="section-content">
                <h2>9 Axborot manbalari</h2>
                          <table border="5"> 
        <thead width="700px"> 
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh9.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila9.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir9.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
            </div>
        </div>
        <div>
            <button onclick="toggleSection('section10')">10-bo'lim </button>
            <div id="section10" class="section-content">
                <h2>10 Fanni baholash mezoni va rejasi</h2>
                          <table border="5"> 
        <thead width="700px"> 
            <tr> 
            <th>Id</th>
            <th>Talabalar bilimini baholash turlari</th>
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
                    <td><?= $laptop['talabalar_bilimini_baholash_turlari'] ?></td>
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh10.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila10.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir10.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
<br>
            </div>
   <div>
            <button onclick="toggleSection('section11')">11-bo'lim </button>
            <div id="section11" class="section-content">
                <h2>11 Talabalarni baholash mezoni</h2>
                          <table border="5"> 
        <thead width="700px"> 
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh11.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila11.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir11.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
<br>
            </div> 
            <div>
            <button onclick="toggleSection('section12')">12-bo'lim </button>
            <div id="section12" class="section-content">
                <h2>12 Qo'qon universitetida baholash tizimi</h2>
                          <table border="5"> 
        <thead width="700px"> 
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh12.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila12.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir12.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
<br>
            </div>    
            <div>
            <button onclick="toggleSection('section13')">13-bo'lim </button>
            <div id="section13" class="section-content">
                <h2>13 Izoht</h2>
                          <table border="5"> 
        <thead width="700px"> 
            <tr> 
            <th>Id</th>
            <th>Izoh</th>
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh13.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila13.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir13.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
<br>
            </div>   
            <div>
            <button onclick="toggleSection('section14')">14-bo'lim </button>
            <div id="section14" class="section-content">
                <h2>14 Baholash_darajalari</h2>
                          <table border="5"> 
        <thead width="700px"> 
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh14.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila14.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir14.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
<br>
            </div> 
            <div>
            <button onclick="toggleSection('section15')">15-bo'lim </button>
            <div id="section15" class="section-content">
                <h2>15 Imtihonga qoyilgan talab korsatmalar</h2>
                          <table border="5"> 
        <thead width="700px"> 
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
    </form>
</form>
<br>
<hr><form method="$_POST" action="qosh15.php">
    <input type="submit" name="Qo'shish" value="Qo'shish">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="yangila15.php">
  <input type="submit" name="Yangilash" value="Yangilash">
</form>
</form>
<br>
<hr>
<form method="$_POST" action="ochir15.php">
  <input type="submit" name="O'chirish" value="O'chirish">
</form>
</form>
<br>
            </div> 
        </div>
        <div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<div id="footer2">
        <p>&copy; 2025 Kokand University</p>
</div>
</body>
</html>
