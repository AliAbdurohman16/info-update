<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('v_login');
	}
	
	public function aksi() 
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

		if ($this->form_validation->run()!=false) {
			// Menangkap data username dan password dari halaman login
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$where = [
				'pengguna_username' => $username,
				'pengguna_password' => md5($password),
				'pengguna_status' => 1
			];

			$this->load->model('m_data');

			// Cek kesalahan login pada table pengguna
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();

			// Cek jika login benar
			if ($cek > 0) {
				// Ambil data pengguna yang melakukan login
				$data = $this->m_data->cek_login('pengguna', $where)->row();

				// Buat session untuk yang berhasil login
				$data_session = [
					'id' => $data->pengguna_id,
					'username' => $data->pengguna_username,
					'level' => $data->pengguna_level,
					'status' => 'telah_login'
				];
				$this->session->set_userdata($data_session);

				// Alihkan halaman ke halaman dashboard pengguna
				redirect(base_url().'dashboard');
			} else {
				redirect(base_url().'login?alert=gagal');
			}
		} else {
			$this->load->view('v_login');
		}
	}
}
