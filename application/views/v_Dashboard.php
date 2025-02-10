<?php defined('BASEPATH') OR exit('No direct script access allowed') ; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta charset="UTF-8">
        <title>Pengeluaran Pribadi</title>
        
        <link href="<?php echo base_url('assets/mdbootstrap/css/mdb.min.css')?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
        <!-- MDB icon -->
        <!--<link rel="icon" href="<?php //echo base_url('assets/mdbootstrap/img/mdb-favicon.ico')?>" type="image/x-icon" />-->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- Google Fonts Roboto -->
        <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        />
    </head>
    <body>
    
        <?php $this->load->view('v_sidebar')?>

        <!--Main layout-->
        <main style="margin-top: 58px">
          <div class="container pt-4">
    		<h2 class="mt-2 mb-3 text-center"><?php echo $judul ?></h2>

            <table class="table table-responsive table-bordered text-center align-middle">
                <thead class="table-dark border-4">
                    <tr class="align-middle">
                        <td class="">Total Pengeluaran</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rp. <?php echo formatangka($totalPengeluaran)?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-responsive table-bordered text-center align-middle">
                <thead class="table-dark border-4">
                    <tr class="align-middle">
                        <td>Pengeluaran Terbanyak dalam 1 Transaksi</td>
                        <td>Kategori</td>
                        <td>Tanggal</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rp. <?php echo formatangka($maxPengeluaran[0]->max_pengeluaran)?></td>
                        <td><?php echo$maxPengeluaran[0]->nama_kategori?></td>
                        <td><?php echo$maxPengeluaran[0]->tanggal?></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-responsive table-bordered text-center align-middle">
                <thead class="table-dark border-4">
                    <tr class="align-middle">
                        <td class="">ID Kategori</td>
                        <td>Kategori</td>
                        <td>Jumlah</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $itemsPerPage = 5;
                        $startIndex = ($page - 1) * $itemsPerPage;
                        $endIndex = $startIndex + $itemsPerPage;

                        for ($i = $startIndex; $i < min($endIndex, count($jumlah)); $i++) {
                            $data = $jumlah[$i];
                            echo
                            "<tr>
                                <td>{$data->kategori}</td>
                                <td>{$data->nama_kategori}</td>
                                <td>{$data->jumlah_kategori}</td>
                            </tr>";
                        };                   
                    ?>
                </tbody>
            </table>
          </div>
        </main>
        <!--Main layout-->
            

        <?php
            $totalPages = ceil(count($jumlah) / $itemsPerPage);  

            if (isset($jumlah) && $totalPages > 1){
                $nextDisable = ($page != $totalPages) ? "" : "disabled" ;
                $prevDisable = ($page != 1) ? "" : "disabled" ;
                echo    '
                    <div class="text-center align-middle mb-3">
                        <a class="btn btn-dark '.$prevDisable.'" href="'.base_url('Pengeluaran/page?pSource=Dashboard&page=1').'"><i class="fas fa-angles-left"></i></a>
                        <a class="btn btn-dark '.$prevDisable.'" href="'.base_url('Pengeluaran/page?pSource=Dashboard&page='.($page - 1)).'"><i class="fas fa-angle-left"></i></a>
                        <a class="btn btn-dark '.$nextDisable.'" href="'.base_url('Pengeluaran/page?pSource=Dashboard&page='.($page + 1)).'"><i class="fas fa-angle-right"></i></a>
                        <a class="btn btn-dark '.$nextDisable.'" href="'.base_url('Pengeluaran/page?pSource=Dashboard&page='.$totalPages).'"><i class="fas fa-angles-right"></i></a>
                        <h6 class="mt-2">Halaman '.$page.' / '.$totalPages.'</h6>
                    </div>';
            }
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
        <script src="<?php echo base_url('assets/mdbootstrap/js/mdb.min.js')?>"></script>
        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
        
</body>
</html>