<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pmb', 'm_pmb');
	}
	public function index()
	{ 
		$this->load->view('index/index');
	}

	public function prodi1()
	{ 
		
		$data['title'] = 'Grafik Berdasarkan Prodi 1';
		$prodi = $this->m_pmb->listProdi();
        foreach ($prodi as $key => $p) {
            $prodi[$key]['jumlah'] = $this->m_pmb->jumlahPendaftarProdi1($p['id_prodi']);
            $prodi[$key]['jumlah2'] = $this->m_pmb->jumlahPendaftarProdi2($p['id_prodi']);
            $prodi[$key]['size'] = rand(10, 30);
        }

        //grafik pertama
        $result = null;
        foreach ($prodi as $p => $prod) {
            //if ($prod['jumlah'] > $sum) {
                //$sum = $prod['jumlah'];
                //$sliced = true;
                //$selected = true;
        	// }
				$result[$p] = [
				"name"  => $prod['nama_prodi'],
				"jumlah" => $prod['jumlah'],
				"y"     => $prod['size'],
				//"sliced" => $sliced,
				//'selected' => $selected
            ];
        }

        $data['pendaftar'] = $prodi;
        $data['grafik1'] = json_encode($result);
		$this->load->view('index/prodi1', $data);
	}

	public function prodi2()
	{ 
		
		$data['title'] = 'Grafik Berdasarkan Prodi 2';
		$prodi = $this->m_pmb->listProdi();
        foreach ($prodi as $key => $p) {
            $prodi[$key]['jumlah'] = $this->m_pmb->jumlahPendaftarProdi1($p['id_prodi']);
            $prodi[$key]['jumlah2'] = $this->m_pmb->jumlahPendaftarProdi2($p['id_prodi']);
            $prodi[$key]['size'] = rand(10, 30);
        }

        //grafik kedua
        $result = null;
        foreach ($prodi as $p => $prod) {
				$hasil[$p] = [
				"name"  => $prod['nama_prodi'],
				"jumlah" => $prod['jumlah2'],
				"y"     => $prod['size'],
				//"sliced" => $sliced,
				//'selected' => $selected
            ];
        }

        $data['pendaftar'] = $prodi;
        $data['grafik2'] = json_encode($hasil);
		$this->load->view('index/prodi2', $data);
	}

	public function prestasi()
	{ 
		
		$data['title'] = 'Grafik Berdasarkan Prestasi';
		$prestasi = $this->m_pmb->listpendaftarPrestasi();
        foreach ($prestasi as $key => $pr) {
            $prestasi[$key]['jumlah3'] = $this->m_pmb->jumlahPendaftarPrestasi($pr['tingkat_prestasi']);
            $prestasi[$key]['size'] = rand(10, 300);
        }

        //grafik ketiga
        $result = null;
        foreach ($prestasi as $pr => $pres) {
				$hasil[$pr] = [
				"name"  => $pres['tingkat_prestasi'],
				"jumlah" => $pres['jumlah3'],
				"y"     => $pres['size'],
				//"sliced" => $sliced,
				//'selected' => $selected
            ];
        }


        $data['pendaftar_prestasi'] = $prestasi;
        $data['grafik3'] = json_encode($hasil);
		$this->load->view('index/prestasi', $data);
	}

	public function jalurmasuk()
	{ 
		
		$data['title'] = 'Grafik Berdasarkan Jalur Masuk';
		$masuk = $this->m_pmb->listJalurMasuk();
        foreach ($masuk as $key => $m) {
            $masuk[$key]['jumlah4'] = $this->m_pmb->jumlahPendaftarJalurMasuk($m['id_jalur_masuk']);
            $masuk[$key]['size'] = rand(10, 30);
        }

        //grafik keempat
        $result = null;
        foreach ($masuk as $m => $mas) {
				$hasil[$m] = [
				"name"  => $mas['nama_jalur'],
				"jumlah" => $mas['jumlah4'],
				"y"     => $mas['size'],
				//"sliced" => $sliced,
				//'selected' => $selected
            ];
        }

        $data['pendaftar'] = $masuk;
        $data['grafik4'] = json_encode($hasil);
		$this->load->view('index/jalurmasuk', $data);
	}

	public function pendapatan()
	{ 
    
		$data['title'] = 'Grafik Berdasarkan Pendapatan Bank';
		$dapat = $this->m_pmb->pendapatan();
		foreach ($dapat as $key => $d) {
            $dapat[$key]['size'] = rand(10, 30);
        }
        
        //grafik kelima
       	$result = null;
        foreach ($dapat as $d => $dap) {
			$hasil[$d] = [
				"name"  => $dap['nama_bank'],
				"jumlah" => $dap['jumlah'],
				"y"     => $dap['size'],
				//"sliced" => $sliced,
				//'selected' => $selected
            ];
        }
		

        $data['Pendapatan'] = $dapat;
        $data['grafik5'] = json_encode($hasil);
		$this->load->view('index/pendapatan', $data);
	}

	public function pembayaran()
	{ 
    
		$data['title'] = 'Grafik Berdasarkan Pembayaran';
		$bayar = $this->m_pmb->sudahbayar();
		foreach ($bayar as $key => $sb) {
            $bayar[$key]['size'] = rand(10, 30);
        }
		$belum = $this->m_pmb->belumbayar();
		foreach ($belum as $key => $bb) {
            $belum[$key]['size'] = rand(10, 30);
        }

        //grafik keenam
       	$result = null;
        foreach ($bayar as $sb => $bay) {
			$hasil[$sb] = [
				"name"  => $bay['nama_bank'],
				"jumlah" => $bay['jumlah'],
				"y"     => $bay['size'],
				//"sliced" => $sliced,
				//'selected' => $selected
            ];
        }
		//grafik ketujuh
		$result = null;
        foreach ($belum as $bb => $bel) {
			$jumlah[$bb] = [
				"name"  => $bel['nama_bank'],
				"jumlah" => $bel['jumlah'],
				"y"     => $bel['size'],
				//"sliced" => $sliced,
				//'selected' => $selected
            ];
        }
		

        $data['Pembayaran1'] = $bayar;
		$data['Pembayaran2'] = $belum;
        $data['grafik6'] = json_encode($hasil);
		$data['grafik7'] = json_encode($jumlah);
		$this->load->view('index/pembayaran', $data);
	}

}