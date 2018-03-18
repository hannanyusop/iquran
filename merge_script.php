<?php

include_once ('config/database.php');

//get all surah
$r_surah = mysqli_query($db, "SELECT * FROM DaftarSurat as a");
while($surah = mysqli_fetch_assoc($r_surah)) {

    echo "<br><br>============ $surah[surat_malaysia] ===============<br>";

    $r_count = mysqli_query($db, "SELECT * FROM MalaysianQuran WHERE surat = $surah[index]");
    $loop = mysqli_num_rows($r_count);

    //looping for get all texts in surah
    for($i = 1; $i <= $loop; $i++){

        $r_malay = mysqli_query($db, "SELECT * FROM MalaysianQuran as b WHERE b.surat = $surah[index] AND b.ayat = $i");
        $malay_ayat = mysqli_fetch_assoc($r_malay);
        $r_arabic = mysqli_query($db, "SELECT * FROM ArabicQuran as c WHERE c.surat = $surah[index] AND c.ayat = $i");
        $arabic_ayat = mysqli_fetch_assoc($r_arabic);

        $surah_id = $surah['index'];
        $arabic_text = $arabic_ayat['text'];
        $malay_text = $malay_ayat['text'];

        //comment line 26 - 36 to prevent duplicating data

//        $insert = "INSERT INTO
//                texts2(database_id, surah_id, ayat_num, arabic, malay)
//                VALUES ('1','$surah_id','$i','$arabic_text','$malay_text')";
//
//        if (mysqli_query($db, $insert)) {
//            echo "done!";
//        } else {
//            echo "error!!";
//        }

    }



}