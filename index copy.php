<?php require_once 'core/init.php'?>
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
                <h1>LOGIN</h1>

                <select name="ddlUser" id="ddlUser" class="select2">
                    <option value="MaryJane">Mary Jane</option>
                    <option value="Patrick">Patrick</option>
                    <option value="ChieChie">ChieChie</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <button onclick="loadDoc()">get data</button>

                <div id="divDataTable">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Column 1</th>
                                <th>Column 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($x = 1; $x <= 100; $x++){ ?>
                            <tr>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 2</td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

    </div>
    


    <!-- PLUGIN JS -->
    <?php include('include/page_js.php')?>

    <!-- CUSTOM JS -->
    <script>
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
        });

        // SELECT2 CUSTOM JS
        $(".select2").select2();

        //DATATABLES 
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        // AJAX
        function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("divDataTable").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "ajax/index_reload_data_table.php", true);
            xhttp.send();
        }
    </script>
</body>
</html>