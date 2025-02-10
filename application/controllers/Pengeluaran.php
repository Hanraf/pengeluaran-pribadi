<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Pengeluaran extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('DaftarPengeluaran');
        }

        function index(){
            $data['judul'] = "Dashboard";
            $data['jumlah'] = $this->DaftarPengeluaran->innerjoin_jumlahkategori();
            $data['totalPengeluaran'] = $this->DaftarPengeluaran->get_jumlahpengeluaran();
            $data['maxPengeluaran'] = $this->DaftarPengeluaran->get_maxpengeluaran();
            $this->load->view('v_Dashboard', $data);
        }

        function page(){
            $pageSource = $this->input->get('pSource');
            if ($pageSource == 'kategori'){
                $data['judul'] = "Kategori Pengeluaran";
                $data['kategori'] = $this->DaftarPengeluaran->get_kategoripengeluaran();
                $this->load->view('v_DaftarKategori', $data);
            } else if ($pageSource == 'pengeluaran'){
                $data['judul'] = "Daftar Pengeluaran Pribadi";
                $data['pengeluaran'] = $this->DaftarPengeluaran->innerjoin_kategoridaftar();
                $data['totalPengeluaran'] = $this->DaftarPengeluaran->get_jumlahpengeluaran();
                $this->load->view('v_DaftarPengeluaranPribadi', $data);
            }
            
        }

        function insert(){
            $pageSource = $this->input->get('pSource');
            
            if($this->input->post())
            {
                $data_input_user = $this->input->post();
                $number = 1;
                
                if(isset($_POST['input_pengeluaran'])){
                    $pre_id = "P";
                    $namaTabel = 'raihan_pengeluaranpribadi';
                    $idRecord = "id_pengeluaran";
                    unset($data_input_user['input_pengeluaran']);
                }
                else if(isset($_POST['input_kategori'])){
                    $pre_id = "K";
                    $namaTabel = 'raihan_kategoripengeluaran';
                    $idRecord = "id_kategori";
                    unset($data_input_user['input_kategori']);
                }
                $temp_id = $pre_id.$number;
                
                while ($this->DaftarPengeluaran->cekIDdiDatabase($temp_id, $namaTabel, $idRecord)) {
                    $number++;
                    $temp_id = $pre_id.$number;
                }
                $data_input_user[$idRecord] = $temp_id;

                $result = $this->DaftarPengeluaran->insert_daftarpengeluaran($namaTabel, $data_input_user);
                if($result > 0){
                    $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success" role="alert">
                        Data berhasil terinput dengan id '.$temp_id.'
                    </div>');
                    redirect(base_url('Pengeluaran/page?pSource='.$pageSource));
                }
                else{
                    $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger" role="alert">
                        Data belum terinput
                    </div>' );
                }
            }
            else
            {
                if ($pageSource == 'pengeluaran'){
                    $data['judul'] = "INPUT PENGELUARAN";
                    $data['kategori'] = $this->DaftarPengeluaran->get_kategoripengeluaran();
                    $this->load->view('v_FormInputPengeluaran', $data);
                } else if ($pageSource == 'kategori'){
                    $data['judul'] = "INPUT KATEGORI";
                    $this->load->view('v_FormInputKategori', $data);
                }
            }
        }

        public function update($id_pengeluaran = null){
            $pageSource = $this->input->get('pSource');
            if ($this->input->post())
            {
                $id = $this->input->post();
                if(isset($_POST['update_pengeluaran'])){
                    $namaTabel = 'raihan_pengeluaranpribadi';
                    $namaId = 'id_pengeluaran';
                    unset($id['update_pengeluaran']);
                } else if (isset($_POST['update_kategori'])){
                    $namaTabel = 'raihan_kategoripengeluaran';
                    $namaId = 'id_kategori';
                    unset($id['update_kategori']);
                }

                $result = $this->DaftarPengeluaran->update($namaId, $id, $namaTabel);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success" role="alert">
                        Data '.$id[$namaId].' berhasil diubah
                    </div>');
                }
                else{
                    $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger" role="alert">
                        Data belum terhapus
                    </div>' );
                }
                redirect(base_url('Pengeluaran/page?pSource='.$pageSource));
            } else {
                if($pageSource == 'pengeluaran'){
                    $data['judul'] = "UPDATE DATA Pengeluaran Pribadi";
                    $namaId = 'id_pengeluaran';
                    $namaTabel = 'raihan_pengeluaranpribadi';
                    $data['pengeluaran'] = $this->DaftarPengeluaran->get_one($namaId, $id_pengeluaran, $namaTabel);
                    $data['kategori'] = $this->DaftarPengeluaran->get_kategoripengeluaran();
                    $this->load->view('v_FormUpdatePengeluaran', $data);
                } else if ($pageSource == 'kategori'){
                    $data['judul'] = "UPDATE DATA Kategori";
                    $namaId = 'id_kategori';
                    $namaTabel = 'raihan_kategoripengeluaran';
                    $data['kategori'] = $this->DaftarPengeluaran->get_one($namaId, $id_pengeluaran, $namaTabel);
                    $this->load->view('v_FormUpdatePengeluaran', $data);
                }
            }
        }

        function delete($id){
            $pageSource = $this->input->get('pSource');
            if($pageSource == 'pengeluaran'){
                $namaTabel = 'raihan_pengeluaranpribadi';
                $namaId = 'id_pengeluaran';
            } else if($pageSource == 'kategori'){
                $namaTabel = 'raihan_kategoripengeluaran';
                $namaId = 'id_kategori';
            }

            $result = $this->DaftarPengeluaran->delete($namaId, $id, $namaTabel);
                if($result > 0){
                    $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success" role="alert">
                        Data '.$id.' berhasil terhapus
                    </div>');
                }
                else{
                    $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger" role="alert">
                        Data belum terhapus
                    </div>' );
                }
                redirect(base_url('Pengeluaran/page?pSource='.$pageSource));
        }
    }