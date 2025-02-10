<?php defined('BASEPATH') OR exit('No direct script access allowed') ; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data Pengeluaran</title>
        <link href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    </head>
    <body>
        <h3 class="mt-3 mb-4 text-center"><?php echo $judul ?></h3>

        <form action="<?php echo base_url('Pengeluaran/update')?>" method="post" class="needs-validation" novalidate>
            <?php foreach ($kategori as $data) { ?>
                <div class="form-group mx-auto col-sm-5">
                    <div class="mx-4 mt-3">
                        <label>ID Kategori</label>
                        <input type="text" class="form-control" name="id_pengeluaran" value="<?php echo $data->id_kategori; ?>" readonly>
                    </div>
                    <div class="invalid-feedback">
                            Daftar pengeluaran tentu butuh jumlah pengeluarannya..., kan?
                    </div>
                </div>

                <div class="form-group mx-auto col-sm-5">
                    <div class="mx-4 mt-3">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="id_pengeluaran" value="<?php echo $data->nama_kategori; ?>" readonly>
                    </div>
                    <div class="invalid-feedback">
                            Daftar pengeluaran tentu butuh jumlah pengeluarannya..., kan?
                    </div>
                </div>
                <div class="form-group mx-auto col-sm-1 mt-3">
                    <input type="submit" name="update_kategori" class="btn btn-outline-warning" value="Update Data">
                </div>
            <?php } ?>
        </form>

        <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
        <script>
            (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
            })()
        </script>
    </body>
</html>
