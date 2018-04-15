<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_absen');

		date_default_timezone_set('Asia/Kolkata');
	}

	public function index()
	{


		$id_pegawai = $this->session->userdata('id_pegawai');
		$date = date('Y-m-d');
		$cek_data = $this->m_absen->cek_data('absen',$id_pegawai, $date);

		if (is_null($cek_data)) {
			$info = array(
				'in' => '',
				'out' => 'disable' 
			);
		}elseif ($cek_data['jam_keluar'] == NULL) {
            $info = array(
                "in" => "disabled",
                "out" => "");
        } else {
            $info = array(
                "in" => "disabled",
                "out" => "disabled");
        }

		$data = array(
			'title' => 'Absensi pegawai',
			'abs' => $this->m_absen->getabsen('absen', $id_pegawai),
			'info' => $info
		);

		$tmp['konten'] = $this->load->view('pegawai/absen',$data, TRUE);
		$this->load->view('pegawai/layout',$tmp);
	}

	public function save()
	{


		$date = date("Y-m-d");
		$time = date("H:i:s");
		$id_pegawai = $this->session->userdata('id_pegawai');

		$action = $this->input->get_post('btn');

		if ($action == 'in') {
			$data = array(
				'note' => $this->input->post('note'),
				'tanggal' => $date,
				'jam_masuk' => $time,
				'id_pegawai' => $id_pegawai
			);

			$this->m_absen->simpan('absen', $data);
			header('location:'.base_url().'pegawai/absen');
		}else if($action == 'out'){
			$data = array(
				'note' => $this->input->post('note'),
				'jam_keluar' => $time
			);
			$this->m_absen->update('absen', $data, $id_pegawai, $date);
			header('location:'.base_url().'pegawai/absen');

		}
	}

}

/* End of file Absen.php */
/* Location: ./application/controllers/Absen.php */