<?php
include "MYSQL/registraciaMYSQL.php";
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/hlavneCSS.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>
<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="completeModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p>Predmet</p>
                    <input type="text" id="completePredmet" class="form-control" placeholder="Predmet" required
                           minlength="5">
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p>Text</p>
                    <input type="text" id="completeText" class="form-control" placeholder="Text" required minlength="5">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="bi-trash-fill btn-primary my-3" data-dismiss="modal">Close</button>
                <button type="button" onclick="pridaj()" class="btn_insert btn-primary my-3">Pridaj</button>
            </div>
        </div>
    </div>
</div>

<div class="container my-3">
    <h1>Forum najlepsie</h1>
    <button type="button" class="btn_insert my-3" data-toggle="modal" data-target="#completeModal">
        Pridaj
    </button>
    <div id="displayDataTable"></div>


</div>

<script>

    //zobrazenie vsetkych dat
    $(document).ready(function () {
        displayData();
    });

    function displayData() {
        var displayData = "true";
        $.ajax({
            url: "MYSQL/forumSQL.php",
            type: 'post',
            data: {
                displayPos: displayData
            },
            success: function (data, status) {
                $('#displayDataTable').html(data);
            }
        })
    }

    //pridaj prispevok
    function pridaj() {
        var predmet = $('#completePredmet').val();
        var text = $('#completeText').val();

        $.ajax({
            url: "MYSQL/forumSQL.php",
            type: 'post',
            data: {
                predmetPos: predmet,
                textPos: text
            },
            success: function (data, status) {
                $('#completeModal').modal("hide");
                displayData();
            }
        });
    }


    //Vymaz prispevok
    function vymazPrispevok(deleteid) {
        $.ajax({
            url: "MYSQL/forumSQL.php",
            type: 'post',
            data: {
                deletePos: deleteid
            },
            success: function (data, status) {
                displayData();
            }
        });
    }

</script>
</body>
</html>