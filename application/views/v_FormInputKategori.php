<?php defined('BASEPATH') OR exit('No direct script access allowed') ; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    </head>
    <body>
        <h2 class="mb-3 ms-3 mt-3 text-center"><?php echo $judul ?></h2>
        <form action="<?php echo base_url("Pengeluaran/insert?pSource=kategori")?>" method="post" class="needs-validation" novalidate>
            <div class="form-group mx-auto col-sm-5">
                <div class="mx-4 mt-3">
                    <label for="">Nama Kategori </label></td>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Kategori pengeluaran yang diinginkan"></td>
                    <div class="valid-feedback">
                        Ingin nama apa?~
                    </div>  
                </div>
            </div>
            <div class="form-group mx-auto col-sm-1 mt-3 mb-4">
                <input type="submit" name="input_kategori" class="btn btn-outline-primary">
            </div>
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