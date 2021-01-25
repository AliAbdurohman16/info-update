<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		
		$this->load->model('m_data');

		// cek session yang login,
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status')!="telah_login") {
			redirect(base_url().'login?alert=belum_login');
		}

	}

	// Halaman Dashboard
	public function index() 
	{
		$data = [ 
			// Hitung jumlah artikel
			'jumlah_artikel' => $this->m_data->get_data('artikel')->num_rows(),
			// Hitung jumlah kategori
			'jumlah_kategori' => $this->m_data->get_data('kategori')->num_rows(),
			// Hitung jumlah pengguna
			'jumlah_pengguna' => $this->m_data->get_data('pengguna')->num_rows(),
			// Hitung jumlah halaman
			'jumlah_halaman' => $this->m_data->get_data('halaman')->num_rows()
		];

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_index', $data);
		$this->load->view('dashboard/v_footer');
	}
	// Akhir Halaman Dashboard

	// Halaman Kategori
	public function kategori()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_aksi()
	{
		$this->form_validation->set_rules('kategori', 'Nama Kategori', 'required');

		if ($this->form_validation->run() != false) {

			$kategori = $this->input->post('kategori');

			$data = [
				'kategori_nama' => $kategori,
				'kategori_slug' => strtolower(url_title($kategori))
			];

			$this->m_data->insert_data($data, 'kategori');

			redirect(base_url('dashboard/kategori'));

		}else {
			$this->kategori_tambah();
		}
		
	}

	public function kategori_edit($id)
	{
		$where = [
			'kategori_id' => $id
		];

		$data['kategori'] = $this->m_data->edit_data($where, 'kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_edit', $data);
		$this->load->view('dashboard/v_footer'); 
	}

	public function kategori_update()
	{
		$this->form_validation->set_rules('kategori', 'Nama Kategori', 'trim|required');
		
		if ($this->form_validation->run() != false) {

			$id = $this->input->post('id');
			$kategori = $this->input->post('kategori');

			$where = [
				'kategori_id' => $id
			];

			$data = [
				'kategori_nama' => $kategori,
				'kategori_slug' => strtolower(url_title($kategori))
			];

			$this->m_data->update_data($where, $data, 'kategori');

			redirect(base_url('dashboard/kategori'));

		} else {
			$id = $this->input->post('id');
			$where = [
				'kategori_id' => $id
			];
	
			$data['kategori'] = $this->m_data->edit_data($where, 'kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_edit', $data);
			$this->load->view('dashboard/v_footer'); 
		}
	}

	public function kategori_hapus($id) {
		$where = [
			'kategori_id' => $id
		];

		$this->m_data->delete_data($where, 'kategori');

		redirect(base_url('dashboard/kategori'));
	}
	// Akhir Halaman Kategori


	// Halaman Artikel
	public function artikel()
	{
		$data['artikel'] = $this->db->query("SELECT * FROM artikel, kategori, pengguna WHERE artikel_kategori = kategori_id AND artikel_author = pengguna_id ORDER BY artikel_id DESC")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_artikel', $data);
		$this->load->view('dashboard/v_footer');
	}
	
	public function artikel_tambah()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_artikel_tambah', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function artikel_aksi()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[artikel.artikel_judul]');
		$this->form_validation->set_rules('konten', 'Konten', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['sampul']['name'])) {
			$this->form_validation->set_rules('sampul', 'Gambar Sampul', 'trim|required');
		}

		if ($this->form_validation->run() != false) {
			
			$config = [
				'upload_path' => './gambar/artikel/',
				'allowed_types' => 'gif|jpg|png|jpeg'
			];

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('sampul')) {
				
				// Mengambil data tentang gambar
				$gambar = $this->upload->data();

				$tanggal = date('Y-m-d H:i:s');
				$judul = $this->input->post('judul');
				$slug = strtolower(url_title($judul));
				$konten = $this->input->post('konten');
				$sampul = $gambar['file_name'];
				$author = $this->session->userdata('id');
				$kategori = $this->input->post('kategori');
				$status = $this->input->post('status');
				
				$data = [
					'artikel_tanggal' => $tanggal,
					'artikel_judul' => $judul,
					'artikel_slug' => $slug,
					'artikel_konten' => $konten,
					'artikel_sampul' => $sampul,
					'artikel_author' => $author,
					'artikel_kategori' => $kategori,
					'artikel_status' => $status
				];

				$this->m_data->insert_data($data, 'artikel');

				redirect(base_url('dashboard/artikel'));
			} else {
                $this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
                redirect('dashboard/artikel_tambah');
            }
		} else {
			$this->artikel_tambah();
		}
		
	}
	
	public function artikel_edit($id)
	{
		$where = [
			'artikel_id' => $id
		];

		$data = [
			'artikel' => $this->m_data->edit_data($where, 'artikel')->result(),
			'kategori' => $this->m_data->get_data('kategori')->result()
		];

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_artikel_edit', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function artikel_update()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('konten', 'Konten', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

		if ($this->form_validation->run() != false) {
			
			$id = $this->input->post('id');

            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');
            $kategori = $this->input->post('kategori');
			$status = $this->input->post('status');
			
			$where = [
				'artikel_id' => $id
			];
                
            $data = [
                'artikel_judul' => $judul,
                'artikel_slug' => $slug,
                'artikel_konten' => $konten,
                'artikel_kategori' => $kategori,
                'artikel_status' => $status
            ];

			$this->m_data->update_data($where, $data, 'artikel');
			
            if (!empty($_FILES['sampul']['name'])) {
				$config = [
					'upload_path' => './gambar/artikel/',
					'allowed_types' => 'gif|jpg|png|jpeg'
				];

				$this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {

					// Mengambil data tentang gambar
					$gambar = $this->upload->data();

					$data = [
						'artikel_sampul' => $gambar['file_name']
					];

					$this->m_data->update_data($where, $data, 'artikel');

					redirect('dashboard/artikel');
                } else {
					$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
					// redirect('dashboard/artikel');
					$data = [
						'artikel' => $this->m_data->edit_data($where, 'artikel')->result(),
						'kategori' => $this->m_data->get_data('kategori')->result()
					];
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_artikel_edit', $data);
					$this->load->view('dashboard/v_footer');
				}
            } else {
				redirect('dashboard/artikel');
			}
        } else {
			$id = $this->input->post('id');
			$where = [
					'artikel_id' => $id
				];

				$data = [
					'artikel' => $this->m_data->edit_data($where, 'artikel')->result(),
					'kategori' => $this->m_data->get_data('kategori')->result()
				];
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_artikel_edit', $data);
				$this->load->view('dashboard/v_footer');
		}
	}

	public function artikel_hapus($id)
	{
		$where = [
			'artikel_id' => $id
		];

		$this->m_data->delete_data($where, 'artikel');
		redirect('dashboard/artikel');
	}
	// Akhir Halaman Artikel

	// Halaman Pages
	public function pages()
	{
		$data['halaman'] = $this->m_data->get_data('halaman')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pages', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function pages_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pages_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function pages_aksi()
	{
		$this->form_validation->set_rules('judul', 'Judul Halaman', 'trim|required|is_unique[halaman.halaman_judul]');
		$this->form_validation->set_rules('konten', 'Konten Halaman', 'trim|required');

		if ($this->form_validation->run() != false) {
			
			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');

			$data = [
				'halaman_judul' => $judul,
				'halaman_slug' => $slug,
				'halaman_konten' => $konten
			];

			$this->m_data->insert_data($data, 'halaman');

			// Alihkan kembali ke method pages
			redirect('dashboard/pages');
		} else {
			$this->pages_tambah();
		}
	}

	public function pages_edit($id)
	{
		$where = [
			'halaman_id' => $id
		];

		$data['halaman'] = $this->m_data->edit_data($where, 'halaman')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pages_edit', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function pages_update()
	{
        $this->form_validation->set_rules('judul', 'Judul Halaman', 'trim|required');
        $this->form_validation->set_rules('konten', 'Konten Halaman', 'trim|required');

        
        if ($this->form_validation->run() !=  false) {
            $id = $this->input->post('id');

            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');

            $where = [
                'halaman_id' => $id
            ];

            $data = [
                'halaman_judul' => $judul,
                'halaman_slug' => $slug,
                'halaman_konten' => $konten
            ];

            $this->m_data->update_data($where, $data, 'halaman');
            redirect('dashboard/pages');
        } else {
            $id = $this->input->post('id');
            $where = [
                'halaman_id' => $id
            ];

            $data['halaman'] = $this->m_data->edit_data($where, 'halaman')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pages_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
	}

	public function pages_hapus($id)
	{
		$where = [
			'halaman_id' => $id
		];
		 $this->m_data->delete_data($where, 'halaman');
		 
		 redirect('dashboard/pages');
	}
	// Akhir Halaman Pages

	// Halaman Pesan
	public function pesan()
	{
		$data['pesan'] = $this->m_data->get_data('kontak')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pesan', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function pesan_detail($id)
	{
		$where = [
			'id' => $id
		];
		$data['pesan'] = $this->m_data->edit_data($where, 'kontak')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pesan_detail', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function pesan_hapus($id)
	{
		$where = [
			'id' => $id
		];
		 $this->m_data->delete_data($where, 'kontak');
		 
		 redirect('dashboard/pesan');
	}
	// Akhir Halaman Pesan

	// Halaman Pengguna
	public function pengguna()
	{
		$data['pengguna'] = $this->m_data->get_data('pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_aksi()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('password','Password Pengguna','required|min_length[5]');
		$this->form_validation->set_rules('level','Level Pengguna','required');
		$this->form_validation->set_rules('status','Status Pengguna','required');

		if($this->form_validation->run() != false){
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');

			$data = [
				'pengguna_nama' => $nama,
				'pengguna_email' => $email,
				'pengguna_username' => $username,
				'pengguna_password' => $password,
				'pengguna_level' => $level,
				'pengguna_status' => $status,
				'pengguna_foto' => 'default.jpg'
			];

			$this->m_data->insert_data($data,'pengguna');
			redirect(base_url().'dashboard/pengguna/?alert=sukses');
			
		}else{
			$this->pengguna_tambah();
		}	
	}

	public function pengguna_edit($id)
	{
		$where = [
			'pengguna_id' => $id
		];

		$data['pengguna'] = $this->m_data->edit_data($where, 'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_edit', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_update()
	{
			// Wajib isi
			$this->form_validation->set_rules('nama','Nama Pengguna','required');
			$this->form_validation->set_rules('email','Email Pengguna','required');
			$this->form_validation->set_rules('username','Username Pengguna','required');
			$this->form_validation->set_rules('level','Level Pengguna','required');
			$this->form_validation->set_rules('status','Status Pengguna','required');
			
			if($this->form_validation->run() != false){
				$id = $this->input->post('id');
				$nama = $this->input->post('nama');
				$email = $this->input->post('email');
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$level = $this->input->post('level');
				$status = $this->input->post('status');

				//cek jika form password tidak diisi, maka jangan update kolum password, dan sebaliknya
				if($this->input->post('password') == ""){
					$data = [
					'pengguna_nama' => $nama,
					'pengguna_email' => $email,
					'pengguna_username' => $username,
					'pengguna_level' => $level,
					'pengguna_status' => $status
					];
				}else{
					$data = [
						'pengguna_nama' => $nama,
						'pengguna_email' => $email,
						'pengguna_username' => $username,
						'pengguna_password' => $password,
						'pengguna_level' => $level,
						'pengguna_status' => $status
					];
				}
					$where = [
						'pengguna_id' => $id
					];

					$this->m_data->update_data($where,$data,'pengguna');
					redirect(base_url().'dashboard/pengguna');
			}else{
				$id = $this->input->post('id');
				$where = [
					'pengguna_id' => $id
				];
				$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_pengguna_edit',$data);
				$this->load->view('dashboard/v_footer');
		} 
	}

	public function pengguna_hapus($id)
	{
		$where = [
			'pengguna_id' => $id
		];

		$data = [
			'pengguna_hapus' => $this->m_data->edit_data($where, 'pengguna')->row(),
			'pengguna_lain' => $this->db->query("SELECT * FROM pengguna WHERE pengguna_id != $id")->result()
		];
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_hapus', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_hapus_aksi()
	{
		$pengguna_hapus = $this->input->post('pengguna_hapus');
		$pengguna_tujuan = $this->input->post('pengguna_tujuan');
		// hapus pengguna
		$where = [
			'pengguna_id' => $pengguna_hapus
		];

		$this->m_data->delete_data($where, 'pengguna');

		// pindahkan semua artikel pengguna yang dihapus ke pengguna yang dipilih
		$w = [
			'artikel_author' => $pengguna_hapus
		];
		$d = [
			'artikel_author' => $pengguna_tujuan
		];

		$this->m_data->update_data($w, $d, 'artikel');
		redirect(base_url().'dashboard/pengguna');
	}
	// Akhir Halaman Pengguna

	// Halaman Pengaturan
	public function pengaturan()
	{
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();

		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_pengaturan', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function pengaturan_update()
	{
		$this->form_validation->set_rules('nama', 'Nama Website', 'trim|required');
		$this->form_validation->set_rules('nama_singkat', 'Nama Singkat Website', 'trim|required|max_length[13]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('slogan', 'Slogan', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

		
		if ($this->form_validation->run() != FALSE) {

			$nama = $this->input->post('nama');
			$nama_singkat = $this->input->post('nama_singkat');
			$deskripsi = $this->input->post('deskripsi');
			$slogan = $this->input->post('slogan');
			$telepon = $this->input->post('telepon');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$link_facebook = $this->input->post('link_facebook');
			$link_twitter = $this->input->post('link_twitter');
			$link_instagram = $this->input->post('link_instagram');
			$link_github = $this->input->post('link_github');
			$link_linkedin = $this->input->post('link_linkedin');

			$where = [];

			$data = [
				'nama' => $nama,
				'nama_singkat' => $nama_singkat,
				'deskripsi' => $deskripsi,
				'slogan' => $slogan,
				'telepon' => $telepon,
				'email' => $email,
				'alamat' => $alamat,
				'link_facebook' => $link_facebook,
				'link_twitter' => $link_twitter,
				'link_instagram' => $link_instagram,
				'link_github' => $link_github,
				'link_linkedin' => $link_linkedin
			];

			$this->m_data->update_data($where, $data, 'pengaturan');

			$config['allowed_types']	= 'jpg|png|jpeg';
			
			// Periksa apakah ada gambar logo yang diupload
			if (!empty($_FILES['logo']['name'])) {
				$config['upload_path'] = './gambar/website/';
				
				$this->load->library('upload', $config, 'uploadLogo');
				$this->uploadLogo->initialize($config);

                $this->uploadLogo->do_upload('logo');
                
                // Mengambil data tentang gambar logo yang diupload
                $gambar = $this->uploadLogo->data();
                
                $logo = $gambar['file_name'];

                $this->db->query("UPDATE pengaturan SET logo='$logo' ");
			}

			if (!empty($_FILES['foto_sampul']['name'])) {
				$config['upload_path'] = './gambar/bg-image/';
				
				$this->load->library('upload', $config, 'uploadSampul');
				$this->uploadSampul->initialize($config);

				$this->uploadSampul->do_upload('foto_sampul');

				// Mengambil data tentang gambar logo yang diupload
				$gambar = $this->uploadSampul->data();

				$foto_sampul = $gambar['file_name'];

				$this->db->query("UPDATE pengaturan SET foto_sampul='$foto_sampul' ");
			}

			if (!empty($_FILES['paralax_1']['name'])) {
				$config['upload_path'] = './gambar/paralax/';
				
				$this->load->library('upload', $config, 'uploadParalax1');
				$this->uploadParalax1->initialize($config);

				$this->uploadParalax1->do_upload('paralax_1');

				// Mengambil data tentang gambar logo yang diupload
				$gambar = $this->uploadParalax1->data();

				$paralax_1 = $gambar['file_name'];

				$this->db->query("UPDATE pengaturan SET paralax_1='$paralax_1' ");
			}

			if (!empty($_FILES['paralax_2']['name'])) {
				$config['upload_path'] = './gambar/paralax/';
				
				$this->load->library('upload', $config, 'uploadParalax2');
				$this->uploadParalax2->initialize($config);

				$this->uploadParalax2->do_upload('paralax_2');

				// Mengambil data tentang gambar logo yang diupload
				$gambar = $this->uploadParalax2->data();

				$paralax_2 = $gambar['file_name'];

				$this->db->query("UPDATE pengaturan SET paralax_2='$paralax_2' ");
			}

			if (!empty($_FILES['bg_footer']['name'])) {
				$config['upload_path'] = './gambar/bg-image/';
				
				$this->load->library('upload', $config, 'uploadFooter');
				$this->uploadFooter->initialize($config);


				$this->uploadFooter->do_upload('bg_footer');

				// Mengambil data tentang gambar logo yang diupload
				$gambar = $this->uploadFooter->data();

				$bg_footer = $gambar['file_name'];

				$this->db->query("UPDATE pengaturan SET bg_footer='$bg_footer' ");
			}

			redirect(base_url() . 'dashboard/pengaturan/?alert=sukses');
		} else {
			$this->pengaturan();
		}
		
	}
	// Akhir Halaman Pengaturan

	// Halaman Profil
	public function profil()
	{
		// id pengguna yang sedang login
		$id_pengguna = $this->session->userdata('id');

		$where = [
			'pengguna_id' => $id_pengguna
		];

		$data['profil'] = $this->m_data->edit_data($where, 'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_profil', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function profil_update()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		
		
		if ($this->form_validation->run() != false) {

			$id = $this->session->userdata('id');

			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$email = $this->input->post('email');

			$where = [
				'pengguna_id' => $id
			];

			$data = [
				'pengguna_nama' => $nama,
				'pengguna_username' => $username,
				'pengguna_email' => $email
			];

			$this->m_data->update_data($where, $data, 'pengguna');
			
			// Periksa apakah ada gambar logo yang diupload
            if (!empty($_FILES['foto']['name'])) {
				$config = [
					'upload_path' => './gambar/profil/',
					'allowed_types' => 'jpg|png|jpeg'
				];
				
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('foto')) {
					// Mengambil data tentang gambar foto yang diupload
					$gambar = $this->upload->data();
					
					$foto = $gambar['file_name'];
					$data = ['pengguna_foto' => $foto ];
					
					$this->m_data->update_data($where, $data, 'pengguna');
					// $this->db->query("UPDATE pengguna SET pengguna_foto = '$foto'");
				}
			}

			redirect(base_url() . 'dashboard/profil/?alert=sukses');

		} else {
            $this->profil();
        }
		
	}
	// Akhir Halaman Profil

	// Halaman Ganti Password
	public function ganti_password()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_ganti_password');
		$this->load->view('dashboard/v_footer');
	}

	public function ganti_password_aksi() 
	{
		
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|min_length[5]|matches[konfirmasi_password]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password ', 'trim|required|min_length[5]|matches[password_baru]');

		// Cek validasi
		if ($this->form_validation->run() != false) {
			
			// Menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');

			// Cek kesesuaian password lama dengan id pengguna yang sedang login dan password
			$where = [
				'pengguna_id' => $this->session->userdata('id'),
				'pengguna_password' => md5($password_lama)
			];
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();

			// Cek kesesuaian password lama
			if ($cek > 0) {
				// update data password pengguna
				$w = [
					'pengguna_id' => $this->session->userdata('id')
				];

				$data = [
					'pengguna_password' => md5($password_baru)
				];
				$this->m_data->update_data($where, $data, 'pengguna');

				// Alihkan halaman ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			} else {
				redirect('dashboard/ganti_password?alert=gagal');
			}
		} else {
			$this->ganti_password();
		}
		
	}
	// Akhir Halaman Ganti Password

	// Halaman Keluar
	public function keluar() 
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}
	// Akhir Halaman Keluar

}

?>
