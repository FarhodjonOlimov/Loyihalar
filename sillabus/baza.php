<?php 
// Ma'lumotlar bazasiga ulanish 
$server = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sillabus"; 
 
// MySQL ulanishi 
$conn = new mysqli($server, $username, $password, $database); 
 
// Ulanuvchanlikni tekshirish 
if ($conn->connect_error) { 
    die("Bazaga ulanish amalga oshmadi: " . $conn->connect_error); 
} 

 // 1 Barcha ma'lumotlarni olish 
$query = "SELECT id,akademik_daraja,oqish_davomiyligi,fan_nomi,talim_shakli,fan_tili,fanga_ajratilgan_kredit,ajratilgan_akademik_soat_hajmi_aud,ajratilgan_akademik_soat_hajmi_must,talim_yonalishi,semestr,fan_kodi,fan_turi,modulning_davomiyligi,baholash_shakli,auditoriya_soatlari_taqsimoti_maruza,auditoriya_soatlari_taqsimoti_amaliy,jami  FROM umumiy_malumotlar"; 
$result = $conn->query($query); 
$malumotlar = []; 
while ($row = $result->fetch_assoc()) { 
    $malumotlar[] = $row; 
}

 // 2 Barcha ma'lumotlarni olish 
$query = "SELECT id,umumiy_mazmun FROM fan_maqsadi"; 
$result = $conn->query($query); 
$fanlar = []; 
while ($row = $result->fetch_assoc()) { 
    $fanlar[] = $row; 
}

// 3 Barcha ma'lumotlarni olish 
$query = "SELECT id,fan_nomi FROM fanni_ozlashtrish_uchun_zarur_boshlangich_bilimlar"; 
$result = $conn->query($query); 
$Uzbek = []; 
while ($row = $result->fetch_assoc()) { 
    $Uzbek[] = $row; 
}

// 4 Barcha ma'lumotlarni olish 
$query = "SELECT id,bilimlar_jihatidan,konikmalar_jihatidan FROM talim_natijalari"; 
$result = $conn->query($query); 
$dildora = []; 
while ($row = $result->fetch_assoc()) { 
    $dildora[] = $row; 
}

// 5 Barcha ma'lumotlarni olish 
$query = "SELECT id,mavzu_rejasi,soat_hajmi,shakli,royxatga_olish,id_sillabus  FROM fan_mazmuni "; 
$result = $conn->query($query); 
$muattarr = []; 
while ($row = $result->fetch_assoc()) { 
    $muattarr[] = $row; 
}

// 6 Barcha ma'lumotlarni olish 
$query = "SELECT id,vaziflar,bajarish_soati  FROM muztaqil_talim_soatlarining_taqsimoti"; 
$result = $conn->query($query); 
$maftunaa = []; 
while ($row = $result->fetch_assoc()) { 
    $maftunaa[] = $row; 
}
 
 //7 Barcha ma'lumotlarni olish 
$query = "SELECT id,nomi,id_sillabus,royxatga_olish_vaqti FROM  asosiy_adabiyotlar"; 
$result = $conn->query($query); 
$rohilaxon = []; 
while ($row = $result->fetch_assoc()) { 
    $rohilaxon[] = $row; 
}

//8 Barcha ma'lumotlarni olish 
$query = "SELECT id,nomi,id_sillabus,royxatga_olish_vaqti FROM  qoshimcha_adabiyotlar"; 
$result = $conn->query($query); 
$Farhodjon = []; 
while ($row = $result->fetch_assoc()) { 
    $Farhodjon[] = $row; 
}

//9 Barcha ma'lumotlarni olish 
$query = "SELECT id,nomi,id_sillabus,royxatga_olish_vaqti FROM  axborot_manbalari"; 
$result = $conn->query($query); 
$Oqibatxon = []; 
while ($row = $result->fetch_assoc()) { 
    $Oqibatxon[] = $row; 
}

//10 Barcha ma'lumotlarni olish 
$query = "SELECT id,talabalar_bilimini_baholash_turlari,joriy_baholash,workshop,loyiha_ishi,vazifa_topshiriqlar,davomat,oraqliq_imtihon,yakuniy_imtihon FROM  fanni_baholash_mezoni_va_rejasi"; 
$result = $conn->query($query); 
$kompyuter = []; 
while ($row = $result->fetch_assoc()) { 
    $kompyuter[] = $row; 
}

//11 Barcha ma'lumotlarni olish 
$query = "SELECT id,nazoart_turlari,izoh,ball,otkazilish_vaqti,baholash FROM   talabalarni_baholash_mezoni "; 
$result = $conn->query($query); 
$muxlisa = []; 
while ($row = $result->fetch_assoc()) { 
    $muxlisa[] = $row; 
}

//12 Barcha ma'lumotlarni olish  
$query = "SELECT id,baho,foiz,gpa FROM    qoqon_universietida_baholash_tizimi "; 
$result = $conn->query($query); 
$kamola = []; 
while ($row = $result->fetch_assoc()) { 
    $kamola[] = $row; 
}

//13 Barcha ma'lumotlarni olish 
$query = "SELECT id,izoh FROM    izoh "; 
$result = $conn->query($query); 
$aka = []; 
while ($row = $result->fetch_assoc()) { 
    $aka[] = $row; 
}
//14 Barcha ma'lumotlarni olish 
$query = "SELECT id,alo,yaxshi,qoniqarli,qoniqarsiz FROM    baholash_darajalari "; 
$result = $conn->query($query); 
$ota = []; 
while ($row = $result->fetch_assoc()) { 
    $ota[] = $row; 
}

//15 Barcha ma'lumotlarni olish  
$query = "SELECT id,tafsiyalar FROM  imtihonga_qoyilgan_talab_korsatmalar "; 
$result = $conn->query($query); 
$oqituvchi = []; 
while ($row = $result->fetch_assoc()) { 
    $oqituvchi[] = $row; 
}

// Ma'lumotlar bazasini yopish 
 //$conn->close(); 
?> 

 