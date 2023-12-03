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
<body>

    <!-- CONTENT  -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="divSubjectList">

                </div>      
            </div>
        </div>

        <div class="row">
            <h1 class="display-4 text-center">Add Subbjects</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" id="txtSubject" name="txtSubject"  class="form-control">     
                <br>
                <button class="btn btn-success" onclick="AddSubject()">Add subject</button>
            </div>
        </div>
        
    </div>
        <!-- PLUGIN JS -->
        <?php include('include/page_js.php')?>

        <!-- CUSTOM JS -->
        <script>
            ShowSubjectList();

            function AddSubject(){
                //console.log('hello')
                // const txtSubject = document.getElementById('txtSubject').value; // JS FORMAT
                
                const txtSubject = $('#txtSubject').val();//JQUERY FORMAT #<-PAG KUHA NG ID SA INPUT -> .val VALUE
                //console.log(txtSubject);

                var xhttp = new XMLHttpRequest(); // AJAX FORMAT
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        //document.getElementById("demo").innerHTML = this.responseText;
                        console.log(this.responseText);
                        ShowSubjectList();
                    }
                };
                xhttp.open("GET", "ajax/Subject/AddSubject.php?txtSubject="+txtSubject, true);
                xhttp.send();
            }

            function ShowSubjectList(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("divSubjectList").innerHTML = this.responseText;
                        //console.log(this.responseText);

                        // PLUGIN JS DATA TABLE
                        $('#tblSubject').DataTable();
                    }
                };
                xhttp.open("GET", "ajax/Subject/ShowSubjectList.php", true);
                xhttp.send();
            }
        </script>
</body>
</html>