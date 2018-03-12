<!doctype html>
<html lang="en">

<?php include_once ('include/logged-header.php'); ?>
<?php $title = "KOSONG"; ?>

<body>
<?php include_once ('include/logged-header.php'); ?>
<?php $title = "SURAH:"; ?>

<?php
//check if surah exist
if(isset($_GET['surah']) && isset($_GET['ayat'])){

    $surah_name = "TIADA";
    $check_surah = "SELECT * FROM DaftarSurat as a 
LEFT JOIN MalaysianQuran as c ON a.index=c.surat
LEFT JOIN  ArabicQuran as b ON a.index=b.surat
WHERE a.surat_malaysia='$_GET[surah]' AND b.ayat='$_GET[ayat]' AND c.ayat='$_GET[ayat]'";
    $fetch_surah = mysqli_query($db,$check_surah);
//    print_r($fetch_surah); die();

    if ($fetch_surah) {

        $data = mysqli_fetch_assoc($fetch_surah);
        $surah_name = $data['surat_arab'].'('.$data['surat_malaysia'].')';
    }else{

        echo '<script>alert("Ayat tidak wujud!");window.location="lihat-surah.php?surah='.$_GET[surah].'"</script>';
    }

}else{
    echo '<script>alert("Sila Pilih Ayat!");window.location="lihat-surah.php?surah='.$_GET[surah].'"</script>';
}

?>
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <?= include('include/nav-bar.php'); ?>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <?= include('include/left-side-bar.php'); ?>
    <!-- END LEFT SIDEBAR -->

    <!-- MAIN CONTENT -->
    <div id="main-content">
        <div class="container-fluid">
            <h1 class="sr-only"><?= $title ?></h1>

            <div class="dashboard-section">
                <div class="section-heading clearfix">
                    <h2 class="section-title"><i class="fa fa-pie-chart"></i><?= $title ?></h2>
                </div>
                <div class="col-md-6">
                    <div class="panel-content">
                        <form id="basic-form" method="post">

                            <h2 class="heading"><i class="fa fa-square"></i>Arab</h2>
                            <?php
                            $arabic = mysqli_query($db,"SELECT * FROM ArabicQuran as a WHERE a.surat='$_GET[surah]' AND  a.ayat='$_GET[ayat]'");

                            if ($arabic) {

                                $arabic_data = mysqli_fetch_assoc($arabic);
                            ?>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" cols="30" disabled><?php echo $arabic_data['text']; ?></textarea>
                                </div>
                            <?php } ?>

                            <br>
                            <h2 class="heading"><i class="fa fa-square"></i>Terjemahan</h2>
                            <?php
                            $malay = mysqli_query($db,"SELECT * FROM MalaysianQuran as a WHERE a.surat='$_GET[surah]' AND  a.ayat='$_GET[ayat]'");

                            if ($malay) {

                                $malay_data = mysqli_fetch_assoc($malay);
                                ?>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="mal_quran" cols="30" required><?php echo $malay_data['text']; ?></textarea>
                                </div>
                            <?php } ?>

                            <h2 class="heading"><i class="fa fa-square"></i>Audio</h2>
                            <div class="form-group">
                                <?php
                                $audio = mysqli_query($db,"SELECT * FROM track as a WHERE a.surat='$_GET[surah]' AND  a.ayat='$_GET[ayat]'");
                                $audio_data = mysqli_fetch_assoc($audio);
                                $audio_count = mysqli_num_rows ( $audio );

                                if ($audio_count != 0 ) {
                                    ?>
                                    <audio controls>
                                        <source src='../../track/<?php echo "$audio_data[surat]/$audio_data[ayat].mp3"; ?>' type='audio/mp3'>
                                        Your browser does not support the audio tag.
                                    </audio>
                                <?php }else { ?>

                                    <div class="alert alert-warning">
                                        Tiada Audio
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#uploadTrack" data-whatever="@mdo">Tambah Audio</button>
                                    </div>

                                <?php } ?>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>

                        <!-- MODAL -->

                        <div class="modal fade" id="uploadTrack"  role="dialog" >
                            <div class="modal-dialog" role="document">
                                <form class="modal-content" enctype="multipart/form-data" method="post" action="upload-audio.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Audio</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                                <div class="row setup-content" id="step-1">
                                                    <div class="col-xs-12">
                                                        <div class="col-md-12 well text-center">
                                                            <label for="fileToUpload">Sila pilih track (.mp3)</label><br />
                                                            <input type="file" name="track"/>
                                                            <input type="hidden" name="surah" value="<?php echo $_GET['surah']; ?>">
                                                            <input type="hidden" name="ayat" value="<?php echo $_GET['ayat']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Kemaskini</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- END MAIN CONTENT -->
    <div class="clearfix"></div>
    <?= include('include/footer.php'); ?>
</div>
<!-- END WRAPPER -->

<!-- Javascript -->

</body>

</html>
