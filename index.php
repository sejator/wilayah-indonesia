<?php
require_once('provinsi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wilayah Indonesia</title>
    <script src="jquery/jquery.min.js"></script>
    <style>
        .wilayah {
            width: 250px;
        }
    </style>
</head>
<body>
    <div class="wilayah">
        <p>Provinsi</p>
        <select name="provinsi" id="provinsi" style="width: 100%;">
            <option value="">--Pilih Provinsi--</option>
            <?php
            foreach ($result as $key => $val) : ?>
                <option value="<?=$val['id']?>"><?= $val['nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <p>Kota/Kabupaten</p>
        <select name="kab" id="kab" style="width: 100%;"></select>
        <p>Kecamatan</p>
        <select name="kec" id="kec" style="width: 100%;"></select>
        <p>Kelurahan</p>
        <select name="kel" id="kel" style="width: 100%;"></select>
    </div>
    <script>
        $("#provinsi").change(function (e) {
            let id = e.target.value;
            $.ajax({
                url: 'http://localhost/proyek/wilayah/kabupaten.php',
                data: {id:id},
                success: function (respon) {
                    let data = JSON.parse(respon);
                    $("#kab").html(`<option value="">--Pilih Kota/Kab--</option>`)
                    $(data).each(function (i) {
                        $("#kab").append(`<option value="`+data[i].id+`">`+data[i].nama+`</option>`)
                    })
                }
            })
        });

        $("#kab").change(function (e) {
            let id = e.target.value;
            $.ajax({
                url: 'http://localhost/proyek/wilayah/kecamatan.php',
                data: {id:id},
                success: function (respon) {
                    let data = JSON.parse(respon);
                    $("#kec").html(`<option value="">--Pilih Kecamatan--</option>`)
                    $(data).each(function (i) {
                        $("#kec").append(`<option value="`+data[i].id+`">`+data[i].nama+`</option>`)
                    })
                }
            })
        })

        $("#kec").change(function (e) {
            let id = e.target.value;
            $.ajax({
                url: 'http://localhost/proyek/wilayah/kelurahan.php',
                data: {id:id},
                success: function (respon) {
                    let data = JSON.parse(respon);
                    $("#kel").html(`<option value="">--Pilih Kelurahan--</option>`)
                    $(data).each(function (i) {
                        $("#kel").append(`<option value="`+data[i].id+`">`+data[i].nama+`</option>`)
                    })
                }
            })
        })
    </script>
</body>
</html>