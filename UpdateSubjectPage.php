<?php
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- PLUGINS CSS -->
    <?php include('include/page_header.php')?>

    <!-- CUSTOM CSS -->
    <style></style>

</head>
<body class="container">

    <!-- CONTENT  -->
    <div class="container">
        <h1 class="display-5 text-center">UPDATE SUBJECTS</h1>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="divSubjectList">

                </div>      
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
            foreach($SubjectCls->query_generator('SELECT', 'tblAllSubjectsList', [NULL], ['is_active' => 1]) as $row) { ?>
                <input type="text" class="form-control" id="txtSubject" name="txtSubject" value="<?php echo $row['subject_name'] ?>">     
                <br>
            <?php } ?>
            <a href="Subject/UpdateSubject.php?txtSubject=<?= $txtSubject ?>" class="btn btn-success btn-sm">Save</a>
        </div>
    </div>

    <!-- PLUGIN JS -->
    <?php include('include/page_js.php')?>

    <!-- CUSTOM JS -->
    <script></script>
</body>
</html>
