 <table>
        <thead>
            <tr>
                <th>Akademik daraja</th>
                    <?php foreach ($malumotlar as $malumot): ?>
                <td><?= $malumot['akademik_daraja'] ?></td>
                       <?php endforeach; ?>
            </tr>
        </thead>
         <thead>
            <tr>
                <th>Ta'lim yo'nalishi</th>
                    <?php foreach ($malumotlar as $malumot): ?>
                <td><?= $malumot['talim_yonalishi'] ?></td>
                       <?php endforeach; ?>
            </tr>
        </thead>
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
                <tr>
                    <td><?= $malumot['ajratilgan_akademik_soat_hajmi_aud'] ?></td>
                    <td><?= $malumot['auditoriya_soatlari_taqsimoti_maruza'] ?></td>
                </tr>
                <tr>
                    <td><?= $malumot['ajratilgan_akademik_soat_hajmi_must'] ?></td>
                    <td><?= $malumot['auditoriya_soatlari_taqsimoti_amaliy'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
  </table>