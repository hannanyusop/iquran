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
    $check_surah = "SELECT * FROM DaftarSurat as a LEFT JOIN ArabicQuran as b on a.index = b.surat WHERE surat_malaysia='$_GET[surah]' AND b.ayat = '$_GET[ayat]'";
    $fetch_surah = mysqli_query($db,$check_surah);

    if ($fetch_surah) {

        $data = mysqli_fetch_assoc($fetch_surah);
        print_r($data);
        die();
        $surah_name = $data['surat_arab'].'('.$data['surat_malaysia'].')';
    }else{

        echo '<script>alert("Ayat tidak wujud!");window.location="lihat-surah.php?surah=<?php echo $_GET[surah]; ?>"</script>';
    }

}else{
    echo '<script>alert("Sila Pilih Ayat!");window.location="lihat-surah.php?surah=<?php echo $_GET[surah]; ?>"</script>';
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
                        <h2 class="heading"><i class="fa fa-square"></i> Basic Validation</h2>
                        <form id="basic-form" method="post" novalidate="">
                            <div class="form-group">
                                <label>Text Input</label>
                                <input type="text" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Email Input</label>
                                <input type="email" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Text Area</label>
                                <textarea class="form-control" rows="5" cols="30" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Checkbox</label>
                                <br>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" required="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox">
                                    <span>Option 1</span>
                                </label>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" data-parsley-multiple="checkbox">
                                    <span>Option 2</span>
                                </label>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" data-parsley-multiple="checkbox">
                                    <span>Option 3</span>
                                </label>
                                <p id="error-checkbox"></p>
                            </div>
                            <div class="form-group">
                                <label>Radio Button</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="male" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                                    <span><i></i>Male</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="female" data-parsley-multiple="gender">
                                    <span><i></i>Female</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label for="food">Multiselect</label>
                                <br>
                                <select id="food" name="food[]" class="multiselect multiselect-custom" multiple="multiple" data-parsley-required="" data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect" style="display: none;" data-parsley-multiple="food[]">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
                                </select><div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="None selected"><span class="multiselect-selected-text">None selected</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="cheese"> Cheese</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="tomatoes"> Tomatoes</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="mozarella"> Mozzarella</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="mushrooms"> Mushrooms</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="pepperoni"> Pepperoni</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="onions"> Onions</label></a></li></ul></div>
                                <p id="error-multiselect"></p>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Validate</button>
                        </form>
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
