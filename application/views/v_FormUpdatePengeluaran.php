<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $pageSource = $this->input->get('pSource');
?>
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

        <form action="<?php echo base_url('Pengeluaran/update?pSource='.$pageSource)?>" method="post" class="needs-validation" novalidate>
            <?php foreach ($pengeluaran as $data) { ?>
                <div class="form-group mx-auto col-sm-5">
                    <div class="mx-4 mt-3">
                        <label>ID Pengeluaran</label>
                        <input type="text" class="form-control" name="id_pengeluaran" value="<?php echo $data->id_pengeluaran; ?>" readonly>
                    </div>
                </div>
                
                <div class="form-group mx-auto col-sm-5">
                    <div class="mx-4 mt-3">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="<?php echo $data->tanggal; ?>">
                        <div class="valid-feedback">
                            Oh?~
                        </div> 
                    </div>
                </div>

                <div class="form-group mx-auto col-sm-5">
                    <div class="mx-4 mt-3">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi"><?php echo $data->deskripsi;?></textarea>
                        <div class="valid-feedback">
                            Tidak wajib diisi, tapi kalau bisa tolong
                        </div>
                    </div>
                </div>

                <div class="form-group mx-auto col-sm-5">
                    <div class="mx-4 mt-3">
                        <label>Kategori</label>
                        <select name="kategori" class="form-select form-select-sm" required>
                            <?php foreach ($kategori as $kat) {
                                $selected = ($kat->id_kategori == $data->kategori) ? 'selected' : '';
                                echo "<option value='{$kat->id_kategori}' {$selected}>{$kat->nama_kategori}</option>"; 
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group mx-auto col-sm-5">
                    <div class="mx-4 mt-3">
                        <label>Jumlah Pengeluaran</label>
                        <input type="number" class="form-control" name="jumlah_pengeluaran" value="<?php echo $data->jumlah_pengeluaran; ?>" required>
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
                        <label>Metode Pembayaran</label>
                        <input type="text" class="form-control" name="metode_pembayaran" value="<?php echo $data->metode_pembayaran; ?>">
                        <div class="valid-feedback">
                            Tidak wajib diisi, tapi kalau bisa tolong
                        </div>
                    </div>
                </div>
                <div class="form-group mx-auto col-sm-1 mt-3">
                    <input type="submit" name="update_pengeluaran" class="btn btn-outline-warning" value="Update Data">
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
