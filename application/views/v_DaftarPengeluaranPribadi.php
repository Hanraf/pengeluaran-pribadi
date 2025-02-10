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
    
        <?php 
            $pSource = $this->input->get('pSource');
            $this->load->view('v_sidebar');
        ?>

        <!--Main layout-->
        <main style="margin-top: 58px">
          <div class="container pt-4">
    		<h2 class="mt-3 text-center"><?php echo $judul ?></h2>
            <?php echo $this->session->flashdata('msg');?>
            <div class="d-flex mb-1 justify-content-between">
                <h3><a class="ms-3 mb-1 btn btn-primary btn-lg" href=<?php echo base_url('Pengeluaran/insert?pSource='.$pSource)?>>Tambah Daftar</a></h3>           
                <p class="ms-auto mt-4 me-3">Total pengeluaran = Rp. <?php echo formatangka($totalPengeluaran)?></p>
            </div>

            <table class="table table-responsive table-bordered text-center align-middle">
                <thead class="table-dark border-4">
                    <tr class="align-middle">                       
                        <td>Tanggal</td>
                        <td>ID Pengeluaran</td>
                        <td>Deskripsi</td>
                        <td>Kategori</td>
                        <td>Jumlah Pengeluaran</td>
                        <td>Metode Pembayaran</td>
                        <td>Tanggal Input</td>
                        <td colspan="2">Aksi</td> 
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $itemsPerPage = 5;
                        $startIndex = ($page - 1) * $itemsPerPage;
                        $endIndex = $startIndex + $itemsPerPage;

                        for ($i = $startIndex; $i < min($endIndex, count($pengeluaran)); $i++) {
                            $data = $pengeluaran[$i];
                            echo
                            "<tr>
                                <td>{$data->tanggal}</td>
                                <td>{$data->id_pengeluaran}</td>
                                <td>{$data->deskripsi}</td>
                                <td>
                                    <span data-bs-toggle='tooltip' data-bs-title='$data->kategori'>".$data->nama_kategori."</span>
                                </td>
                                <td>Rp. ".formatangka($data->jumlah_pengeluaran)."</td>
                                <td>{$data->metode_pembayaran}</td>
                                <td>{$data->tanggal_input}</td>
                                <td>
                                    <a class='btn btn-warning btn-sm' href=";echo base_url('Pengeluaran/update/'.$data->id_pengeluaran.'?pSource=pengeluaran'); echo">Update</a>
                                </td>
                                <td>
                                    <a class='btn btn-danger btn-sm' href=";echo base_url('Pengeluaran/delete/'.$data->id_pengeluaran.'?pSource=pengeluaran'); echo">Delete</a>
                                </td>
                            </tr>";
                        };                   
                    ?>
                </tbody>
            </table>
          </div>
        </main>
        <!--Main layout-->
            
        <?php
            $totalPages = ceil(count($pengeluaran) / $itemsPerPage);  

            if (isset($pengeluaran) && $totalPages > 1){
                $nextDisable = ($page != $totalPages) ? "" : "disabled" ;
                $prevDisable = ($page != 1) ? "" : "disabled" ;
                echo    '
                    <div class="text-center align-middle mb-3">
                        <a class="btn btn-dark '.$prevDisable.'" href="'.base_url('Pengeluaran/page?pSource='.$pSource.'&page=1').'"><i class="fas fa-angles-left"></i></a>
                        <a class="btn btn-dark '.$prevDisable.'" href="'.base_url('Pengeluaran/page?pSource='.$pSource.'&page='.($page - 1)).'"><i class="fas fa-angle-left"></i></a>
                        <a class="btn btn-dark '.$nextDisable.'" href="'.base_url('Pengeluaran/page?pSource='.$pSource.'&page='.($page + 1)).'"><i class="fas fa-angle-right"></i></a>
                        <a class="btn btn-dark '.$nextDisable.'" href="'.base_url('Pengeluaran/page?pSource='.$pSource.'&page='.$totalPages).'"><i class="fas fa-angles-right"></i></a>
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