<?php

    class DaftarPengeluaran extends CI_Model{
        function __construct() {
            parent::__construct();
        }

        function get_daftarpengeluaran(){
            return $this->db->get('raihan_pengeluaranpribadi')->result();
        }

        function get_daftarkategori(){
            return $this->db->get('raihan_kategoripengeluaran')->result();
        }

        function get_jumlahpengeluaran(){
            return (int)$this->db   ->select_sum('jumlah_pengeluaran')
                                    ->get('raihan_pengeluaranpribadi')
                                    ->row()->jumlah_pengeluaran;
        }

        function get_maxpengeluaran(){
            return $this->db    ->select('max(jumlah_pengeluaran) as max_pengeluaran, nama_kategori, tanggal')
                                ->from('raihan_pengeluaranpribadi')
                                ->join('raihan_kategoripengeluaran', 'raihan_kategoripengeluaran.id_kategori = raihan_pengeluaranpribadi.kategori', 'inner')
                                ->get()->result();
            // return (int)$this->db   ->select_max('jumlah_pengeluaran')
            //                         ->get('raihan_pengeluaranpribadi')
            //                         ->row()->jumlah_pengeluaran;
        }

        function get_kategoripengeluaran(){
            return $this->db->get('raihan_kategoripengeluaran')->result();
        }

        function innerjoin_kategoridaftar(){
            return $this->db    ->select('*')
                                ->from('raihan_pengeluaranpribadi')
                                ->join('raihan_kategoripengeluaran', 'raihan_kategoripengeluaran.id_kategori = raihan_pengeluaranpribadi.kategori', 'inner')
                                ->order_by('tanggal', 'ASC')
                                ->get()->result();
        }

        function innerjoin_jumlahkategori(){
            return $this->db    ->select('kategori, COUNT(kategori) as jumlah_kategori, nama_kategori')
                                ->from('raihan_pengeluaranpribadi')
                                ->join('raihan_kategoripengeluaran', 'raihan_kategoripengeluaran.id_kategori = raihan_pengeluaranpribadi.kategori', 'inner')
                                ->group_by('kategori')
                                ->get()->result();
        }

        function get_one($namaId, $id_pengeluaran, $namaTabel){
            return $this->db->get_where($namaTabel, array($namaId => $id_pengeluaran))->result();
        }

        function update($namaId, $data, $namaTabel){
            $this->db->update($namaTabel, $data, array($namaId => $data[$namaId]));
        }

        function insert_daftarpengeluaran($namaTabel, $data){
            $this->db->insert($namaTabel, $data);
            return $this->db->affected_rows();
        }

        function delete($namaId, $id, $namaTabel){
            $this->db->delete($namaTabel, array($namaId => $id));
            return $this->db->affected_rows();
        }

        function cekIDdiDatabase($id, $namaTabel, $idRecord)
        {
            $this->db->where($idRecord, $id);
            $query = $this->db->get($namaTabel);

            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }