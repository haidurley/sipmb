<?php
class M_pmb extends CI_Model 
{
    public function listpendaftar()
    {
        return $this->db->get('pendaftar');
    }

    public function listProdi()
    {
        return $this->db->get('prodi')->result_array();
    }
    
    public function listpendaftarPrestasi()
    {
        $this->db->group_by('tingkat_prestasi');
        $data = $this->db->get('pendaftar_prestasi')->result_array();

        return $data;
    }
    
    public function listJalurMasuk()
    {
        return $this->db->get('jalur_masuk2')->result_array();
    }
    
    public function listBank()
    {
        return $this->db->get('bank2')->result_array();
    }

    public function jumlahPendaftarProdi1($idProdi)
    {
        $result = 0;
        $this->db->where('id_prodi1', $idProdi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }
    public function jumlahPendaftarProdi2($idProdi)
    {
        $result = 0;
        $this->db->where('id_prodi2', $idProdi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }
    public function jumlahPendaftarPrestasi($idPrestasi)
    {
        $result = 0;
        $this->db->where('tingkat_prestasi', $idPrestasi);
        $data = $this->db->get('pendaftar_prestasi')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }

    public function jumlahPendaftarJalurMasuk($idMasuk)
    {
        $result = 0;
        $this->db->where('id_jalur_masuk', $idMasuk);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }

    public function pendaftarBank()
    {
        $this->db->select(['COUNT(id_pendaftar) AS jumlah', 'SUM(pendaftar.nominal_bayar) as total', 
        'pendaftar.id_bank', 'pendaftar.is_bayar', 'bank2.nama_bank']);
        $this->db->join('bank2', 'pendaftar.id_bank = bank2.id_bank');
        $this->db->where_in('id_jalur_masuk', [2,3]);
        $this->db->group_by(['id_bank', 'is_bayar']);
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }

    public function pendapatan()
    {
        return $this->db->get('no5')->result_array();
    }
    public function sudahbayar()
    {
        return $this->db->get('no6bayar')->result_array();
    }
    public function belumbayar()
    {
        return $this->db->get('no6belum')->result_array();
    }




    
}