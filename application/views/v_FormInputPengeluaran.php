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
        <form action="<?php echo base_url("Pengeluaran/insert?pSource=pengeluaran")?>" method="post" class="needs-validation" novalidate>
            <div class="form-group mx-auto col-sm-5">
                <div class="mx-4 mt-3">
                    <label for="">Tanggal Transaksi (YYYY-MM-DD)</label></td>
                    <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d')?>"></td>   
                    <div class="valid-feedback">
                        Oh?~
                    </div>  
                </div>
            </div>
            <div class="form-group mx-auto col-sm-5">
                <div class="mx-4 mt-3">
                    <label for="">Deskripsi </label></td>
                    <textarea name="deskripsi" class="form-control" rows="2" placeholder="Bisa tentang barang yang dibeli, alasan, dll."></textarea>
                    <div class="valid-feedback">
                        Tidak wajib diisi, tapi kalau bisa tolong
                    </div>
                </div>
                <div class="mx-4 mt-3">
                    <label for="">Kategori </label></td>
                    <select name="kategori" id="" class="form-select form-select-sm" required>
                        <option selected disabled value="">Pilih Kategori</option>
                        <?php 
                        foreach ( $kategori as $kategori ){
                            echo "<option value='".$kategori->id_kategori."'>".$kategori->nama_kategori."</option>";
                        } ?>
                    </select> 
                    <div class="invalid-feedback">
                        Kategori harus dipastikan~
                    </div>
                </div> 
            </div>           
            <div class="form-group mx-auto col-sm-5 mt-3">
                <div class="mx-4">
                    <label for="">Jumlah Pengeluaran </label></td>
                    <input type="number" name="jumlah_pengeluaran" class="form-control" placeholder="Pengeluaran dalam transaksi ini" required></td> 
                    <div class="valid-feedback">
                        Sudah terisi~!
                    </div>
                    <div class="invalid-feedback">
                        Daftar pengeluaran tentu butuh jumlah pengeluarannya..., kan?
                    </div>
                </div>
            </div>
            <div class="form-group mx-auto col-sm-5">
                <div class="mx-4 mt-3">
                    <label for="">Metode Pembayaran </label></td>
                    <input type="text" name="metode_pembayaran" class="form-control" placeholder="Metode yang digunakan dalam pembayaran / transaksimu~"></td>
                    <div class="valid-feedback">
                        Tidak wajib diisi~
                    </div>  
                </div>
            </div>
            <div class="form-group mx-auto col-sm-1 mt-3 mb-4">
                <input type="submit" name="input_pengeluaran" class="btn btn-outline-primary">
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